@extends('layouts.conten')
@extends('layouts.hd')

@section('card-header-extra')

@section('title')
@section('card-body')

{{-- <h1><b>List Wisata</b></h1> --}}
<th class="text-center"><center><h1>{{ $events->name}}</h1></center> </th>
<center><img src="{{ asset($events->pic) }}"style='width:500px; height:300px;'>

<table class="  text-center" id="myTable">

    <tbody style="text-align: left">


        <tr>
            <th style="width: 8%;">Nama Event</th>
            <td style="width: 50%"> {{ $events->name}} </td>

        </tr>
        <tr>
            <th style="text-align: left">Lokasi</th>
            <td> {{ $events->location}} </td>
        </tr>
        <tr>
            <th style="text-align: left">Waktu</th>
            <td> {{ $events->day}} || {{ $events->time}} </td>

        </tr>
        <tr>
            <th>Deskripsi</th>
            <td> {{ $events->desc}} </td>
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
@endsection
