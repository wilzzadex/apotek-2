@extends('back.master')
@section('breadcumb')
    Data Unit / Edit Unit
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Unit</h3>
                        </div>
                        <div class="container">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('unit.update',$unit->id) }}" id="userAdd">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Unit
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $unit->nama }}" name="nama" placeholder="Nama Unit" />
                                </div>
                                <select type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                                    <option value="1" {{ $unit->tingkat_satuan == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $unit->tingkat_satuan == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $unit->tingkat_satuan == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $unit->tingkat_satuan == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $unit->tingkat_satuan == 5 ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ $unit->tingkat_satuan == 6 ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ $unit->tingkat_satuan == 7 ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ $unit->tingkat_satuan == 8 ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ $unit->tingkat_satuan == 9 ? 'selected' : '' }}>9</option>
                                    <option value="10" {{ $unit->tingkat_satuan == 10 ? 'selected' : '' }}>10</option>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
   
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('js-custom')
<script type="text/javascript">
    @if(session('success'))
        customAlert('Sukses !','{{ session("success") }}','success')
    @endif

    @if(session('gagal'))
        customAlert('Ditolak !','{{ session("gagal") }}','warning')
    @endif

    var runValidator = function () {
        var form = $('#userAdd');
        var errorHandler = $('.errorHandler', form);
        var successHandler = $('.successHandler', form);
        form.validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'invalid-feedback',
            errorPlacement: function ( error, element ) {
                // Add the `invalid-feedback` class to the error element
                error.addClass( "invalid-feedback" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.next( "label" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            ignore: "",
            rules: {
                nama: {
                    required: true,
                    minlength: 3
                },
                jumlah: {
                    required: true,
                },
              
            },
            messages: {
                no_telp: {
                    maxlength : "Maksimal 13 digit !",
                    digits: "Masukan dalam bentuk angka saja !"
                },
            },
            errorElement: "em",
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler.hide();
                errorHandler.show();
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                // $('#alert').hide();
                successHandler.show();
                errorHandler.hide();
                // submit form
                if (successHandler.show()) {
                    myBlock()
                    form.submit();
                }
            }
        });
    };
    runValidator();
</script>
@endsection