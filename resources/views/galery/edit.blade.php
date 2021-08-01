@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/hotel'))
@section('form-create')
<form action="{{ route($modul.'.update', $hotel->id)}}" method="POST">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')

    <div class="form-group row">
        <div class="label col-md-3">Nama Hotel</div>
        <div class="col-md-9">
    <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$hotel->name}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>

        <div class="col-md-9">
            <textarea class="form-control" value="{{$hotel->address}}" name="address" id="address" rows="3"
                placeholder="Masukkan Alamat"> {{ old('alamat') }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Fasilitas</div>
        <div class="col-md-9">
            <textarea class="form-control" name="facilities" id="facilities" rows="3" values="{{$hotel->facilities}}"
            placeholder="Masukkan facilities"> {{ old('facilities') }} </textarea>

        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Info Lainnya</div>
        <div class="col-md-9">
    <input type="text" name="info" id="info" class="form-control mt-2" placeholder="Masukan Info Lainnya">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
    <input type="text" name="pic" id="pic" class="form-control mt-2" placeholder="Foto">
        </div>
    </div>
    @endsection
