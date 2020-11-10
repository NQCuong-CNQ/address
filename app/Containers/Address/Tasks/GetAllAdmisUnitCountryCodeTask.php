<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AdmistrativeUnitRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAdmisUnitCountryCodeTask extends Task
{

    protected $repository;

    public function __construct(AdmistrativeUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->pluck('admistrative_unit_country_code');
    }
}
