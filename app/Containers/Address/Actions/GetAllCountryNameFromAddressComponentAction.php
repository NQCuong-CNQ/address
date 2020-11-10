<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCountryNameFromAddressComponentAction extends Action
{
    public function run()
    {
        $addresses = Apiato::call('Address@GetAllCountryNameFromAddressComponentTask');

        return $addresses;
    }
}
