@extends('back.master')
@section('breadcumb')
    Data Pelanggan
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
          
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                   <div class="card-title">

                   </div>
                    <div class="card-toolbar">
                        <a href="{{ route('pelanggan.add') }}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                           <i class="fas fa-plus"></i>
                        </span>Tambah Pelanggan</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    
                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Instansi</th>
                                <th>Alamat</th>
                                <th>Penanggung Jawab</th>
                                <th>No Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->nama_instansi }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->penanggung_jawab }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td nowrap="nowrap">
                                        <div class="dropdown dropdown-inline mr-4">
                                            <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="{{ route('pelanggan.edit',$item->id) }}">Edit</a>
                                                @if (auth()->user()->role == 'admin')
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="deletePelanggan(this)" data-id="{{ $item->id }}">Hapus</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('js-custom')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    $('#user_table').DataTable({
        responsive: true,
    })
    @if(session('success'))
        customAlert('Sukses !','{{ session("success") }}','success')
    @endif

    function deletePelanggan(obj){
        let id = $(obj).attr('data-id');
        // console.log(id);
        Swal.fire({
            title: "Anda Yakin ?",
            text: "Data akan terhapus permanen",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus saja!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url : '{{ route("pelanggan.destroy") }}',
                    type : 'get',
                    data : {
                        id : id,
                    },
                    beforeSend: function(){
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'danger',
                            message: 'Silahkan Tunggu...'
                        });
                    },
                    success: function(res){
                        KTApp.unblockPage();
                        // console.log(res);
                        if(res > 0){
                            Swal.fire(
                                "Data tidak bisa dihapus!",
                                "Data ada di transaksi.",
                                "warning"
                            )
                        }else{
                            Swal.fire(
                                "Terhapus!",
                                "Data berhasil di hapus.",
                                "success"
                            ).then(function(){
                                window.location.reload();
                            })
                        }
                       
                    }
                })
            }
        });
    }
</script>
@endsection