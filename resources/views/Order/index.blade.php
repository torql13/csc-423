@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">All Orders</h2>
                <p>
                    <ul>
                        <li><a href='/order/newOrder'>Create New Order</a></li>
                    </ul>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>OrderId</th>
                            <th>VendorId</th>
                            <th>StoreId</th>
                            <th>DateTimeOfOrder</th>
                            <th>Status</th>
                            <th>DateTimeOfFulfillment</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td><a href="/order/viewOrder/{{$order->OrderId}}">{{$order->OrderId}}</a></td>
                            <td>{{$order->VendorId}}</td>
                            <td>{{$order->StoreId}}</td>
                            <td>{{$order->DateTimeOfOrder}}</td>
                            <td>{{$order->Status}}</td>
                            <td>{{$order->DateTimeOfFulfillment}}</td>
                            <td><a href="/order/editOrder/{{$order->OrderId}}">Edit</a></td>
                            <td><a href="/order/deleteOrder/{{$order->OrderId}}" onclick="return confirm('Are you sure?');">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $orders->links() }}
                </p>
            </div>
        </div>
    </div>
@stop