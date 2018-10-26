@extends('layouts.main')

@section('content')
<div class="addLocation">
   <form action="{{ action('StoresController@insertNewLocation') }}" method="post" id="addLocationForm">
    <table align="center">
        <tr>
            <td> Store Code: </td>
            <td> <input type="text" name="storeCode" id="storeCode" /> </td>
        </tr>
        <tr>
            <td> Store Name: </td>
            <td> <input type="text" name="storeName" id="storeName" /> </td>
        </tr>
        <br/>
        <tr>
            <td> Address: </td>
            <td> <input type="text" name="storeAddress" id="storeAddress" /> </td>
        </tr>
        <br/>
        <tr>
            <td> City: </td>
            <td> <input type="text" name="storeCity" id="storeCity" /> </td>
            <td> State: </td>
            <td> <input type="text" name="storeState" id="storeState" size="2" /> </td>
            <td> ZIP: </td>
            <td> <input type="text" name="storeZip" id="storeZip" size="5" /> </td>
        </tr>
        <br/>
        <tr>
            <td> Phone: </td>
            <td> <input type="text" name="storePhone" id="storePhone" size="10"/> </td>
        </tr>
        <br/>
        <tr>
            <td> Manager: </td>
            <td> <input type="text" name="storeManager" id="storeManager" /> </td>
        </tr>
        <br/>
        <tr>
            <td> <input type="submit" value="Submit" /> </td>
            <td> <input type="reset" value="Reset" /> </td>
        </tr>
    </table>
    </form>
@stop