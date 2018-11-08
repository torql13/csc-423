@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Inactive Inventory Items (With Active Vendors)</h2>
                <p>
                    <ul>
                        <li><a href='/item/addItem'>Add Inventory Item</a></li>
                        <li><a href='/item/'>Manage Active Inventory Items</a></li>
                    </ul>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th><a href="/item/inactiveIndex?sort=Description">Description</a></th>
                            <th><a href="/item/inactiveIndex?sort=VendorName">Vendor</a></th>
                            <th>Edit</th>
                            <th>Restore</th>
                        </tr>
                        @foreach ($items as $item)
                        <tr>
                            <td><a href="/item/viewItem/{{$item->ItemId}}">{{$item->ItemId}}</a></td>
                            <td>{{$item->Description}}</td>
                            <td>{{$item->vendor->VendorName}}
                            <td><a href="/item/editItem/{{$item->ItemId}}">Edit</a></td>
                            <td><a href="/item/restoreItem/{{$item->ItemId}}" onclick="return confirm('Are you sure?');">Restore</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $items->links() }}
                </p>
            </div>
        </div>
    </div>
@stop