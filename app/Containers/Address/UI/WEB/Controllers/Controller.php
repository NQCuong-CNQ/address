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
        $addressComponent = Apiato::call('Address@GetAllAddressComponentAction');
        $admistrativeUnit = Apiato::call('Address@GetAllAdmistrativeUnitAction');
        return view('address::AdmistrativeUnit')->with('admistrativeUnit', $admistrativeUnit)->with('addressComponent', $addressComponent);
    }

    public function getAddressComponent()
    {
        $addressComponent = Apiato::call('Address@GetAllAddressComponentAction');
        $admistrativeUnit = Apiato::call('Address@GetAllAdmistrativeUnitAction');
        $admisUnitCountryCode = Apiato::call('Address@GetAllAdmisUnitCountryCodeAction');
        $admisUnitCode = Apiato::call('Address@GetAllAdmisUnitCodeAction');

        $allCountryName = Apiato::call('Address@GetAllCountryNameFromAddressComponentAction');
        return view('address::AddressComponent')->with('admistrativeUnit', $admistrativeUnit)->with('addressComponent', $addressComponent)->with('allCountryName', $allCountryName)->with('admisUnitCountryCode', $admisUnitCountryCode)->with('admisUnitCode', $admisUnitCode);
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

    public function addNewAddressComponent(CreateAdmistrativeUnitRequest $request)
    {
      $addresses = Apiato::call('Address@addNewAddressComponentAction',[$request]);
        return redirect()->route('AddressComponent');
    }
}
