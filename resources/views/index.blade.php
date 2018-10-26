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
              <li><a href="/vendor">Go To Vender Index Page</a></li>
            </ul>
          </p>
        </div>
        <div class="col-md-12">
          <h2 class="mt-3">Stores</h2>
          <p>
            <ul>
                <li><a href='/storeLocations/addLocation'>Add Store Location</a></li>
                <li><a href="/storeLocations/">Go To Store Index</a></li>
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