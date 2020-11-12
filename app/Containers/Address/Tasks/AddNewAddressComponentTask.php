<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;
use Webpatser\Uuid\Uuid;

class AddNewAddressComponentTask extends Task
{

    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($request)
    {
      $address_component_uuid = Uuid::generate(5,$request, Uuid::NS_DNS);
        return $this->repository->create([
          'address_component_uuid'=>  $address_component_uuid,
          'address_component_name'=>  $request->address_component_name,
          'address_component_code'=> $request->address_component_code,
          // 'address_component_alias'=> ,
          'address_component_post_code'=>  $request->address_component_post_code,
          'address_component_country_code'=>  $request->address_component_country_code,
          'address_component_order'=>  $request->address_component_order,
          'address_component_status'=>  $request->address_component_status,
          'address_component_unit_code'=>   $request->address_component_unit_code,
          'address_component_phone_code'=>  $request->address_component_phone_code,
          'address_component_zip_code'=>   $request->address_component_zip_code,
          // 'address_component_flag_icon'=>  ,
          // 'address_component_created_by_account_uuid'=>  ,
          // 'address_component_created_at'=>  ,
          // 'address_component_updated_by_account_uuid'=>  ,
          // 'address_component_updated_at'=>  ,
          // 'address_component_deleted_by_account_uuid'=>  ,
          // 'address_component_deleted_at'=>  ,
          'address_component_unit_level'=>  $request->address_component_unit_level,
          'address_component_parent_uuid'=>  $request->address_component_parent_uuid,
          // 'address_component_level_scope'=>  ,
          'address_component_level'=>  $request->address_component_level,
          'address_component_level_left'=>  $request->address_component_level_left,
          'address_component_level_right'=>  $request->address_component_level_right,
        ]);
    }
}
