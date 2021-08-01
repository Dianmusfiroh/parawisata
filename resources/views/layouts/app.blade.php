@extends('adminlte::page')
@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@stop
@section('title')
{{ Str::title(Str::replaceArray('-',[' '],$modul ?? '')) }}
@stop

@section('content_header')
<h1>{{ Str::title(Str::replaceArray('-',[' '],$modul ?? '')) }}</h1>
@stop
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">@yield('card-title-before') {{ Str::title(Str::replaceArray('-',[' '],$modul ?? '')) }}
            @yield('card-title','List')</h3>
        @yield('card-header-extra')
    </div>
    @hasSection ('form-create')
    @yield('form-create')

    <div class="card-body">
        {{-- @csrf --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>

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
        @yield('card-body')
    </div>
    <div class="card-footer">
        @hasSection ('button-save')
        @yield('button-save')
        @else
        <button type="button" class="btn btn-primary float-right" title="Save" onclick="formSubmit()"><i
                class="fas fa-fw fa-save"></i> Save</button>
        @endif
        <a href="@yield('back-button',url('apps/master/'.$modul ?? ''))" class="btn btn-default"><i
                class="fas fa-fw fa-arrow-left"></i> Back</a>
    </div>
    </form>
    @else
    <div class="card-body">
@include('layouts.script.addMore')
        @yield('card-body')


    </div>
    @hasSection ('card-footer')
    <div class="card-footer">
        @yield('card-footer')
    </div>
    @endif
    @endif
</div>

<div id="DeleteModal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>z
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <p class="text-center">Are you sure want to delete this data ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-outline-light" data-dismiss="modal"
                        onclick="formSubmit()">Yes, Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="addMore" class="modal fade " aria-hidden="true">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="addForm" method="post">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>z
                <div class="modal-body">
                    <tr><td><input type="text" name="moreFields['+i+'][name]" placeholder="" class="form-control" /></td>
                        <td><input type="number" name="moreFields['+i+'][harga]]" placeholder="" class="form-control" /></td>
                        <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                    </tr>
                 </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-outline-light" data-dismiss="modal"
                        onclick="formSubmit()">Yes, Delete</button>
                </div>
            </div>
        </form>

    </div>
</div>
@include('sweetalert::alert')

@stop
@hasSection ('createupdate-app-js')
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>

@yield('createupdate-app-js')
<script>
    $(".select2").select2();
</script>
@endsection
@endif
