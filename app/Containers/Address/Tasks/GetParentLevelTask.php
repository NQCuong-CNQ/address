<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;

class GetParentLevelTask extends Task
{

    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($parentUUID)
    {
        return $this->repository->where('address_component_uuid', $parentUUID)->pluck('address_component_level')->first();
    }
}
