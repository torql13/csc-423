<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerPurchase extends Model
{
    //define name of table associated with model
    protected $table = 'customer';
    //define name of primary key field for model's associated table
    protected $primaryKey = 'CustomerId';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'CustomerId', 'CustomerId');
    }

    public function item()
    {
        return $this->belongsTo('App\InventoryItem', 'ItemId', 'ItemId');
    }

    public function store()
    {
        return $this->belongsTo('App\StoreLocation', 'StoreId', 'StoreId');
    }
}
