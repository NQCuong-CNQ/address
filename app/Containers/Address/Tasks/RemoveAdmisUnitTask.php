<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AdmistrativeUnitRepository;
use App\Ship\Parents\Tasks\Task;
use Webpatser\Uuid\Uuid;

class RemoveAdmisUnitTask extends Task
{

    protected $repository;

    public function __construct(AdmistrativeUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($uuid)
    {
        return $this->repository->where('admistrative_unit_uuid', $uuid)->delete();
    }
}
