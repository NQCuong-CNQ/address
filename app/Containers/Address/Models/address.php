<?php

namespace App\Containers\Address\Models;

use App\Ship\Parents\Models\Model;

class address extends Model
{
    public $timestamps=false;

    protected $fillable = [

    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ]; 

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'addresses';
}
