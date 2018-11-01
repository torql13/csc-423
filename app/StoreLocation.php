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
}
