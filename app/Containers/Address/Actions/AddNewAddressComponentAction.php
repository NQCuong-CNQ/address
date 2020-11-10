<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AddNewAddressComponentAction extends Action
{
    public function run(Request $request)
    {
        $data = Apiato::call('Address@AddNewAddressComponentTask',[$request]);

        return $data;
    }
}
