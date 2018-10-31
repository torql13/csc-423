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
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Store Code</th>
                            <th>Store Name</th>
                            <th>Manager</th>
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