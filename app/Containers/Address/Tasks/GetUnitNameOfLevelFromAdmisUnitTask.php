<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AdmistrativeUnitRepository;
use App\Ship\Parents\Tasks\Task;

class GetUnitNameOfLevelFromAdmisUnitTask extends Task
{

    protected $repository;

    public function __construct(AdmistrativeUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($level, $countryCode)
    {
        return $this->repository->where('admistrative_unit_address_component_level', $level)->where('admistrative_unit_country_code', $countryCode)->pluck('admistrative_unit_name');
    }
}
