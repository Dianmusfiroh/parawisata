


  {{-- @extends('layouts.app') --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

        <form action="{{ route($modul.'.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

        <table class="table " id="dynamicAddRemove">
            <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
            </tr>
            <tr>
            <td><input type="text" name="moreFields[0][name]" placeholder="Enter title" class="form-control" /></td>
            <td><input type="text" name="moreFields[0][harga]" placeholder="Enter title" class="form-control" /></td>
            {{-- <td><input type="text" name="name" placeholder="Enter title" class="form-control" /></td> --}}
            {{-- <td><input type="text" name="harga" placeholder="Enter description" class="form-control" /></td> --}}
            <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>
            </tr>

            </table>

            <button type="submit"  class="btn btn-primary float-right ml-2" title="Save"><i class="fas fa-fw fa-save"></i>
                Simpan</button>

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
