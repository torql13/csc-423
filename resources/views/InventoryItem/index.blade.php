@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Active Inventory Items</h2>
                <p>
                    <ul>
                        <li><a href='/item/addItem'>Add Inventory Item</a></li>
                        <li><a href='/item/inactiveIndex'>Manage Inactive Inventory Items</a></li>
                    </ul>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            
                            <th>Id</th>
                            <th><a href="/item/?sort=Description">Description</a></th>
                            <th>Retail</th>
                            <th>Vendor</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($items as $item)
                        <tr>
                            <td><a href="/item/viewItem/{{$item->ItemId}}">{{$item->ItemId}}</a></td>
                            <td>{{$item->Description}}</td>
                            <td>{{$item->ItemRetail}}</td>
                            <td>{{$item->vendor->VendorName}}
                            <td><a href="/item/editItem/{{$item->ItemId}}">Edit</a></td>
                            <td><a href="/item/deleteItem/{{$item->ItemId}}" onclick="return confirm('Are you sure?');">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $items->links() }}
                </p>
            </div>
        </div>
    </div>
    <?php 
        if(Session::has('emptyVendor')): ?>
            <script>
                alert("Cannot add an Inventory Item. There are no active Vendors.");
            </script>
            <?php Session::forget('emptyVendor');
        elseif(Session::has('noItem')): ?>
            <script>
                alert("This Inventory Item does not exist.");
            </script>
            <?php Session::forget('noItem');
        endif; ?>
@stop