<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllRightAddrComponentAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetAllRightAddrComponentTask');
        return $data;
    }
}
