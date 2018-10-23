<?php

namespace App\Http\Controllers;

use App\Vendor;
use DB;

class VendorsController extends Controller
{
    public function index()
    {
        $shortenVendorList = DB::table('vendors')->simplePaginate(5);

        return view('index', compact('shortenVendorList'));
    }

    public function allVendors()
    {
        $vendorList = DB::table('vendors')->simplePaginate(10);

        return view('/Vendor/allVendors', compact('vendorList'));

    }

    public function addVendorPage()
    {
        return view('Vendor.addVendor');
    }

    public function insertNewVendor()
    {
        $name = $_POST['vendorName'];
        $addr = $_POST['vendorAddress'];
        $city = $_POST['vendorCity'];
        $state = $_POST['vendorState'];
        $zip = $_POST['vendorZip'];
        $phone = $_POST['vendorPhone'];
        $contactPerson = $_POST['contactPerson'];
        $password = $_POST['password']; 
        $vendorCode = $_POST['vendorCode'];

        DB::table('vendors')->insert([
            ['VendorCode'=> $vendorCode, 'VendorName' => $name, 'Address' => $addr, 'City' => $city, 'State' => $state,
            'Zip' => $zip, 'Phone' => $phone, 'ContactPerson' => $contactPerson, 'Password' => $password]
        ]);
        return redirect()->action('VendorsController@index');
    }
}
