@extends('back.master')
{{-- @section('breadcumb')
    Manajemen User / Tambah User
@endsection --}}
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
                            <h3 class="card-title">Tambah User</h3>
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
                        <form method="POST" action="{{ route('back.user.store') }}" id="userAdd">
                            @csrf
                            <div class="card-body">

                                
                                <div class="form-group">
                                    <label>Nama
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" />
                                </div>
                                <div class="form-group">
                                    <label>Username
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password
                                    <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Password
                                    <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="kpassword" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Role
                                    <span class="text-danger">*</span></label>
                                    <select name="role" class="form-control" required>
                                        <option value="">- Pilih Role -</option>
                                        <option value="admin">Admin</option>
                                        <option value="apoteker">Apoteker</option>
                                        <option value="kasir">Kasir</option>
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
                nama : "required",
                username: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 5
                },
                kpassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                agree: "required"
            },
            messages: {
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 3 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                kpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
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