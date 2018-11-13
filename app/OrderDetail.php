<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //define name of table associated with the model
    protected $table = 'order_detail';

    //define name of primary key for model's associated table
    protected $primaryKey = 'OrderDetailId';

    public $timestamps = false;

    /**
     * gets the order that this order_detail belongs to
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'OrderId', 'OrderId');
    }
}