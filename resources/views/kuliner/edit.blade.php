@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/kuliner'))
@section('form-create')
<form action="{{ route($modul.'.update', $edit->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')

    <div class="form-group row">
        <div class="label col-md-3">Nama Kuliner</div>
        <div class="col-md-9">
    <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$edit->name}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>

        <div class="col-md-9">
            <textarea class="form-control" value="{{$edit->address}}" name="address" id="address" rows="3"
                placeholder="Masukkan Alamat"> {{ $edit->address }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Menu</div>
        <div class="col-md-9">
            <textarea class="form-control" name="menu" id="menu" rows="3" values="{{$edit->menu}}"
            placeholder="Masukkan menu"> {{$edit->menu }} </textarea>

        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Harga Menu</div>
        <div class="col-md-9">
            <textarea class="form-control" name="harga" id="harga" rows="3" values="{{$edit->harga}}"
            placeholder="Masukkan menu"> {{$edit->harga }} </textarea>

        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jarak</div>
        <div class="col-md-9">
            <textarea class="form-control" name="jarak" id="jarak" rows="3" values="{{$edit->jarak}}"
            placeholder="Masukkan menu"> {{$edit->jarak }} </textarea>

        </div>
    </div>

    <div class="form-group row">
        <div class="label col-md-3">Info Lainnya</div>
        <div class="col-md-9">
    <input type="text" value="{{$edit->info}}" name="info" id="info" class="form-control mt-2" placeholder="Masukan Info Lainnya">
        </div>
    </div>
    @if ($edit->pic1 != '')
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <img src="{{asset($edit->pic1)}}" alt="foto" width="100px;">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Ganti Foto</div>
        <div class="col-md-9">
            <input type="file" name="pic1" id="pic1" placeholder="pic1 ">
        </div>
    </div>
@else
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <input type="file" name="pic1" id="pic1" placeholder="pic1 " required>
        </div>
    </div>
@endif
@if ($edit->pic2 != '')
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <img src="{{asset($edit->pic2)}}" alt="foto" width="100px;">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <input type="file" name="pic2" id="pic2" placeholder="pic2 ">
        </div>
    </div>
@else
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <input type="file" value="{{$edit->pic2}}" name="pic2" id="pic2" placeholder="pic2 " required>
        </div>
    </div>
@endif
@if ($edit->pic3 != '')
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <img src="{{asset($edit->pic3)}}" alt="foto" width="100px;">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <input type="file" name="pic3" id="pic3" placeholder="pic3 ">
        </div>
    </div>
@else
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <input type="file" name="pic2" id="pic3" placeholder="pic3 " required>
        </div>
    </div>
@endif
@if ($edit->pic2 != '')
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <img src="{{asset($edit->pic4)}}" alt="foto" width="100px;">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <input type="file" name="pic4" id="pic4" placeholder="pic4 ">
        </div>
    </div>
@else
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <input type="file" name="pic4" id="pic4" placeholder="pic4 " required>
        </div>
    </div>
@endif
    @endsection
