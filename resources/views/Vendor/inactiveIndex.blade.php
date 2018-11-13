@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Inactive Vendors</h2>
                <p>
                    <ul>
                        <li><a href='/vendor/addVendor'>Add Vendor</a></li>
                        <li><a href='/vendor/'>Manage Active Vendors</a></li>
                    </ul>
                </p>
                <p>
                    <form action="{{ action('VendorsController@searchInactive') }}" method="get" id="searchForm" onsubmit="$('#submit').prop('disabled', true);">
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
                            <th>Vendor Code</th>
                            @if($search)
                                <th><a href="/vendor/?search={{$search}}&sort=VendorName">Vendor Name</a></th>
                                <th><a href="/vendor/?search={{$search}}&sort=ContactPersonName">Contact</a></th>
                            @else
                                <th><a href="/vendor/?sort=VendorName">Vendor Name</a></th>
                                <th><a href="/vendor/?sort=ContactPersonName">Contact</a></th>
                            @endif
                            <th>Edit</th>
                            <th>Restore</th>
                        </tr>
                        @foreach ($vendorList as $vendor)
                        <tr>
                            <td><a href="/vendor/view/{{$vendor->VendorId}}">{{$vendor->VendorCode}}</a></td>
                            <td>{{$vendor->VendorName}}</td>
                            <td>{{$vendor->ContactPersonName}}</td>
                            <td><a href="/vendor/editVendor/{{$vendor->VendorId}}">Edit</a></td>
                            <td><a href="/vendor/restoreVendor/{{$vendor->VendorId}}" onclick="return confirm('Are you sure?');">Restore</a></td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $vendorList->links() }}
                </p>
            </div>
        </div>
    </div>
@stop