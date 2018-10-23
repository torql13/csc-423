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

        $my_SQL = DB::table('Vendors')->insert([
            ['Name' => $name, 'Address' => $addr, 'City' => $city, 'State', $state,
             'Zipcode' => $zip, 'Phone' => $phone]
        ]);
        return;
    }
}
