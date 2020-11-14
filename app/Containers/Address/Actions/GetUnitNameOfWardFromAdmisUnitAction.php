<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetUnitNameOfWardFromAdmisUnitAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetUnitNameOfLevelFromAdmisUnitTask', [3,'VN']);
        return $data;
    }
}
