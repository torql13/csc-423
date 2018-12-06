@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h2 class="mt-3">Items Returned to blah  between blah and blah</h2>
-->             <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ItemId</th>
                            <th>Description</th>
                            <th>Item Cost</th>
                            <th>Retail Cost</th>
                            <th>Quantity Returned</th>
                        </tr>

                        @foreach($final as $f)
                            <tr>
                                <td>{{$f['itemId']}}</td>
                                <td>{{$f['Description']}}</td>
                                <td>{{$f['ItemCost']}}</td>
                                <td>{{$f['ItemRetail']}}</td>
                                <td>{{$f['quantity']}}</td>
                            </tr>
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