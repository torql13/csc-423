@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Items Delivered to {{$store->StoreName}} between {{$startDate}} and {{$endDate}}</h2>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ItemId</th>
                            <th>Description</th>
                            <th>Quantity Ordered</th>
                            <th>Date Delivered</th>
                        </tr>
                        @foreach($orders as $order)
                                    @foreach ($orderDetails as $orderDetail)
                                        @if($order->OrderId == $orderDetail->OrderId)
                                            @foreach($items as $item)
                                                @if($orderDetail->ItemId == $item->ItemId)
                                                    <tr>
                                                        <td>{{$orderDetail->ItemId}}</td>
                                                        <td>{{$item->Description}}</td>
                                                        <td>{{$orderDetail->QuantityOrdered}}</td>
                                                        <td>{{$order->DateTimeOfFulfillment}}
                                                    </tr>
                                                @endif
                                            @endforeach
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