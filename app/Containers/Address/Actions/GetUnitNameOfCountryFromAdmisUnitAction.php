<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetUnitNameOfCountryFromAdmisUnitAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetUnitNameOfLevelFromAdmisUnitTask', [0,'VN']);
        return $data;
    }
}
