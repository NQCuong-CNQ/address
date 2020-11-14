<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAdmisUnitTypeAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetAllAdmisUnitTypeTask');
        return $data;
    }
}
