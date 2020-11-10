<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AddNewAdmistrativeUnitAction extends Action
{
    public function run(Request $request)
    {
        $data = Apiato::call('Address@AddNewAdmistrativeUnitTask',[$request]);

        return $data;
    }
}
