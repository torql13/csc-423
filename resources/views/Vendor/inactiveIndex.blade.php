@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Inactive Vendors</h2>
                <p>
                    <ul>
                        <li><a href='/vendor/addVendor'>Add Vendor</a></li>
                        <li><a href='/vendor/'>Manage Active Vendors</a></li>
                    </ul>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Vendor Code</th>
                            <th><a href="/vendor/inactiveIndex?sort=VendorName">Vendor Name</a></th>
                            <th><a href="/vendor/inactiveIndex?sort=ContactPersonName">Contact</a></th>
                            <th>Edit</th>
                            <th>Restore</th>
                        </tr>
                        @foreach ($vendorList as $vendor)
                        <tr>
                            <td><a href="/vendor/view/{{$vendor->VendorId}}">{{$vendor->VendorCode}}</a></td>
                            <td>{{$vendor->VendorName}}</td>
                            <td>{{$vendor->ContactPersonName}}</td>
                            <td><a href="/vendor/editVendor/{{$vendor->VendorId}}">Edit</a></td>
                            <td><a href="/vendor/restoreVendor/{{$vendor->VendorId}}" onclick="return confirm('Are you sure?');">Restore</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $vendorList->links() }}
                </p>
            </div>
        </div>
    </div>
@stop