
    @extends('layouts.app')
    @section('card-title-before','New')
    @section('card-title','Form')
    @section('button-save')
    <button type="submit" class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
    @endsection
    @section('back-button',url('/wisata'))
    @section('form-create')
    <form action="{{ route($modul.'.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @endsection
        @section('card-body')
        <div class="form-group row">
            <div class="label col-md-3">Kategori</div>
            <div class="col-md-9">
                    <select name="kategori_wisata_id" id="kategori_wisata_id" class="form-control" ">
                        <option value="">Pilih Kategori</option>
                        {{-- @foreach ($jabatan as $item) --}}
                    @foreach ($category as $item)

                            <option value=" {{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Nama Wisata</div>
            <div class="col-md-9">
        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama Wisata">
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
            <div class="label col-md-3">Deskripsi</div>
            <div class="col-md-9">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                placeholder="Masukkan Info"> {{ old('deskripsi') }} </textarea>

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
            <div class="label col-md-3">Foto</div>
            <div class="col-md-9">
        <input type="file" name="pic1" id="pic1" class="form-control mt-2" placeholder="Foto">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Foto</div>
            <div class="col-md-9">
        <input type="file" name="pic2" id="pic2" class="form-control mt-2" placeholder="Foto">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Foto</div>
            <div class="col-md-9">
        <input type="file" name="pic3" id="pic3" class="form-control mt-2" placeholder="Foto">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Foto</div>
            <div class="col-md-9">
        <input type="file" name="pic4" id="pic4" class="form-control mt-2" placeholder="Foto">
            </div>
        </div>        @endsection

