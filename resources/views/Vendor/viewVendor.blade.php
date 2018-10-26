@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="well">
            <div class="row">
                <h3 class="mt-3">Information for {{ $indVendor->VendorName }}</h3>
            </div>
            <div class="row">
                <p><strong>Store Code: </strong>{{ $indVendor->VendorCode }}</p>
            </div>
            <div class="row">
                <p><strong>Address: </strong>{{ $indVendor->Address }}, {{ $indVendor->State }}, {{ $indVendor->ZIP }}</p>
            </div>
            <div class="row">
                <p><strong>Phone: </strong>{{ $indVendor->Phone }}</p>
            </div>
            <div class="row">
                <p><strong>Contact Person: </strong>{{ $indVendor->ContactPersonName }}</p>
            </div>
        </div>
    </div>
@stop