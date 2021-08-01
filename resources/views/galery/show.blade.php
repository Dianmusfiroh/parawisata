@extends('layouts.conten')
@extends('layouts.hd')

@section('card-header-extra')

@section('title')
@section('card-body')
@guest

{{-- <h1><b>List Wisata</b></h1> --}}
<th class="text-center"><center><h1>{{ $wisatum->name}}</h1></center> </th>
<center><img src="{{ asset($wisatum->pic) }}"style='width:500px; height:300px;'>

<table class="  text-center" id="myTable">

    <tbody style="text-align: left">


        <tr>
            <th style="width: 8%;">Nama Wisata</th>
            <td style="width: 50%"> {{ $wisatum->name}} </td>

        </tr>
        <tr>
            <th style="text-align: left">Alamat Wisata</th>
            <td> {{ $wisatum->address}} </td>
        </tr>
        <tr>
            <th>Info Wisata</th>
            <td> {{ $wisatum->info}} </td>
        </tr>
        <tr>
            <th>Sejarah Wisata</th>
            <td><p> {{ $wisatum->history}}</p> </td>
        </tr>
        {{-- @endforeach --}}
    </tbody>
 </table>

@endguest
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
