

@extends('layouts.conten')
@extends('layouts.hd')



@section('card-header-extra')

@section('title')
@section('card-body')

<div class="col">
    <div class="card" style="background-color: grey;">
        <div class="card-body border-0 text-center  text-white">
            <h2>Event</h2>
            <h3></h3>
            {{-- <h2><strong>{{ $item->name }}</strong></h2> --}}
        </div>
    </div>
</div>
<div>
<h1></h1>
</div>
{{-- <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div> --}}
  @foreach ( $events as $item )

{{-- <div class=" "> --}}

    <div class="con floating-box">
        <a href="{{ route($modul.'.show', $item->id) }}">
 <img src="{{ asset($item->pic) }}" alt="Avatar" class="image">
        <div class="overlay">{{ $item->name }}</div>
    </a>
      </div>
{{-- </div> --}}
@endforeach
</div>
{{-- @foreach ($kuliners as $key => $item)

<div class="card-deck "> --}}
{{-- <div class="card-group"> --}}

    {{-- <div class="col-3"> --}}

{{-- <div class="card" style="width: 18rem;"> --}}

    {{-- <div class="card" > --}}
      {{-- <img class="card-img-top" src="{{ asset($item->pic) }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Wisata</h5>
        <p class="card-text"><a href="{{ route($modul.'.show', $item->id) }}"><strong>{{ $item->name }}</strong></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
      {{-- </div>
    </div>
        @endforeach
    </tbody>
 </table> --}}


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

