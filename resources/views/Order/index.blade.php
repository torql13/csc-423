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
                    <form action="{{ action('OrdersController@search') }}" method="get" id="searchForm" onsubmit="$('#submit').prop('disabled', true);">
                        <fieldset>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <table>
                                        <tr>
                                            @if($search)
                                                <td width="300">
                                                    <input type="text" class="form-control" name="search" id="search" value="{{$search}}" />
                                                </td>
                                                <td>
                                                    <input class="btn btn-primary" type="submit" id="submit" value="Search" />
                                                </td>
                                            @else
                                                <td width="300">
                                                    <input type="text" class="form-control" name="search" id="search" value="Search by OrderId" onfocus="this.value='';$('#submit').prop('disabled', false)" />
                                                </td>
                                                <td>
                                                    <input class="btn btn-primary" type="submit" disabled="true" id="submit" value="Search" />
                                                </td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>OrderId</th>
                            <th>DateTimeOfOrder</th>
                            <th>Status</th>
                            <th>Add Items to Order</th>
                            <th>Delivery</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td><a href="/order/viewOrder/{{$order->OrderId}}">{{$order->OrderId}}</a></td>
                            <td>{{$order->DateTimeOfOrder}}</td>
                            <td>{{$order->Status}}</td>
                            <td><a href="/order/addDetailsExistingOrder/{{$order->OrderId}}" >Add to Order</a></td>
                            <td><a href="/order/processDelivery/{{$order->OrderId}}" onclick="return confirm('Process this delivery?');">Process Delivery</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $orders->links() }}
                </p>
            </div>
        </div>
    </div>
@stop