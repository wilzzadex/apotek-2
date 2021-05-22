@extends('back.master')
@section('breadcumb')
    Data Suplier / Edit Obat
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
                            <h3 class="card-title">Edit Obat</h3>
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
                        <form method="POST" action="{{ route('obat.update',$obat->id) }}" id="userAdd">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Obat
                                    <span class="text-danger">*</span></label>
                                    <input type="text" readonly value="{{ $obat->kode_obat }}" style="text-transform: uppercase" id="kt_maxlength_3" maxlength="10" class="form-control" name="kode_obat" placeholder="Contoh : OBT028971" />
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $obat->nama_obat }}" name="nama_obat" placeholder="Nama Obat" />
                                </div>
                                <div class="form-group">
                                    <label>Kategori Obat</label>
                                    <span class="text-danger">*</span></label>
                                    <select name="kategori_obat" id="kategori_obat" style="width: 100%" class="form-control">
                                        <option value="">- Pilih Kategori -</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $obat->kategori_id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Golongan Obat</label>
                                    <span class="text-danger">*</span></label>
                                    <select name="golongan_obat" id="golongan_obat" style="width: 100%" class="form-control">
                                        <option value="">- Pilih Golongan -</option>
                                        @foreach ($golongan as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $obat->golongan_id ? 'selected' : '' }}>{{ $item->nama_golongan }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>Stok Minimum Satuan Terkecil
                                    <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="stok_minimum" value="{{ $obat->stok_minimum }}" data-toggle="tooltip" title="Stok minimum adalah patokan jika obat kurang dari stok minimum akan ada peringatan" placeholder="Stok Minimum ..." />
                                </div>
                                {{-- <hr> --}}
                                {{-- <h5>Detail Satuan</h5>
                                
                                <div class="row">
                                    <div class="col-12" id="renderSatuan">
                                        <div class="form-group row jml_satuan">
                                            <div class="col-5">
                                                <label>Satuan Terkecil</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                     <span class="input-group-text">1</span>
                                                    </div>
                                                    <select name="jumlah_satuan[]" class="form-control" id="satuan_id_1">
                                                        @foreach ($unit as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="jumlah[]" value="1">
                                                    <input type="hidden" name="sama_dengan[]" value="" id="sama_dengan">
                                                </div>
                                            </div>
                                        </div>
                
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary btn-sm" id="btn-satuan">Tambah Satuan</button>
                                    </div>
                                </div> --}}
                                {{-- <hr> --}}
                                <div class="form-group">
                                    <label>Keterangan</label>
                                   <textarea name="keterangan" class="form-control" cols="30" rows="5">{{ old('keterangan') }}</textarea>
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
<script>

    @if(session('success'))
        customAlert('Sukses !','{{ session("success") }}','success')
    @endif

    $('#kategori_obat').select2();
    $('#golongan_obat').select2();
    $('#satuan_id_1').select2();

    $('#sama_dengan').val($('#satuan_id_1').find(':selected').val())

    $('#satuan_id_1').on('change', function(){
        $('#sama_dengan').val($(this).find(':selected').val())
    });

    $('#btn-satuan').on('click',function(){
        let elemen_satuan = $('.jml_satuan').length;
        let renderSatuan =  $('#renderSatuan');
        let id_div = 1;
        var i;
        
        // console.log(elemen_satuan)
        if(elemen_satuan <= 3){
            let el_id = (parseInt(elemen_satuan) + 1);
            var val1=[]; 
            $('select[name="jumlah_satuan[]"] option:selected').each(function() {
                val1.push($(this).val());
            });
            var html_satuan ='';
            $.ajax({
                url : '{{ route("get.satuan") }}',
                type : 'get',
                data : {
                    satuan_selected :  val1,
                },
                success : function(res){
                    if((res.satuan).length == 0){
                       customAlert('Tingkat satuan sudah maksimal !','','warning');
                    }else{
                        html_satuan += `<div class="form-group row jml_satuan" id="id_div_`+id_div+`">
                                        <div class="col-5">
                                            <label>Satuan Ke `+ el_id +`</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">1</span>
                                                </div>
                                                <select name="jumlah_satuan[]" class="form-control" id="satuan_id_`+el_id+`">`
                                                +res.html_satuan+
                                                `</select>
                                            </div>
                                        </div>
                                        <div class="col2">
                                        <h3 style="margin:30px"> = </h3>
                                        </div>
                                        <div class="col-3">
                                            <label>`+res.satuan_next.nama+`</label>
                                            <input type="number" min="1" value="0" name="jumlah[]" required class="form-control" placeholder="Masukan Jumlah" aria-describedby="basic-addon2"/>
                                            <input type="hidden" name="sama_dengan[]" value="`+res.satuan_next.id+`">
                                        </div>
                                        <div class="col-2">
                                            <button type="button" onclick="deleteDiv(`+id_div+`)" class="btn btn-sm btn-danger" style="margin-top:30px"><i class="fa fa-trash"></i></button>
                                        </div>
                                        
                                    </div>
                                    `;
                    }
                   
                   
                                
                    renderSatuan.append(html_satuan);
                    $('#satuan_id_'+el_id).select2();
                    elemen_satuan = $('.jml_satuan').length;
                    for (i = 1; i < elemen_satuan; i++) {
                        // $('#satuan_id_'+i).prop('disabled',true)
                        // console.log(i)
                    }
                    id_div++;
                }
            })
            
        }
    })

    function deleteDiv(id){
        $('#id_div_'+id).remove();
    }

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
               kode_obat : {
                   required : true,
               },
               nama_obat : {
                   required : true,
               },
               kategori_obat : {
                   required : true,
               },
               golongan_obat : {
                   required : true,
               },
               stok_minimum : {
                   required : true,
               }
                
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