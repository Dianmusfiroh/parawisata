


  @extends('layouts.app')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>

    @section('card-title-before','New')
    @section('card-title','Form')
    @section('button-save')
    <button type="submit"  class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
        Simpan</button>
    @endsection
    @section('back-button',url('/hotel'))
    @section('form-create')
    <form action="{{ route($modul.'.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @endsection

        @section('card-body')
        <div class="form-group row">
            <div class="label col-md-3">Nik Guru</div>
            <div class="col-md-9">
                <select name="peserta[]" id="peserta" multiple class="form-control">

                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Nama Hotel</div>
            <div class="col-md-9">
        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Masukan Nama Hotel">
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Alamat</div>

            <div class="col-md-9">
                <textarea class="form-control" name="alamat" id="address" rows="3"
                    placeholder="Masukkan Alamat"> {{ old('alamat') }} </textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Harga</div>

            <div class="col-md-9">
                <textarea class="form-control" name="harga" id="harga" rows="3"
                    placeholder="Masukkan Alamat"> {{ old('harga') }} </textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="label col-md-3">Jarak</div>

            <div class="col-md-9">
                <textarea class="form-control" name="jarak" id="jarak" rows="3"
                    placeholder="Masukkan Alamat"> {{ old('jarak') }} </textarea>
            </div>
        </div>
        {{-- <div class="form-group row">
            <div class="label col-md-3">Jabatan</div>
            <div class="col-md-9">
                    <select name="fasilitas_id" id="fasilitas_id" class="form-control" ">
                        <option value="">Pilih Jabatan</option>
                        {{-- @foreach ($jabatan as $item) --}}
                    {{-- @foreach ($fasilitas as $item)

                            <option value=" {{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
            </div> --}}
        {{-- </div> --}}
        {{-- <div class="form-group row">
            <div class="label col-md-3">Fasilitas</div>
            <div class="col-md-9">
                    {{-- <select name="fasilitas_id" id="fasilitas_id" class="form-control" "> --}}
                        {{-- {{-- <div class="row"> --}}

                    {{-- @foreach ($fasilitas as $item) --}}
                        {{-- <div class="col-md-2">
                    {{-- <input type="checkbox" name="fasilitas[]"  data-option-name="{{ $item['name'] }}"  value="{{ $item['id'] }}"> {{ $item['name'] }} --}}
                    {{-- <input type="checkbox" name="fasilitas[]" value="{{$item->id}}"> <label>{{$item->name}}</label> --}}

                        {{-- <input type="checkbox" name="fasilitas[]" id="{{$item->id}}"  value=" {{ $item->id }}"  >{{$item->id}} --}}
                        {{-- <input type="checkbox" name="fasilitas[]" value="{{$item->id}}"> {{$item->name}} --}}
                     {{-- </div>
                                         @endforeach
                </div>
            </div>
       </div> --}}
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
        <input type="text" name="info" id="info" class="form-control mt-2" placeholder="Masukan Info Lainnya">
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
        </div>
        @endsection
@section('plugins.Select2', true)
@section('js')




<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="moreFields['+i+'][name]" placeholder="" class="form-control" /></td><td><input type="number" name="moreFields['+i+'][harga]" placeholder="" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){
$(this).parents('tr').remove();
});
// });
//    // $("#checkAll").click(function(){
//     //         $('input:hotel').not(this).prop('checked', this.checked);
//     //         // const volumes = document.

//     //     });
</script>
{{-- @include('layouts.script.addMore') --}}
@section('js')
    <script>
        $( "#peserta" ).select2({
            ajax: {

                url: "{{url('visit/search')}}",
                dataType: 'json',
                delay: 250,
                data: function (term, page) {
                    return {
                        search: term.term, // search term
                        searchFields:'name:like'

                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
    </script>
@endsection
