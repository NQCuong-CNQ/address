<?php

namespace App\Containers\Address\UI\WEB\Controllers;


use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\UI\WEB\Request;
use App\Containers\Address\UI\WEB\Requests\CreateAdmistrativeUnitRequest;

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

    public function getUserInput()
    {
       
        return view('address::UserInput');
    }

    public function addNewAdmistrativeUnit(CreateAdmistrativeUnitRequest $request)
    {
      $addresses = Apiato::call('Address@AddNewAdmistrativeUnitAction',[$request]);
        return redirect()->route('AdmistrativeUnit');
    }
}
