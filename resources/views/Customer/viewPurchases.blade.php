@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="mt-3">All Purchases for Customer #{{$customer->CustomerId}}</h2>
            <p>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Store</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Date/Time of Purchase</th>
                    </tr>
                    @foreach ($purchases as $purchase)
                    <tr>
                        @foreach($stores as $store)
                            @if($store->StoreId === $purchase->StoreId)
                                <td>{{$store->StoreName}}</td>
                            @endif
                        @endforeach
                        <td>{{$purchase->ItemId}}</td>
                        <td>{{$purchase->QuantityPurchased}}</td>
                        <td>{{$purchase->DateTimeOfPurchase}}</td>
                    </tr>
                    @endforeach
                </table>
                {{ $purchases->links() }}
            </p>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <p><a href="/customer/">Return to Active Customers</a></p>
            </div>
        </div>
    </div>
</div>
@stop