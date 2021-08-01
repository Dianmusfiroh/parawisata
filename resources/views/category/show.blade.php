@extends('layouts.conten')
@extends('layouts.hd')
@section('card-header-extra')

@section('title')
@section('card-body')

{{-- <h1><b>List Wisata</b></h1> --}}
<th class="text-center"><center><h1>{{  $kuliner->name}}</h1></center> </th>
<center><img src="{{ asset(  $kuliner->pic1) }}"style='width:500px; height:300px;'>
{{-- <dd>($kuliner->pic)</dd> --}}
<table class="  text-center" id="myTable">

    <tbody style="text-align: left">


        <tr>
            <th style="width: 8%;">Nama Kuliner</th>
            <td style="width: 50%"> {{   $kuliner->name}} </td>

        </tr>
        <tr>
            <th style="text-align: left">Alamat </th>
            <td> {{   $kuliner->address}} </td>
        </tr>
        <tr>
            <th>Info Kuliner</th>
            <td> {{   $kuliner->info}} </td>
        </tr>

        {{-- @endforeach --}}
    </tbody>
 </table>

@endsection

@endsection
@section('plugins.Datatables', true)
@section('js')
<script>
    $("#myTable").DataTable({
                    "autoWidth": false,
                    "responsive": true
                });
</script>
@include('layouts.script.delete')
@endsection
