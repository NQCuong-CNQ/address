<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressComponentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAddrComponentArrayTask extends Task
{

    protected $repository;

    public function __construct(AddressComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        $addrComponent = $this->repository->get();
        $addrComponentArray = array();
        
        foreach ($addrComponent as $item) {
        	$addrComponentArray[] = $item;
        }
        return $addrComponentArray;
    }
}
