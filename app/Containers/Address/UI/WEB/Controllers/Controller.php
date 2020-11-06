<?php

namespace App\Containers\Address\UI\WEB\Controllers;


use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function getAdmistrativeUnit()
    {
        $addresses = Apiato::call('Address@GetAllAdmistrativeUnitAction');
        return view('address::AdmistrativeUnit');
    }

    public function getAddressComponent()
    {
        $addresses = Apiato::call('Address@GetAllAddressComponentAction');
        return view('address::AddressComponent');
    }
}
