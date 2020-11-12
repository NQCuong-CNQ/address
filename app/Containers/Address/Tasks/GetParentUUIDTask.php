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
    	$parentCode = $this->repository->where('address_component_level', $level-1)->pluck('address_component_code')->first(); 
        return $this->repository->where('address_component_level', $level-1)->where('address_component_country_code', $countryCode)->where('address_component_code', 'LIKE','%'.$parentCode.'%')->pluck('address_component_uuid')->first();
    }
}
