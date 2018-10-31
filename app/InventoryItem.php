<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    //define name of table associated with model
    protected $table = 'inventory_item';
    //define name of primary key field for model's associated table
    protected $primaryKey = 'ItemId';
    //disable timestamps
    public $timestamps = false;

    /**
     * gets the vendor owning this inventory item
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'VendorId', 'VendorId');
    }
}