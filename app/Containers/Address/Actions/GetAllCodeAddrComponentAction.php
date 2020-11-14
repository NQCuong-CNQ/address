<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCodeAddrComponentAction extends Action
{
    public function run()
    {
        $data = Apiato::call('Address@GetAllCodeAddrComponentTask');
        return $data;
    }
}
