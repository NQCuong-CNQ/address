<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;

class RemoveAddressComponentTask extends Task
{

    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($uuid)
    {
    	$currentNode = $this->repository->where('address_component_uuid',$uuid)->first();
    	$size = ($currentNode->address_component_level_right - $currentNode->address_component_level_left) +1;
        $this->repository->where('address_component_level_left', '>=', $currentNode->address_component_level_left)->where('address_component_level_right', '<=', $currentNode->address_component_level_right)->delete();
        $this->repository->where('address_component_level_right', '>=', $currentNode->address_component_level_right)->increment('address_component_level_right', -($size));
        $this->repository->where('address_component_level_left', '>', $currentNode->address_component_level_left)->increment('address_component_level_left', -($size));
    }
}
