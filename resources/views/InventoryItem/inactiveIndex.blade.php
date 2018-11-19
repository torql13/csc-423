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
                    <form action="{{ action('InventoryItemsController@searchInactive') }}" method="get" id="searchForm" onsubmit="$('#submit').prop('disabled', true);">
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
                                                    <input type="text" class="form-control" name="search" id="search" value="Search by Id, Description, or Vendor" onfocus="this.value='';$('#submit').prop('disabled', false)" />
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
                            <th>Id</th>
                            @if($search)
                                <th><a href="/item/searchInactive?search={{$search}}&sort=Description">Description</a></th>
                                <th><a href="/item/searchInactive?search={{$search}}&sort=VendorName">Vendor</a></th>
                            @else
                                <th><a href="/item/?sort=Description">Description</a></th>
                                <th><a href="/item/?sort=VendorName">Vendor</a></th>
                            @endif
                            <th>Actions</th>
                        </tr>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{$item->ItemId}}</td>
                            <td>{{$item->Description}}</td>
                            <td>{{$item->vendor->VendorName}}
                            <td><a href="/item/viewItem/{{$item->ItemId}}"> <i class="material-icons" style="font-size:36px;color:green;" title="View">visibility</i></a>
                                <a href="/item/editItem/{{$item->ItemId}}"> <i class="material-icons" style="font-size:36px;color:blue;" title="Edit">edit</i></a>
                                <a href="/item/restoreItem/{{$item->ItemId}}" onclick="return confirm('Are you sure?');"> <i class="material-icons" style="font-size:36px;color:red;" title="Restore">restore_from_trash</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $items->links() }}
                </p>
            </div>
        </div>
    </div>
@stop