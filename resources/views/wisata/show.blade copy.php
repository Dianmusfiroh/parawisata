@extends('layouts.conten')
@extends('layouts.hd')

@section('card-header-extra')

{{-- @section('title') --}}
@section('card-body')
{{-- @guest --}}

{{-- <h1><b>List Wisata</b></h1> --}}
@foreach ( $wis as $item )

<th class="text-center"><center><h1>{{ $item->name}}</h1></center> </th>
<center><img src="{{ asset($item->pic1) }}"style='width:500px; height:300px;'>

<table class="  text-center" id="myTable">

    <tbody style="text-align: left">
{{-- @foreach ( $wisatum as $key => $item) --}}


        <tr>
            <th style="width: 8%;">Nama Wisata</th>
            <td style="width: 50%"> {{ $item->name}} </td>

        </tr>
        <tr>
            <th style="text-align: left">Alamat Wisata</th>
            <td> {{ $item->address}} </td>
        </tr>
        <tr>
            <th>Deskripsi Wisata</th>
            <td> {{ $item->deskripsi}} </td>
        </tr>
        <tr>
            <th>kategori Wisata</th>
            <td> {{ $item->kategori}} </td>
        </tr>
        {{-- @endforeach --}}
        @endforeach

        {{-- @endforeach --}}
    </tbody>
 </table>

{{-- @endguest --}}
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
