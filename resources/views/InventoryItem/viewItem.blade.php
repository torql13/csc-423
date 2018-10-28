@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="well">
            <div class="row">
                <p><img src="/{{ $indItem->ImageFileName }}" alt="Item Image"/></p>
            </div>
            <div class="row">
                <h3 class="mt-3">Information for {{ $indItem->Description}}</h3>
            </div>
            <div class="row">
                <p><strong>Item Size: </strong>{{ $indItem->Size }}</p>
            </div>
            <div class="row">
                <p><strong>Division/Department/Category: </strong>{{ $indItem->Division}}, {{ $indItem->Department }}, {{ $indItem->Category }}</p>
            </div>
            <div class="row">
                <p><strong>Item Cost: </strong>{{ $indItem->ItemCost }}</p>
            </div>
            <div class="row">
                <p><strong>Item Retail: </strong>{{ $indItem->ItemRetail}}</p>
            </div>
            <div class="row">
                <p><strong>Item Vendor ID: </strong>{{ $indItem->VendorId}}</p>
            </div>
        </div>
    </div>
@stop