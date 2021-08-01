@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/event'))
@section('form-create')
<form action="{{ route($modul.'.update', $event->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')

    <div class="form-group row">
        <div class="label col-md-3">Nama Event</div>
        <div class="col-md-9">
    <input type="text" name="nama" id="nama" class="form-control mt-2" placeholder="Masukan Nama Event" value="{{$event->nama}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Waktu</div>

        <div class="col-md-9">
            <input type="date" value="{{$event->day}}" name="day" id="day" class="form-control mt-2" placeholder="Masukan Nama Hotel">
                <input type="time" value="{{$event->time}}" name="time" id="time" class="form-control mt-2" placeholder="Masukan Nama Hotel">

        </div>
    </div>

    <div class="form-group row">
        <div class="label col-md-3">Lokasi</div>
        <div class="col-md-9">
    <input type="text" value=" {{$event->location}}" name="location" id="location" class="form-control mt-2" placeholder="Masukan Info Lainnya">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Deskripsi</div>
        <div class="col-md-9">
    <input type="text" value=" {{$event->desc}}" name="desc" id="desc" class="form-control mt-2" placeholder="Masukan Info Lainnya">
        </div>
    </div>
    @if ($event->pic != '')
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <img src="{{asset($event->pic)}}" alt="foto" width="100px;">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Ganti Foto</div>
        <div class="col-md-9">
            <input type="file" name="pic" id="pic" placeholder="pic ">
        </div>
    </div>
@else
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <input type="file" name="pic" id="pic" placeholder="pic " required>
        </div>
    </div>
@endif
    @endsection
