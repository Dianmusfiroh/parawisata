@extends('layouts.conten')
@extends('layouts.hd')

@section('card-header-extra')

@section('title')
@section('card-body')

{{-- <h1><b>List Wisata</b></h1> --}}
<th class="text-center"><center><h1>{{ $hotel->name}}</h1></center> </th>
<center><img src="{{ asset($hotel->pic) }}"style='width:500px; height:300px;'>

<table class="  text-center" id="myTable">

    <tbody style="text-align: left">


        <tr>
            <th style="width: 8%;">Nama Hotel</th>
            <td style="width: 50%"> {{ $hotel->name}} </td>

        </tr>
        <tr>
            <th style="text-align: left">Alamat Hotel</th>
            <td> {{ $hotel->address}} </td>
        </tr>
        <tr>
            <th style="text-align: left">Fasilitas Hotel</th>
            {{-- <td><input type="checkbox" name="fasilitas[]"  value="$hotel->fasilitas[]"> {{ $hotel->fasilitas['']}}</td> --}}
@foreach ( $fa as $item)
<td> {{ $item->fasilitas}} </td>
                    {{-- <input type="checkbox" name="fasilitas[]" value="{{$item->fasilitas}}"> <label>{{$item->fasilitas}}</label> --}}

@endforeach
        </tr>
        <tr>
            <th>Info Hotel</th>
            <td> {{ $hotel->info}} </td>
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
