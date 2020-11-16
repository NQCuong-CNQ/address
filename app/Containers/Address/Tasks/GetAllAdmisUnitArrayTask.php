<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AdmistrativeUnitRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAdmisUnitArrayTask extends Task
{
    protected $repository;

    public function __construct(AdmistrativeUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        $admisUnit = $this->repository->get();
        $admisUnitArray = array();
        
        foreach ($admisUnit as $item) {
        	$admisUnitArray[] = $item;
        }
        return $admisUnitArray;
    }
}
