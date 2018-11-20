<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //define name of table associated with model
    protected $table = 'inventory';
    //define name of primary key field for model's associated table
    protected $primaryKey = 'InventoryId';
    //disable timestamps
    public $timestamps = false;
    
}