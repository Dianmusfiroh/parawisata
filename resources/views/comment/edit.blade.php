@extends('layouts.app')
@section('card-title-before','New')
@section('card-title','Form')
@section('button-save')
<button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
    Simpan</button>
@endsection
@section('back-button',url('/comment'))
@section('form-create')
<form action="{{ route($modul.'.update', $comment->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @endsection
    @section('card-body')

    <div class="form-group row">
        <div class="label col-md-3">Nama </div>
        <div class="col-md-9">
    <input type="text" name="location" id="location" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$comment->location}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Email </div>
        <div class="col-md-9">
    <input type="text" name="email" id="email" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$comment->email}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Subject </div>
        <div class="col-md-9">
    <input type="text" name="subject" id="subject" class="form-control mt-2" placeholder="Masukan Nama Hotel" value="{{$comment->subject}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="label col-md-3">Pesan</div>

        <div class="col-md-9">
            <textarea class="form-control" readonly value="{{$comment->messege}}" name="messege" id="messege" rows="3"
                placeholder="Masukkan Alamat">  {{ $comment->messege }} </textarea>
        </div>
    </div>
    @endsection
