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
                                            <?php if($search): ?>
                                                <td width="300">
                                                    <input type="text" class="form-control" name="search" id="search" value="{{$search}}" />
                                                </td>
                                                <td>
                                                    <input class="btn btn-primary" type="submit" id="submit" value="Search" />
                                                </td>
                                            <?php else: ?>
                                                <td width="300">
                                                    <input type="text" class="form-control" name="search" id="search" value="Search by Id, Description, or Vendor" onfocus="this.value='';$('#submit').prop('disabled', false)" />
                                                </td>
                                                <td>
                                                    <input class="btn btn-primary" type="submit" disabled="true" id="submit" value="Search" />
                                                </td>
                                            <?php endif; ?>
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
                            <?php if($search): ?>
                                <th><a href="/item/searchInactive?search={{$search}}&sort=Description">Description</a></th>
                                <th><a href="/item/searchInactive?search={{$search}}&sort=VendorName">Vendor</a></th>
                            <?php else: ?>
                                <th><a href="/item/?sort=Description">Description</a></th>
                                <th><a href="/item/?sort=VendorName">Vendor</a></th>
                            <?php endif; ?>
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