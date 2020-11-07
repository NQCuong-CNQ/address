<?php

namespace App\Containers\Address\Models;

use App\Ship\Parents\Models\Model;

class AddressComponent extends Model
{
    protected $table='tbl_address_component';
    public $timestamps=false;
    
    protected $fillable = [
          'address_component_uuid',
          'address_component_name',
          'address_component_code',
          'address_component_alias',
          'address_component_post_code',
          'address_component_country_code' ,
          'address_component_order' ,
          'address_component_status',
          'address_component_unit_code',
          'address_component_phone_code',
          'address_component_zip_code',
          'address_component_flag_icon' ,
          'address_component_created_by_account_uuid' ,
          'address_component_created_at' ,
          'address_component_updated_by_account_uuid' ,
          'address_component_updated_at' ,
          'address_component_deleted_by_account_uuid' ,
          'address_component_deleted_at' ,
          'address_component_unit_level' ,
          'address_component_parent_uuid' ,
          'address_component_level_scope' ,
          'address_component_level' ,
          'address_component_level_left' ,
          'address_component_level_right' ,
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
