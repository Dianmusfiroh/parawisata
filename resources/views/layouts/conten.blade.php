{{-- @extends('adminlte::page') --}}

<!DOCTYPE html>
<html lang="en">


<head>
    {{-- <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://css.gg/log-in.css' rel='stylesheet'>
<style>
    .Limelight{
     font-family: 'Limelight';
     font-size: 30pt;
 }
 .con {
  position: relative;
  width: 50%;
  max-width: 300px;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: static ;
  bottom: 0;
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1;
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}

.con:hover .overlay {
  opacity: 1;
}
.floating-box {
    float: left;
    /* width: 150px;
    height: 100px; */
    margin: 30px;
}
.bg-header {
    background-color: rgba(245, 126, 29, 0.945);
    height: auto;
    width: auto;
    /* margin-left: 50%; */
}
</style>

</head>



@can('list')
@section('content')
<div class="card card-primary card-outline" >

              <div class="card-header " style="background-color: white">
                <h3 class="card-title">@yield('card-title-before') {{ Str::title(Str::replaceArray('-',[' '],$modul ?? '')) }}
                    @yield('card-title','List')</h3>
                @yield('card-header-extra')
            </div>
            @endcan
              <div class="card-body body " style="background-color: white">
                @yield('card-body')
            </div>
</div>

{{-- @include('layouts.hd') --}}
@section('footer')
