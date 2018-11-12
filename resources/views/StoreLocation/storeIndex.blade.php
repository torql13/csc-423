@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">All Stores</h2>
                <p>
                    <ul>
                        <li><a href='/storeLocations/addLocation'>Add Location</a></li>
                    </ul>
                </p>
                <p>
                    <form action="{{ action('StoresController@search') }}" method="get" id="searchForm" onsubmit="$('#submit').prop('disabled', true);">
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
                                                    <input type="text" class="form-control" name="search" id="search" value="Search by Code or Name" onfocus="this.value='';$('#submit').prop('disabled', false)" />
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
                            <th>Store Code</th>
                            <th><a href="/storeLocations/?sort=StoreName">Store Name</a></th>
                            <th><a href="/storeLocations/?sort=ManagerName">Manager</a></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($locationList as $storeLocation)
                        <tr>
                            <td><a href="/storeLocations/view/{{$storeLocation->StoreId}}">{{$storeLocation->StoreCode}}</a></td>
                            <td>{{$storeLocation->StoreName}}</td>
                            <td>{{$storeLocation->ManagerName}}</td>
                            <td><a href="/storeLocations/editLocation/{{ $storeLocation->StoreId }}">Edit</a></td>
                            <td><a href="/storeLocations/deleteLocation/{{ $storeLocation->StoreId }}" onclick="return confirm('Are you sure?');">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $locationList->links() }}
                </p>
            </div>
        </div>
    </div>
@stop