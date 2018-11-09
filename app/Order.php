<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //define name of table associated with the model
    protected $table = 'order';

    //define name of primary key for model's associated table
    protected $primaryKey = 'OrderId';

    /**
     * gets the order details that belong to an order
     */
    public function orders()
    {
        return $this->hasMany('App\OrderDetail', 'OrderId', 'OrderId');
    }

    /**
     * gets the store location that the order is shipped to (order belongs to)
     */
    public function store()
    {
        return $this->belongsTo('App\StoreLocation', 'StoreId', 'StoreId');
    }

    /**
     * gets the vendor that the order is being shipped by (order belongs to)
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'VendorId', 'VendorId');
    }
}