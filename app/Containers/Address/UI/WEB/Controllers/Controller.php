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
        $admisUnitType = Apiato::call('Address@GetAllAdmisUnitTypeAction');
        $allCountryName = Apiato::call('Address@GetAllCountryNameFromAddressComponentAction');
        $admisUnitLevel = Apiato::call('Address@GetAllAdmisUnitLevelAction');
        
        return view('address::AddressComponent')->with('admistrativeUnit', $admistrativeUnit)->with('addressComponent', $addressComponent)->with('allCountryName', $allCountryName)->with('admisUnitCountryCode', $admisUnitCountryCode)->with('admisUnitCode', $admisUnitCode)->with('admisUnitType', $admisUnitType)->with('admisUnitLevel', $admisUnitLevel);
    }

    public function getUserInput()
    {
        $allCountryName = Apiato::call('Address@GetAllCountryNameFromAddressComponentAction');

        $unitNameOfCountry = Apiato::call('Address@GetUnitNameOfCountryFromAdmisUnitAction');
        $unitNameOfCity = Apiato::call('Address@GetUnitNameOfCityFromAdmisUnitAction');
        $unitNameOfDistrict = Apiato::call('Address@GetUnitNameOfDistrictFromAdmisUnitAction');
        $unitNameOfWard = Apiato::call('Address@GetUnitNameOfWardFromAdmisUnitAction');

        $allLeft = Apiato::call('Address@GetAllLeftAddrComponentAction');
        $allRight = Apiato::call('Address@GetAllRightAddrComponentAction');
        $allLevel = Apiato::call('Address@GetAllLevelAddrComponentAction');
        $allCode = Apiato::call('Address@GetAllCodeAddrComponentAction');

        $allName = Apiato::call('Address@GetAllAddrComponentNameAction');

        return view('address::UserInput')->with('allCountryName', $allCountryName)->with('unitNameOfCountry', $unitNameOfCountry)->with('unitNameOfCity', $unitNameOfCity)->with('unitNameOfDistrict', $unitNameOfDistrict)->with('unitNameOfWard', $unitNameOfWard)->with('allLeft', $allLeft)->with('allRight', $allRight)->with('allLevel', $allLevel)->with('allCode', $allCode)->with('allName', $allName);
    }

    public function addNewAdmistrativeUnit(AddNewAdmistrativeUnitRequest $request)
    {
        $addresses = Apiato::call('Address@AddNewAdmistrativeUnitAction',[$request]);
        return redirect()->back();
    }

    public function addNewAddressComponent(AddNewAddressComponentRequest $request)
    {
        $addresses = Apiato::call('Address@AddNewAddressComponentAction',[$request]);
        return redirect()->back();
    }

    public function removeAddressComponent(RemoveAddressComponentRequest $request)
    {
        $addresses = Apiato::call('Address@RemoveAddressComponentAction',[$request]);
        return redirect()->back();
    }
}
