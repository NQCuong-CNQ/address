<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AddNewAddressComponentAction extends Action
{
    public function run(Request $request)
    {
    	$request->address_component_code = strtoupper($request->address_component_code);
    	$request->address_component_country_code = strtoupper($request->address_component_country_code);
    	$request->address_component_unit_code = strtoupper($request->address_component_unit_code);
        Apiato::call('Address@AddNewAddrComponentWithNestedSetSubAction',[$request]);
    }
}
