@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">All Vendors</h2>
                <p>
                    <ul>
                        <li><a href='/vendor/addVendor'>Add Vendor</a></li>
                    </ul>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Vendor Code</th>
                            <th>Vendor Name</th>
                            <th>Contact</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($vendorList as $vendor)
                        <tr>
                            <td><a href="/vendor/view/{{$vendor->VendorId}}">{{$vendor->VendorCode}}</a></td>
                            <td>{{$vendor->VendorName}}</td>
                            <td>{{$vendor->ContactPersonName}}</td>
                            <td><a href="/vendor/editVendor">Edit</a></td>
                            <td><a href="/vendor/deleteVendor/{{$vendor->VendorId}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $vendorList->links() }}
                </p>
            </div>
        </div>
    </div>
@stop