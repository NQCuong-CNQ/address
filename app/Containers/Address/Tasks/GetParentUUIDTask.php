<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;

class GetParentUUIDTask extends Task
{

    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($level, $countryCode, $code)
    {   
         $parentUUID = $this->repository->where('address_component_level', $level-1)->where('address_component_country_code', $countryCode)->get();
         
        foreach ($parentUUID as $uuid) {
            if(str_contains($code, $uuid->address_component_code)){
                return $uuid->address_component_uuid;
            }
        }

    }
}
