@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/kuliner'))
@section('form-create')
<form action="{{ route($modul.'.update', $wisata->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')
    <div class="form-group row">
        <label for="kategori_wisata_id" class="label col-sm-3 col-form-label">Kategori</label>
        <div class="col-sm-9">
            <select name="kategori_wisata_id" id="kategori_wisata_id" class="custom-select mt-2" required>
                <option selected>Pilih Kategori</option>
                @foreach ($category as $item)
                    @if ($item->id == $wisata->kategori_wisata_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Nama Wisata</div>
        <div class="col-md-9">
    <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$wisata->name}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Alamat</div>

        <div class="col-md-9">
            <textarea class="form-control" value="{{$wisata->address}}" name="address" id="address" rows="3"
                placeholder="Masukkan Alamat"> {{ $wisata->address }} </textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="label col-md-3">Deskripsi</div>
        <div class="col-md-9">
            <textarea class="form-control" value="{{$wisata->deskripsi}}" name="deskripsi" id="deskripsi" rows="3"
                placeholder="Masukkan Deskripsi"> {{ $wisata->deskripsi }} </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Jarak</div>
        <div class="col-md-9">
            <textarea class="form-control" value="{{$wisata->jarak}}" name="jarak" id="jarak" rows="3"
                placeholder="Masukkan Deskripsi"> {{ $wisata->jarak }} </textarea>
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

    @endsection
