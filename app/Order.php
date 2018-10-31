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
}