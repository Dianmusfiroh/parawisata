@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/contact'))
@section('form-create')
<form action="{{ route($modul.'.update', $contact->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')


    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>

        <div class="col-md-9">
            <textarea class="form-control" value="{{$contact->location}}" name="location" id="location" rows="3"
                placeholder="Masukkan Alamat"> {{ $contact->location }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Email</div>
        <div class="col-md-9">
    <input type="text" name="email" id="email" class="form-control mt-2" placeholder="Masukan Email" value="{{$contact->email}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nomor Telp</div>
        <div class="col-md-9">
    <input type="number" name="call" id="call" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$contact->call}}">
        </div>
    </div>
    @endsection
