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

    /**
     * gets the order_details that belong to an inventory item
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'ItemId', 'ItemId');
    }

    /**
     * gets the customer purchases that belong to an inventory item
     */
    public function purchases()
    {
        return $this->hasMany('App\CustomerPurchase', 'ItemId', 'ItemId');
    }

    /**
     * gets the stores belonging to the inventory item in the inventory table
     */
    public function stores()
    {
        return $this->belongsToMany('App\StoreLocation', 'inventory', 'ItemId', 'StoreId')
            ->withPivot('QuantityInStock');
    }
}