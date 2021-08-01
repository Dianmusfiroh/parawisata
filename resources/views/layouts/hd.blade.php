@extends('adminlte::hdr')
{{-- @section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop --}}
{{-- @section('header') --}}
{{-- @yield('header') --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://css.gg/log-in.css' rel='stylesheet'>


<script src="js/app.js"></script>
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
    .transbox {

background-color: black;
opacity: 0.9;

filter: blur(); /* For IE8 and earlier */
/* filter: alpha(opacity=100); For IE8 and earlier */
}
.latar{
    height: 100px;
    }
</style>
<div class="card " ">
    <div class="group">
<div class="card-header bg-orange center " >

    <div class="d-flex " style="margin-left: 30px">
        <div class="flex-shrink-0">
    <img style="margin: 10px" src="{{asset('uploads/logo.jpg')}}" alt="" srcset="" width="90" height="90"  >
</div>
        <div class="flex-grow-3 ms-3 center">

            <br>
 <h4 style="color: white">SISTEM INFORMASI PARAWISATA </h4>
          <h4 style="color: white">  DINAS PARAWISATA KEPEMUDAAN DAN OLAHRAGA KOTA GORONTALO
            </h4> </div>
      </div>
</div></div>

<nav class=" navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/parawisata/public/visit" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/parawisata/public/hotel/list" class="nav-link">Hotel</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/parawisata/public/kuliner/list" class="nav-link">Kuliner</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Wisata
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/parawisata/public/wisata/listalam">Wisata Alam</a>
          <a class="dropdown-item" href="http://localhost/parawisata/public/wisata/listbudaya">Wisata Budaya</a>

        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/parawisata/public/event/list" class="nav-link">Event</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="http://localhost/parawisata/public/login" role="button">
            Log In</a>
        </li>
      </ul>

  </nav>
  @can('list')
@section('content')

<div class="card card-primary card-outline" >

              {{-- <div class="card-header">
                <h3 class="card-title">@yield('card-title-before') {{ Str::title(Str::replaceArray('-',[' '],$modul ?? '')) }}
                    @yield('card-title','List')</h3>
                @yield('card-header-extra')
            </div> --}}
            @endcan
            @yield('card-bb')

        </div>
    </div>
@section('footer')

  <!-- /.navbar -->

