<?php

namespace App\Containers\Address\Models;

use App\Ship\Parents\Models\Model;

class AdmistrativeUnit extends Model
{
  protected $table='tbl_admistrative_unit';
  public $timestamps=false;

  protected $fillable = [
    'admistrative_unit_uuid',
    'admistrative_unit_name',
    'admistrative_unit_address_component_level',
    'admistrative_unit_country_code',
    'admistrative_unit_type',
    'admistrative_unit_status',
    'admistrative_unit_code',

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
    public function getRouteKeyName()
    {
      return 'uuid';
    }
  }
