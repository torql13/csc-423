@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h2 class="mt-3">Active Stores</h2>
                <p>
                    <ul>
                        <li><a href='/storeLocations/addLocation'>Add Store</a></li>
                        <li><a href='/customer/makePurchase'>Log a Customer's Purchase</a></li>
                        <li><a href='/storeLocations/inactiveIndex'>Manage Inactive Stores</a></li>
                    </ul>
                </p>
                <p>
                    <form action="{{ action('StoresController@searchActive') }}" method="get" id="searchForm" onsubmit="$('#submit').prop('disabled', true);">
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
                                                    <input type="text" class="form-control" name="search" id="search" value="Search by Code or Name" onfocus="this.value='';$('#submit').prop('disabled', false)" />
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
                            <th>Store Code</th>
                            @if($search)
                                <th><a href="/storeLocations/search?search={{$search}}&sort=StoreName">Store Name</a></th>
                                <th><a href="/storeLocations/search?search={{$search}}&sort=ManagerName">Manager</a></th>
                            @else
                                <th><a href="/storeLocations/?sort=StoreName">Store Name</a></th>
                                <th><a href="/storeLocations/?sort=ManagerName">Manager</a></th>
                            @endif
                            <th>Actions</th>
                        </tr>
                        @foreach ($locationList as $storeLocation)
                        <tr>
                            <td>{{$storeLocation->StoreCode}}</a></td>
                            <td>{{$storeLocation->StoreName}}</td>
                            <td>{{$storeLocation->ManagerName}}</td>
                            <td>
                                <a href="/storeLocations/view/{{$storeLocation->StoreId}}"> <i class="material-icons" style="font-size:36px;color:purple;" title="View">visibility</i></a>
                                <a href="/customer/makePurchase/0/{{$storeLocation->StoreId}}"> <i class="material-icons" style="font-size:36px;color:green;" title="Log Purchase">payment</i></a>
                                <a href="/storeLocations/editLocation/{{ $storeLocation->StoreId }}"> <i class="material-icons" style="font-size:36px;color:blue;" title="Edit">edit</i></a>
                                <a href="/storeLocations/deleteLocation/{{ $storeLocation->StoreId }}" onclick="return confirm('Are you sure?');"> <i class="material-icons" style="font-size:36px;color:red;" title="Delete">delete</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $locationList->links() }}
                </p>
            </div>
        </div>
    </div>
@stop