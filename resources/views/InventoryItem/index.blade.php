@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">All Inventory Items</h2>
                <p>
                    <ul>
                        <li><a href='/item/addItem'>Add Inventory Item</a></li>
                    </ul>
                </p>
                <p>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><a href="/item/?sort=Description">Description</a></th>
                            <th>Size</th>
                            <th>Retail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($items as $item)
                        <tr>
                            <td><a href="/item/viewItem/{{$item->ItemId}}">{{$item->Description}}</a></td>
                            <td>{{$item->Size}}</td>
                            <td>{{$item->ItemRetail}}</td>
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
    <script>
        if(<?php echo Session::get('emptyVendor') ?>)
        {
            alert("Cannot add an Inventory Item. There are no active Vendors.");
            <?php Session::forget('emptyVendor'); ?>
        }
    </script>
@stop