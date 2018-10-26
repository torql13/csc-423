@extends('layouts.main')

@section('content')
<div class="editLocation">
   <form action="{{ action('StoresController@updateLocation') }}" method="post" id="editLocationForm">
    <table align="center">
        <tr>
            <td>Store Code: </td>
            <td> <input type="text" name="storeCode" id="storeCode" value="{{ location->StoreCode }}" /> </td>
        </tr>
        <tr>
            <td> Store Name: </td>
            <td> <input type="text" name="storeName" id="storeName" value="{{ location->StoreName }}" /> </td>
        </tr>
        <br/>
        <tr>
            <td> Address: </td>
            <td> <input type="text" name="storeAddress" id="storeAddress" value="{{ location->Address }}"/> </td>
        </tr>
        <br/>
        <tr>
            <td> City: </td>
            <td> <input type="text" name="storeCity" id="storeCity" value="{{ location->City }}" /> </td>
            <td> State: </td>
            <td> <input type="text" name="storeState" id="storeState" size="2"  value="{{ location->State }}"/> </td>
            <td> ZIP: </td>
            <td> <input type="text" name="storeZip" id="storeZip" size="5" value="{{ location->ZIP }}" /> </td>
        </tr>
        <br/>
        <tr>
            <td> Phone: </td>
            <td> <input type="text" name="storePhone" id="storePhone" size="10" value="{{ location->Phone }}" /> </td>
        </tr>
        <br/>
        <tr>
            <td> Manager: </td>
            <td> <input type="text" name="storeManager" id="storeManager" value="{{ location->ManagerName }}" /> </td>
        </tr>
        <br/>
        <tr>
            <td> <input type="submit" value="Submit" /> </td>
            <td> <input type="reset" value="Reset" /> </td>
        </tr>
    </table>
    </form>
@stop