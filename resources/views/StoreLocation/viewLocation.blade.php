@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="well">
            <div class="row">
                <h3 class="mt-3">Information for {{ $storeLocation->StoreName}}</h3>
            </div>
            <div class="row">
                <p><strong>Store Code: </strong>{{ $storeLocation->StoreCode }}</p>
            </div>
            <div class="row">
                <p><strong>Address: </strong>{{ $storeLocation->Address}}, {{ $storeLocation->State }}, {{ $storeLocation->ZIP }}</p>
            </div>
            <div class="row">
                <p><strong>Phone: </strong>{{ $storeLocation->Phone }}</p>
            </div>
            <div class="row">
                <p><strong>Manager: </strong>{{ $storeLocation->ManagerName}}</p>
            </div>
        </div>
    </div>
@stop