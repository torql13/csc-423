@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-12"> Information for {{ $storeLocation->StoreName}} </h3>
            <table name="addressTable">
                <tr>
                    <th> Store Code: </th> <td> {{ $storeLocation->StoreCode }} </td>
                </tr>
                <tr>
                    <th> Address: </th> <td> {{ $storeLocation->Address}} </td> 
                </tr>
                <tr>
                    <td></td> <td> {{ $storeLocation->City }}, {{ $storeLocation->State}} {{$storeLocation->ZIP }} </td>
                </tr>
                <tr> 
                    <th> Phone: </th> <td> {{ $storeLocation->Phone }} </td>
                </tr>
                <tr>
                    <th> Manager: </th> <td> {{ $storeLocation->ManagerName}} </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@stop