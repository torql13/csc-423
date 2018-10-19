<?php

namespace App\Http\Controllers;

use App\User;

class VendorsController extends Controller
{
    public function addVendor()
    {
        $vendor = User::first();
        return $vendor;
    }
}
