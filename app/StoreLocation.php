<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    //define name of table associated with model
    protected $table = 'retail_store';
    //define name of primary key field for model's associated table
    protected $primaryKey = 'StoreId';
    //disable timestamps
    public $timestamps = false;

    /**
     * gets the orders that belong to a store location
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'StoreId', 'StoreId');
    }

    /**
     * gets the customer purchases that belong to a store location
     */
    public function purchases()
    {
        return $this->hasMany('App\CustomerPurchase', 'StoreId', 'StoreId');
    }

    /**
     * gets the items belonging to the store in the inventory table
     */
    public function items()
    {
        return $this->belongsToMany('App\InventoryItem', 'inventory', 'StoreId', 'ItemId')
            ->withPivot('QuantityInStock');
    }
}
