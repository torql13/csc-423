<?php

namespace App\Http\Controllers;

use App\StoreLocation;
use App\Http\Requests\StoreRetailStore;
use DB;
use Illuminate\Http\Request;

class StoresController extends Controller
{  

    public function storeIndex()
    {
        if(request()->has('sort'))
        {
            $locationList = StoreLocation::where('Status', 'Active')
                ->orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $locationList = StoreLocation::where('Status', 'Active')->simplePaginate(10);
        }

        //fill search variable with empty text
        $search = "";

        return view('StoreLocation.storeIndex', compact('locationList', 'search'));

    }

    public function inactiveIndex()
    {
        if(request()->has('sort'))
        {
            $locationList = StoreLocation::where('Status', 'Inactive')
                ->orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $locationList = StoreLocation::where('Status', 'Inactive')->simplePaginate(10);
        }

        //fill search variable with empty text
        $search = "";

        return view('StoreLocation.inactiveIndex', compact('locationList', 'search'));
    }

    public function viewLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->firstOrFail();       
        return view('StoreLocation.viewLocation', compact('storeLocation'));
    }

    public function insertNewLocation(StoreRetailStore $request)
    {
        $store = $request->all();

        StoreLocation::insert([
            'StoreCode' => $store['storeCode'],
            'StoreName' => $store['storeName'],
            'Address' => $store['storeAddress'],
            'City' => $store['storeCity'],
            'State' => $store['storeState'],
            'ZIP' => $store['storeZip'],
            'Phone' => $store['storePhone'],
            'ManagerName' => $store['manager']
        ]);
        return redirect()->action('StoresController@storeIndex');
    }

    public function deleteLocation($id)
    {
        $store = StoreLocation::where([
            ['StoreId', $id],
            ['Status', 'Active']
        ])->firstOrFail();

        $store->Status = 'Inactive';
        $store->save();

        return redirect()->action('StoresController@storeIndex');
    }

    public function restoreLocation($id)
    {
        $store = StoreLocation::where([
            ['StoreId', $id],
            ['Status', 'Inactive']
        ])->firstOrFail();

        $store->Status = 'Active';
        $store->save();

        return redirect()->action('StoresController@storeIndex');
    }

    public function editLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->first();  
        $defaultState = $storeLocation->State;
        $states = ['AL','AK','AZ','AR','CA','CO','CT','DE','DC','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI',
                    'MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT',
                    'VA','WA','WV','WI','WY'];

        return view('StoreLocation.editLocation', compact('storeLocation', 'defaultState', 'states'));
    }

    public function updateLocation(StoreRetailStore $request)
    {
        $store = $request->all();

        StoreLocation::where('StoreId', $store['storeId'])
        ->update([
            'StoreName' => $store['storeName'],
            'Address' => $store['storeAddress'],
            'City' => $store['storeCity'],
            'State' => $store['storeState'],
            'ZIP' => $store['storeZip'],
            'Phone' => $store['storePhone'],
            'ManagerName' => $store['manager']
        ]);
        
        return redirect()->action('StoresController@storeIndex');
    }

    public function searchActive(Request $request)
    {
        $search = $request->input('search');
        if(!$search)
        {
            return $this->storeIndex();
        }

        if(request()->has('sort'))
        {
            $locationList = StoreLocation::where([
                    ['StoreCode', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->orWhere([
                    ['StoreName', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->orderBy(request('sort'), 'ASC')
                ->paginate(10);
        }
        else
        {
            $locationList = StoreLocation::where([
                    ['StoreCode', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->orWhere([
                    ['StoreName', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->paginate(10);
        }
        return view('StoreLocation.storeIndex', compact('locationList', 'search'));
    }

    public function searchInactive(Request $request)
    {
        $search = $request->input('search');
        if(!$search)
        {
            return $this->storeIndex();
        }

        if(request()->has('sort'))
        {
            $locationList = StoreLocation::where([
                    ['StoreCode', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->orWhere([
                    ['StoreName', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->orderBy(request('sort'), 'ASC')
                ->paginate(10);
        }
        else
        {
            $locationList = StoreLocation::where([
                    ['StoreCode', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->orWhere([
                    ['StoreName', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->paginate(10);
        }
        return view('StoreLocation.inactiveIndex', compact('locationList', 'search'));
    }
}
