@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">{{$store->StoreName}}'s Inventory</h2>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ItemId</th>
                            <th>Description</th>
                            <th>Quantity In Stock</th>
                        </tr>
                        @foreach ($inventoryItems as $inventoryItem)
                            @foreach($items as $item)
                                @if($item->ItemId == $inventoryItem->ItemId)
                                    <tr>
                                        <td>{{$inventoryItem->ItemId}}</td>
                                        <td>{{$item->Description}}</td>
                                        <td>{{$inventoryItem->QuantityInStock}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </table>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <a href="/storeLocations/">Return to Store Index</a>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
@stop