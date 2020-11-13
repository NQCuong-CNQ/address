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
            // 2. lay right cha
            $parentRight = Apiato::call('Address@GetParentRightTask', [$parentUUID]);
    		// 3. left moi bang right cha
            $newLeft = $parentRight;
    		// 4. lay level node cha
            $parentLevel = Apiato::call('Address@GetParentLevelTask', [$parentUUID]);
    		// 5. update right +2 cho right >= new left
            // 6. Update left các node khác: Update Clothing set left = left +2 where  left > new_left
            Apiato::call('Address@UpdateLeftRightWhenAddTask', [$newLeft]);
    		// 7. level +1, left, right +1
            $request->address_component_level = $request->address_component_unit_level_hidden;
            $request->address_component_level_left = $newLeft;
            $request->address_component_level_right = $request->address_component_level_left +1;

            $request->address_component_country_code = $request->address_component_unit_country_code_hidden;
    	}
        $request->address_component_unit_level = $request->address_component_level;

        $data = Apiato::call('Address@AddNewAddressComponentTask',[$request]);
        return $data;
    }
}
