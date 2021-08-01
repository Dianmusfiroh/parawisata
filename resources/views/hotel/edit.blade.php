@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/hotel'))
@section('form-create')
<form action="{{ route($modul.'.update', $hotel->id)}}" method="POST" enctype="multipart/form-data">
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
                placeholder="Masukkan Alamat"> {{ $hotel->address }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Harga</div>

        <div class="col-md-9">
            <textarea class="form-control" value="{{$hotel->harga}}" name="harga" id="harga" rows="3"
                placeholder="Masukkan Alamat"> {{ $hotel->harga }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jarak</div>

        <div class="col-md-9">
            <textarea class="form-control" value="{{$hotel->jarak}}" name="jarak" id="jarak" rows="3"
                placeholder="Masukkan Alamat"> {{ $hotel->jarak }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">fasilitas</div>
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table">

                                <td><input type="checkbox" name="fasilitas[]"  value="sarapan pagi"> Sarapan Pagi</td>
                                <td><input type="checkbox" name="fasilitas[]" " value="Wi-Fi"> Wi-Fi</td>
                                <td><input type="checkbox" name="fasilitas[]" " value="Restoran"> Restoran</td>
                                <td><input type="checkbox" name="fasilitas[]" " value="Parkir"> Parkir</td>
                                <td><input type="checkbox" name="fasilitas[]" " value="Bebas Rokok"> Bebas Rokok</td>
                                <td><input type="checkbox" name="fasilitas[]" " value="Kolam renang"> Kolam renang</td>
                                <td><input type="checkbox" name="fasilitas[]" " value="Bar"> Bar</td>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Info Lainnya</div>
        <div class="col-md-9">
    <input type="text" value=" {{$hotel->info}}" name="info" id="info" class="form-control mt-2" placeholder="Masukan Info Lainnya">
        </div>
    </div>
    @if ($hotel->pic1 != '')
    <div class="form-group row">
        <div class="label col-md-3">Foto</div>
        <div class="col-md-9">
            <img src="{{asset($hotel->pic1)}}" alt="foto" width="100px;">
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
@if ($hotel->pic2 != '')
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <img src="{{asset($hotel->pic2)}}" alt="foto" width="100px;">
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
            <input type="file" value="{{$hotel->pic2}}" name="pic2" id="pic2" placeholder="pic2 " required>
        </div>
    </div>
@endif
@if ($hotel->pic3 != '')
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <img src="{{asset($hotel->pic3)}}" alt="foto" width="100px;">
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
@if ($hotel->pic2 != '')
    <div class="form-group row">
        <div class="label col-md-3"></div>
        <div class="col-md-9">
            <img src="{{asset($hotel->pic4)}}" alt="foto" width="100px;">
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
