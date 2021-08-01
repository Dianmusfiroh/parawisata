
    @extends('layouts.app')
    @section('card-title-before','New')
    @section('card-title','Form')
    @section('button-save')
    <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
    @endsection
    @section('back-button',url('/kuliner'))
    @section('form-create')
    <form action="{{ route($modul.'.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @endsection
        @section('card-body')

        <div class="form-group row">
            <div class="label col-md-3">Nama Kuliner </div>
            <div class="col-md-9">
        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama Kuliner">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Alamat</div>

            <div class="col-md-9">
                <textarea class="form-control" name="address" id="address" rows="3"
                    placeholder="Masukkan Alamat"> {{ old('alamat') }} </textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Menu</div>
            <div class="col-md-9">
                <textarea class="form-control" name="menu" id="menu" rows="3"
                placeholder="Masukkan Info"> {{ old('menu') }} </textarea>

            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Harga Menu</div>
            <div class="col-md-9">
                <textarea class="form-control" name="harga" id="harga" rows="3"
                placeholder="Masukkan Info"> {{ old('harga') }} </textarea>

            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Jarak</div>
            <div class="col-md-9">
                <textarea class="form-control" name="jarak" id="jarak" rows="3"
                placeholder="Masukkan Info"> {{ old('jarak') }} </textarea>

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
        {{-- <input type="file" name="pic" id="pic" class="form-control mt-2" placeholder="Foto"> --}}

        {{-- <input type="file" name="pic[]" id="pic[]" class="form-control mt-2" placeholder="Foto" required >
        <input type="file" name="pic[]" id="pic[]" class="form-control mt-2" placeholder="Foto"  > --}}
        <input type="file" name="pic1" id="pic1" class="form-control mt-2" placeholder="Foto"  >
        <input type="file" name="pic2" id="pic2" class="form-control mt-2" placeholder="Foto"  >
        <input type="file" name="pic3" id="pic3" class="form-control mt-2" placeholder="Foto"  >
        <input type="file" name="pic4" id="pic4" class="form-control mt-2" placeholder="Foto"  >
            </div>
        </div>
        @endsection

