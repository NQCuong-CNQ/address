<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class RemoveAddressComponentAction extends Action
{
    public function run(Request $request)
    {
        Apiato::call('Address@RemoveAddressComponentTask', [$request]);
    }
}
