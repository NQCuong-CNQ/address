<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetUnitNameOfDistrictFromAdmisUnitAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetUnitNameOfLevelFromAdmisUnitTask', [2,'vn']);
        return $data;
    }
}
