<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnToVendorDetail extends Model
{
    //define name of table associated with the model
    protected $table = 'return_to_vendor_detail';

    //define name of primary key for model's associated table
    protected $primaryKey = 'ReturnToVendorDetailId';

    //disable timestamps
    public $timestamps = false;
}