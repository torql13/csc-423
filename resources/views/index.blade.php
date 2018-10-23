@extends('layouts.main')

@section('content')
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">Nanno's Foods</h1>
        <p>Random Shit</p>
        </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-3">Vendor</h2>
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
              @foreach ($shortenVendorList as $vendor)
                <tr>
                  <td><a href="{!! route('viewVendor', ['id'=>$vendor->VendorId]) !!}">{{$vendor->VendorCode}}</a></td>
                  <td>{{$vendor->VendorName}}</td>
                  <td>{{$vendor->ContactPersonName}}</td>
                  <td><a href="/vendor/editVendor">Edit</a></td>
                  <td><a href="/vendor/deleteVendor">Delete</a></td>
                </tr>
              @endforeach
            </table>
          </p>
          <p><a href="/vendor/allVendors">Click here to see all Vendors...</a></p>
        </div>
        <div class="col-md-12">
          <h2 class="mt-3">Store Functions</h2>
          <p>
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-3">Process</h2>
          <p>
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
          </p>
        </div>
        <div class="col-md-12">
          <h2 class="mt-3">Reports</h2>
          <p>
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
          </p>
        </div>
      </div>
    </div>
@stop