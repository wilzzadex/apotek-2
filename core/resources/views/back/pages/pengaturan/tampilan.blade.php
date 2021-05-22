@extends('back.master')
@section('breadcumb')
    Pengaturan / Tampilan
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
          
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                   <div class="card-title">
                        <h5>Pengaturan Tampilan Aplikasi</h5>
                   </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaturan.update',$pengaturan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6">
                                <label>Logo Aplikasi</label> <br>
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('file_ref/pengaturan_aplikasi/'.$pengaturan->logo_aplikasi) }});"></div>
                                
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ubah Logo">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png,.ico,.jpg,.jpeg"/>
                                    <input type="hidden" name="profile_avatar_remove"/>
                                    </label>
                                
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Batalkan">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Format yang didukung: png, jpg, jpeg</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Nama / Judul Aplikasi</label>
                            <input type="text" name="nama_aplikasi" value="{{ $pengaturan->nama_aplikasi }}" placeholder="Nama Aplikasi ..." required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="{{ $pengaturan->alamat_aplikasi }}" placeholder="Nama Aplikasi ..." required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telp</label>
                            <input type="text" name="telp" value="{{ $pengaturan->no_telp }}" placeholder="Nama Aplikasi ..." required class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="willy@gmail.com" placeholder="Nama Aplikasi ..." required class="form-control">
                        </div> --}}
                        <button type="submit" class="btn btn-primary float-right"> Simpan Perubahan </button>
                    </form>
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
    @if(session("success"))
        customAlert('Sukses','{{ session("success") }}','success');
    @endif

    var avatar1 = new KTImageInput('kt_image_1');
</script>
@endsection
