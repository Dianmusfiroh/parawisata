
    @extends('layouts.app')
    @section('card-title-before','New')
    @section('card-title','Form')
    @section('button-save')
    <button type="submit"  class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
    @endsection
    @section('back-button',url('/event'))
    @section('form-create')
    <form action="{{ route($modul.'.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @endsection
        @section('card-body')

        <div class="form-group row">
            <div class="label col-md-3">Nama event</div>
            <div class="col-md-9">
        <input type="text" name="nama" id="nama" class="form-control mt-2" placeholder="Masukan Nama Event">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Waktu</div>

            <div class="col-md-9">
                <input type="date" name="day" id="day" class="form-control mt-2" placeholder="Masukan Nama Hotel">
                <input type="time" name="time" id="time" class="form-control mt-2" placeholder="Masukan Nama Hotel">

            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Lokasi</div>
            <div class="col-md-9">
        <input type="text" name="location" id="location" class="form-control mt-2" placeholder="Masukan Lokasi">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Deskripis</div>
            <div class="col-md-9">
        <input type="text" name="desc" id="desc" class="form-control mt-2" placeholder="Masukan Deskripsi">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Foto</div>
            <div class="col-md-9">
        <input type="file" name="pic" id="pic" class="form-control mt-2" placeholder="Foto">
            </div>
        </div>
        @endsection
@section('plugins.Select2', true)
@section('js')
<script>
    $("#checkAll").click(function(){
            $('input:hotel').not(this).prop('checked', this.checked);
            // const volumes = document.

        });

}
</script>
