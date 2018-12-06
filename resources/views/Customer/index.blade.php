@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h2 class="mt-3">Active Customers</h2>
                <p>
                    <ul>
                        <li><a href='/customer/addCustomer'>Add Customer</a></li>
                        <li><a href='/customer/makePurchase'>Log a Customer's Purchase</a></li>
                        <li><a href='/customer/inactiveIndex'>Manage Inactive Customers</a></li>
                    </ul>
                </p>
                <p>
                    <form action="{{ action('CustomersController@searchActive') }}" method="get" id="searchForm" onsubmit="$('#submit').prop('disabled', true);">
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
                                                    <input type="text" class="form-control" name="search" id="search" value="Search by Id or Name" onfocus="this.value='';$('#submit').prop('disabled', false)" />
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
                            @if($search)
                                <th><a href="/customer/searchActive?search={{$search}}&sort=CustomerId">Id</a></th>
                                <th><a href="/customer/searchActive?search={{$search}}&sort=Name">Name</a></th>
                            @else
                                <th><a href="/customer/?sort=CustomerId">Id</a></th>
                                <th><a href="/customer/?sort=Name">Name</a></th>
                            @endif
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->CustomerId}}</td>
                            <td>{{$customer->Name}}</td>
                            <td>{{$customer->Phone}}</td>
                            <td>{{$customer->Email}}</td>
                            <td>
                                <a href="/customer/viewCustomer/{{$customer->CustomerId}}"> <i class="material-icons" style="font-size:36px;color:purple;" title="View">visibility</i></a>
                                <a href="/customer/makePurchase/{{$customer->CustomerId}}"> <i class="material-icons" style="font-size:36px;color:green;" title="Log Purchase">payment</i></a>
                                <a href="/customer/editCustomer/{{$customer->CustomerId}}"> <i class="material-icons" style="font-size:36px;color:blue;" title="Edit">edit</i></a>
                                <a href="/customer/deleteCustomer/{{$customer->CustomerId}}" onclick="return confirm('Are you sure?');"> <i class="material-icons" style="font-size:36px;color:red;" title="Delete">delete</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $customers->links() }}
                </p>
            </div>
        </div>
    </div>
@stop