<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;

class UpdateLeftRightTask extends Task
{
    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($newLeft)
    {
        $this->repository->where('address_component_level_right', '>=', $newLeft)->increment('address_component_level_right', 2);
        $this->repository->where('address_component_level_left', '>', $newLeft)->increment('address_component_level_left', 2);
    }
}
