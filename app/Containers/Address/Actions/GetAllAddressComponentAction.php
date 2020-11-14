<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAddressComponentAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetAllAddressComponentTask');
        return $data;
    }
}
