<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AdmistrativeUnitRepository;
use App\Ship\Parents\Tasks\Task;
use Webpatser\Uuid\Uuid;
class AddNewAdmistrativeUnitTask extends Task
{

    protected $repository;

    public function __construct(AdmistrativeUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($request)
    {
      $uuid = Uuid::generate(5,$request, Uuid::NS_DNS);
        return $this->repository->create([
          'admistrative_unit_uuid'=>  $uuid,
          'admistrative_unit_name'=>  $request->unit_name,
          'admistrative_unit_address_component_level'=> $request->address_component_level,
          'admistrative_unit_country_code'=> $request->unit_country_code,
          'admistrative_unit_type'=>  $request->unit_type,
          'admistrative_unit_status'=>  $request->unit_status,
          // 'admistrative_unit_order'=>  ,
          'admistrative_unit_code'=>  $request->unit_code,
          // 'admistrative_unit_created_by_account_uuid'=>  ,
          // 'admistrative_unit_created_at'=>  ,
          // 'admistrative_unit_updated_by_account_uuid'=>  ,
          // 'admistrative_unit_updated_at'=>  ,
          // 'admistrative_unit_deleted_by_account_uuid'=>  ,
          // 'admistrative_unit_deleted_at'=>  ,
        ]);
    }
}
