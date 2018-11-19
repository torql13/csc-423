<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
    public function index()
    {
        if(request()->has('sort'))
        {
            $vendorList = Vendor::where('Status', 'Active')->orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $vendorList = Vendor::where('Status', 'Active')->simplePaginate(10);
        }

        $search = "";

        return view('/Vendor/index', compact('vendorList', 'search'));
    }

    public function inactiveIndex()
    {

        if(request()->has('sort'))
        {
            $vendorList = Vendor::where('Status', 'Inactive')->orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $vendorList = Vendor::where('Status', 'Inactive')->simplePaginate(10);
        }
        
        $search = "";

        return view('/Vendor/inactiveIndex', compact('vendorList', 'search'));
    }

    public function deleteVendor($id)
    {
        $vendor = Vendor::where([
            ['VendorId', $id],
            ['Status', 'Active']
        ])->firstOrFail();

        $vendor->Status = 'Inactive';
        $vendor->save();

        foreach($vendor->items as $item)
        {
            //set each item belonging to vendor to 'Inactive' in Status field
            DB::table('inventory_item')->where('VendorId', $id)->update([
                'Status' => 'Inactive'
            ]);
        }

        return redirect()->action('VendorsController@index');
    }

    public function restoreVendor($id)
    {
        $vendor = Vendor::where([
            ['VendorId', $id],
            ['Status', 'Inactive']
        ])->firstOrFail();

        $vendor->Status = 'Active';
        $vendor->save();

        foreach($vendor->items as $item)
        {
            //set each item belonging to vendor to 'Active' in Status field
            DB::table('inventory_item')->where('VendorId', $id)->update([
                'Status' => 'Active'
            ]);
        }

        return redirect()->action('VendorsController@index');
    }

    public function editVendor($id)
    {
        $indVendor = Vendor::where('VendorId', $id)->first();
        $defaultState = $indVendor->State;
        $states = ['AL','AK','AZ','AR','CA','CO','CT','DE','DC','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI',
                    'MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT',
                    'VA','WA','WV','WI','WY'];
        
        return view('/Vendor/editVendor', compact('indVendor', 'defaultState', 'states'));
    }

    public function updateVendor(Request $request)
    {
        $vendor = $request->all();

        Vendor::where('VendorId', $vendor['vendorId'])
            ->update([
                'VendorName' => $vendor['vendorName'],
                'Address' => $vendor['vendorAddress'],
                'City' => $vendor['vendorCity'],
                'State' => $vendor['vendorState'],
                'Zip' => $vendor['vendorZip'],
                'Phone' => $vendor['vendorPhone'], 
                'ContactPersonName' => $vendor['contactPerson'],
                'Status' => $vendor['status']
            ]
        );
        
        return redirect()->action('VendorsController@index');
    }

    public function viewVendor($id)
    {
        $indVendor = Vendor::where('VendorId', $id)->firstOrFail();

        return view('/Vendor/viewVendor', compact('indVendor'));
    }

    public function insertNewVendor(Request $request)
    {

        $newVendor = $request->all();

        $hashedPass = $this->hashPassword($newVendor['password']);

        Vendor::insert([
            'VendorCode' => $newVendor['vendorCode'],
            'VendorName' => $newVendor['vendorName'],
            'Address' => $newVendor['vendorAddress'],
            'City' => $newVendor['vendorCity'],
            'State' => $newVendor['vendorState'],
            'Zip' => $newVendor['vendorZip'],
            'Phone' => $newVendor['vendorPhone'], 
            'ContactPersonName' => $newVendor['contactPerson'],
            'Password' => $hashedPass
        ]);

        return redirect()->action('VendorsController@index');
    }

    public function searchActive(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->paginate(10);
        }

        return view('Vendor/index', compact('vendorList', 'search'));
    }

    public function searchInactive(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->paginate(10);
        }

        return view('Vendor/inactiveIndex', compact('vendorList', 'search'));
    }
    public function changePassword(Request $request)
    {
        $newVendor = $request->all();

        $storedPass = Vendor::where('VendorId', $newVendor['vendorId'])->pluck('Password')[0];
        
        if($this->hashPassword($newVendor['oldPass']) == $storedPass)
        {
            Vendor::where('VendorId', $newVendor['vendorId'])
                ->update([
                    'Password' => $this->hashPassword($newVendor['newPass'])
                ]
            );
            return redirect()->action('VendorsController@index');
        }
        else
        {
            return redirect("vendor/changePassword/" . $newVendor['vendorId']);
        }
    }

    public function login(Request $request)
    {
        $loginData = $request->all();

        $hashedPass = $this->hashPassword($loginData['password']);

        $record = Vendor::where('VendorCode', $loginData['vendorCode'])
            ->where('Password', $hashedPass)
            ->first();

        if(count($record))
        {
            //$request->session()->put('VendorId', $record->VendorId);
            session([
                'VendorId' => $record->VendorId,
                'VendorName' => $record->VendorName,
                'VendorCode' => $record->VendorCode,
                'Password' => $record->Password
            ]);

            // echo session('VendorId');

            //temperary so I dont overfill the session
            // $request->session()->flush();

            return redirect('/order/viewVendorOrders');
        }
        else
        {
            $errorMessage = "Username or Password is incorrect";
            return view('/login', compact('errorMessage'));
        }
    }
}
