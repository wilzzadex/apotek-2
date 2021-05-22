@extends('back.master')
@section('breadcumb')
    Data Unit / Tambah Unit
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
                            <h3 class="card-title">Tambah Unit</h3>
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
                        <form method="POST" action="{{ route('unit.store') }}" id="userAdd">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Unit
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Unit" />
                                </div>
                                <div class="form-group">
                                    <label>Tingkat Satuan
                                    <span class="text-danger">*</span></label>
                                    <select type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
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