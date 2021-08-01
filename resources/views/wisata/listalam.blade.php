
@extends('layouts.conten')
@extends('layouts.hd')

@section('card-header-extra')

@section('title')
@section('card-body')

<div class="col">
    <div class="card" style="background-color: grey;">
        <div class="card-body border-0 text-center  text-white">
            <h2>Wisata Alam</h2>
            <h3></h3>
        </div>
    </div>
</div>
<div>
<h1></h1>
</div>

  @foreach ( $alam as $item )


  <div class="container">

    <div class="con floating-box">
        <a href="{{ route($modul.'.show', $item->id) }}">
 <img src="{{ asset($item->pic) }}" alt="Avatar" class="image">
        <div class="overlay">{{ $item->name }}</div>
    </a>
      </div>
    </div>
@endforeach
</div>




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

