@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mt-3">Information for {{ $indVendor->VendorName }}</h3>
                <p><strong>Store Code: </strong>{{ $indVendor->VendorCode }}</p>
                <p><strong>Address: </strong>{{ $indVendor->Address }}, {{ $indVendor->State }}, {{ $indVendor->ZIP }}</p>
                <p><strong>Phone: </strong>{{ $indVendor->Phone }}</p>
                <p><strong>Contact Person: </strong>{{ $indVendor->ContactPersonName }}</p>
           </div>
        </div>
    </div>
@stop