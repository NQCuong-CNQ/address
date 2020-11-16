<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AdmistrativeUnitRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAdmistrativeUnitTask extends Task
{

    protected $repository;

    public function __construct(AdmistrativeUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->orderBy('admistrative_unit_order', 'asc')->get();
    }
}
