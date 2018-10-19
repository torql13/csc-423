<?php

namespace App\Http\Controllers;

use App\User;

class VendorsController extends Controller
{
    public function addVendorPage()
    {
        return view('Vendor.add');
    }

    public function insertNewVendor()
    {
        $name = $_POST['vendorName'];
        $addr = $_POST['vendorAddress'];
        $city = $_POST['vendorCity'];
        $state = $_POST['vendorState'];
        $zip = $_POST['vendorZip'];
        $phone = $_POST['vendorPhone'];

        $my_SQL = "'INSERT INTO Vendors(name, address, city, state, zip, phone) VALUES("$name", "$addr", "$city", "$state", "$zip", "$phone")'";
        echo "$name";
        return;
    }
}
