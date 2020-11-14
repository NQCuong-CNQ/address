<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AddNewAdmistrativeUnitAction extends Action
{
    public function run(Request $request)
    {
    	$request->admistrative_unit_code = strtoupper($request->admistrative_unit_code);
    	$request->admistrative_unit_country_code = strtoupper($request->admistrative_unit_country_code);
        Apiato::call('Address@AddNewAdmistrativeUnitTask',[$request]);
    }
}
