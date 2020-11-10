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
      $admistrative_unit_uuid = Uuid::generate(5,$request, Uuid::NS_DNS);
        return $this->repository->create([
          'admistrative_unit_uuid'=>  $admistrative_unit_uuid,
          'admistrative_unit_name'=>  $request->admistrative_unit_name,
          'admistrative_unit_address_component_level'=> $request->admistrative_unit_address_component_level,
          'admistrative_unit_country_code'=> $request->admistrative_unit_country_code,
          'admistrative_unit_type'=>  $request->admistrative_unit_type,
          'admistrative_unit_status'=>  $request->admistrative_unit_status,
          'admistrative_unit_order'=>  1,
          'admistrative_unit_code'=>  $request->admistrative_unit_code,
          // 'admistrative_unit_created_by_account_uuid'=>  ,
          // 'admistrative_unit_created_at'=>  ,
          // 'admistrative_unit_updated_by_account_uuid'=>  ,
          // 'admistrative_unit_updated_at'=>  ,
          // 'admistrative_unit_deleted_by_account_uuid'=>  ,
          // 'admistrative_unit_deleted_at'=>  ,
        ]);
    }
}
