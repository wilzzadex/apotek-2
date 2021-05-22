@extends('back.master')
@section('breadcumb')
    Data Obat
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
                        @if (auth()->user()->role == 'admin')
                        <a href="{{ route('obat.add') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                               <i class="fas fa-plus"></i>
                            </span>Tambah Obat</a>
                        @endif
                       
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="table-responsive">

                    
                        <table class="table table-bordered" id="obat_table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Obat</th>
                                    <th>Kategori</th>
                                    {{-- <th>Golongan</th> --}}
                                    <th>No Batch - Exp</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
           
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade" id="modalSatuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>
<div class="modal fade" id="modalUbahBeli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

    $('#obat_table').DataTable({
        processing: true,
        serverSide: true,
        // ajax : "{{ route('obat.data') }}",
        "ajax": {
            url : "{{ route('obat.data') }}",
            type : 'get',
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_obat', name: 'nama_obat'},
            {data: 'kategori_id', name: 'kategori_id'},
            // {data: 'golongan_id', name: 'golongan_id'},
            {data: 'no_batch', name: 'no_batch'},
            {data: 'harga_jual', name: 'harga_jual'},
            {data: 'stok', name: 'stok'},
            {data: 'status', name: 'status'},
            {data: 'aksi', name: 'aksi'},
           
        ]
    })

    function deleteObat(obj){
        let id = $(obj).attr('id');
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
                    url : '{{ route("obat.destroy") }}',
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
                        console.log(res);
                        if(res > 0){
                            Swal.fire(
                                "Data tidak bisa di hapus!",
                                "Data obat sudah di gunakan",
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

    function ubahHarga(thiss){
        let kode_obat = $(thiss).attr('id');
        // console.log(kode_obat);
        $.ajax({
            url : '{{ route("obat.ubahharga") }}',
            data : {
                kode_obat : kode_obat
            },
            type : 'get',
            beforeSend : function(){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success : function(res){
                KTApp.unblockPage();
                $('#modalUbah').html(res.html);
                $('#modalUbah').modal('show');
                $.each(res.satuan_obat,function(key,items){
                    $('#harga_'+items.id).mask('000.000.000', { reverse: true }).val(items.harga_Jual).trigger('input');
                });
            }
        })
    }
    function ubahHargaBeli(thiss){
        let kode_obat = $(thiss).attr('id');
        // console.log(kode_obat);
        $.ajax({
            url : '{{ route("obat.ubahhargabeli") }}',
            data : {
                kode_obat : kode_obat
            },
            type : 'get',
            beforeSend : function(){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success : function(res){
                KTApp.unblockPage();
                $('#modalUbahBeli').html(res.html);
                $('#modalUbahBeli').modal('show');
                $.each(res.satuan_obat,function(key,items){
                    $('#harga_'+items.id).mask('000.000.000', { reverse: true }).val(items.harga_beli).trigger('input');
                });
            }
        })
    }

    function lihatSatuan(thiss){
        let kode_obat = $(thiss).attr('id');
        $.ajax({
            url  : '{{ route("obat.lihatSatuan") }}',
            type : 'get',
            data : {
                kode_obat : kode_obat
            },
            beforeSend : function(){
                
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success : function(res){
                KTApp.unblockPage();
                $('#modalSatuan').html(res);
                $('#modalSatuan').modal('show');
            }

        })
    }
</script>
@endsection