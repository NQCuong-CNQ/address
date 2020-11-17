<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\SubAction;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AddNewAddrComponentWithNestedSetSubAction extends SubAction
{
    public function run(Request $request)
    {	
    	$maxRight = Apiato::call('Address@GetMaxRightTask');
    	$countAddrComp = Apiato::call('Address@CountDataAddressComponentTask');

    	if($request->address_component_unit_level_hidden == 0){
    		$request->address_component_parent_uuid = null;
            $request->address_component_unit_code = 'COUNTRY';

    		if($countAddrComp == 0){
	    		$request->address_component_level_left = $maxRight+1;
	    	}else{
	    		$request->address_component_level_left = $maxRight;
	    	}

	    	$request->address_component_level_right = $request->address_component_level_left + 1;
            $request->address_component_level = $request->address_component_unit_level_hidden;
            $request->address_component_country_code = $request->address_component_code;
    	}
    	if($request->address_component_unit_level_hidden > 0){

            $parentUUID = Apiato::call('Address@GetParentUUIDTask', [$request->address_component_unit_level_hidden, $request->address_component_unit_country_code_hidden, $request->address_component_code]);

    		$request->address_component_parent_uuid = $parentUUID;
            $parentRight = Apiato::call('Address@GetParentRightTask', [$parentUUID]);

            $newLeft = $parentRight;
            $parentLevel = Apiato::call('Address@GetParentLevelTask', [$parentUUID]);
            Apiato::call('Address@UpdateLeftRightWhenAddTask', [$newLeft]);

            $request->address_component_level = $request->address_component_unit_level_hidden;
            $request->address_component_level_left = $newLeft;
            $request->address_component_level_right = $request->address_component_level_left +1;
            $request->address_component_country_code = $request->address_component_unit_country_code_hidden;
    	}
        $request->address_component_unit_level = $request->address_component_level;
        Apiato::call('Address@AddNewAddressComponentTask',[$request]);
    }
}
