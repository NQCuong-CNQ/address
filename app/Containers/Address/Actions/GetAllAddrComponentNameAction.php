<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAddrComponentNameAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetAllAddrComponentNameTask');

        return $data;
    }
}
