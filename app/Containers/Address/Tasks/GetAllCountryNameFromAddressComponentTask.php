<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCountryNameFromAddressComponentTask extends Task
{
    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->where('address_component_unit_code','Quốc gia')->paginate();
    }
}
