<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //define name of table associated with model
    protected $table = 'customer';
    //define name of primary key field for model's associated table
    protected $primaryKey = 'CustomerId';
    //disable timestamps
    public $timestamps = false;

    /**
     * Gets the customer purchases belonging to this customer
     */
    public function purchases()
    {
        return $this->hasMany('App\CustomerPurchase', 'CustomerId', 'CustomerId');
    }
}
