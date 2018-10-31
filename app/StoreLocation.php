<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
     //define name of table associated with the model
     protected $table = 'retail_store';

     //define name of primary key for model's associated table
     protected $primaryKey = 'StoreId';
 
     /**
      * gets the order details that belong to an order
      */
     public function stores()
     {
         return $this->hasMany('App\StoreLocation', 'StoreId', 'StoreId');
     }
}
