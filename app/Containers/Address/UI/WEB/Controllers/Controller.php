<?php
namespace App\Containers\Address\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\UI\WEB\Requests\AddNewAdmistrativeUnitRequest;
use App\Containers\Address\UI\WEB\Requests\AddNewAddressComponentRequest;

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
        $admisUnitArray = Apiato::call('Address@GetAllAdmisUnitArrayAction');
        
        return view('address::AddressComponent')->with('admistrativeUnit', $admistrativeUnit)->with('addressComponent', $addressComponent)->with('admisUnitArray', $admisUnitArray);
    }

    public function getUserInput()
    {
        $addressComponent = Apiato::call('Address@GetAllAddressComponentAction');
        $addrComponentArray = Apiato::call('Address@GetAllAddrComponentArrayAction');
        $admisUnitArray = Apiato::call('Address@GetAllAdmisUnitArrayAction');

        return view('address::UserInput')->with('addressComponent', $addressComponent)->with('addrComponentArray', $addrComponentArray)->with('admisUnitArray', $admisUnitArray);
    }

    public function addNewAdmistrativeUnit(AddNewAdmistrativeUnitRequest $request)
    {
        Apiato::call('Address@AddNewAdmistrativeUnitAction',[$request]);
        return redirect()->back();
    }

    public function addNewAddressComponent(AddNewAddressComponentRequest $request)
    {
        Apiato::call('Address@AddNewAddressComponentAction',[$request]);
        return redirect()->back();
    }

    public function removeAddressComponent($uuid)
    {
        Apiato::call('Address@RemoveAddressComponentAction',[$uuid]);
        return redirect()->back();
    }

    public function removeAdmisUnit($uuid)
    {
        Apiato::call('Address@removeAdmisUnitAction',[$uuid]);
        return redirect()->back();
    }
}