@extends('layouts.conten')
@extends('layouts.hd')



@section('card-header-extra')
@guest
@section('title')
@section('card-body')
<h1><b>List Wisata</b></h1>
<table class="  text-center" id="myTable">
    <thead>
        <tr>
            <th style="width: 4%;">No</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wisatum as $key => $item)
        <tr>
            <td>{{ ($key+1) }}</td>
            <td><a href="{{ route($modul.'.show', $item->id) }}">{{ $item->name }}</a></td>

        </tr>
        @endforeach
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
