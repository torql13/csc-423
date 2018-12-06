<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnToVendor extends Model
{
    //define name of table associated with the model
    protected $table = 'return_to_vendor';

    //define name of primary key for model's associated table
    protected $primaryKey = 'ReturnToVendorId';

    //disable timestamps
    public $timestamps = false;
}