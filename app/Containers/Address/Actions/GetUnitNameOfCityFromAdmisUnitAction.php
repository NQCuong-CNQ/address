<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetUnitNameOfCityFromAdmisUnitAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetUnitNameOfLevelFromAdmisUnitTask', [1,'VN']);
        return $data;
    }
}
