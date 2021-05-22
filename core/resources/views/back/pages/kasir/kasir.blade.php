@extends('back.master')
@section('breadcumb')
    Menu Kasir
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
   
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!-- begin::Card-->
            <div class="card card-custom overflow-hidden">
                <div class="card-body p-0">
                    <!-- begin: Invoice-->
                    <!-- begin: Invoice header-->
                    <form action="{{ route("store.penjualan") }}" method="POST" >
                        @csrf
                        <div class="row justify-content-center py-2 px-2 py-md-15 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between flex-column flex-md-row">
                                    <h3 class="display-5 font-weight-boldest mb-10">{{ auth()->user()->name }}</h3>
                                    <div class="d-flex flex-column align-items-md-end px-0 mb-1">
                                        <!--begin::Logo-->
                                        <a href="#" class="mb-5">
                                            Tanggal : {{ date('d M Y') }}
                                        </a>
                                        <!--end::Logo-->
                                        <span class="d-flex flex-column align-items-md-end opacity-70">
                                            @php
                                                $kode_transaksi = 'TRN-' . date('dmys') . "-" . str_random(5);
                                            @endphp
                                            <span>Kode Transaksi : {{ $kode_transaksi }}</span>
                                            <input type="hidden" name="kode_transaksi" value="{{ $kode_transaksi }}">
                                        </span>
                                    </div>
                                </div>
                                {{-- <div class="border-bottom w-100"></div> --}}
                                <br>
                                <div class="row">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="keyword" placeholder="Ketik Nama / Kode Barang..."/>
                                        <div class="input-group-append">
                                        <button class="btn btn-primary" id="btn-cari" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12" id="tableShowObat">
                                        <table class="table" id="table-show">

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center" style="margin-top: -50px">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table" id="tabel_obat">
                                        <thead>
                                            <tr>
                                                <th>Nama Obat</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Harga</th>
                                                <th>Nom Diskon</th>
                                                <th style="min-width: 150px">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableListObat">
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold text-muted text-uppercase">TOTAL</th>
                                                <th class="font-weight-bold text-muted text-uppercase">POTONGAN HARGA</th>
                                                <th class="font-weight-bold text-muted text-uppercase">JUMLAH BAYAR</th>
                                                <th class="font-weight-bold text-muted text-uppercase"></th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <tr class="font-weight-bolder">
                                                <td class="text-danger font-size-h3 font-weight-boldest"><input readonly type="text" id="total_1" class="form-control" name="total_bayar"></td>
                                                <td><input type="text" class="form-control" value="0" readonly id="pot_pen" required name="pot_pen"></td>
                                                <td colspan="3"><input type="text" class="form-control text-danger" value="0" readonly id="jumlah_tagihan" name="jumlah_tagihan"></td>

                                            </tr>
                                        </tbody>
                                        
                                        <tbody >
                                            
                                            <tr>
                                                <th colspan="1" class="font-weight-bold text-muted text-uppercase">Pelanggan</th>
                                                <th colspan="3" class="font-weight-bold text-muted text-uppercase">Uang Bayar (Rp.)</th>
                                                <th colspan="1" class="font-weight-bold text-muted text-uppercase">Uang Kembali (Rp.)</th>
                                            </tr>
                                            <tr>
                                                <td colspan="1">
                                                    <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                                                        {{-- <option value="">- Umum -</option> --}}
                                                        @foreach ($pelanggan as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_instansi }} {{ $item->id == 1 ? '' : '-' }} {{ $item->penanggung_jawab }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td colspan="3"><input type="text" class="form-control" id="uang_bayar" required name="terbilang" placeholder="Uang Bayar..."></td>
                                                <td><input type="text" class="form-control" id="uang_kembali" readonly required name="uang_kembali" placeholder="Uang Kembali..."></td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <button type="button" disabled class="btn btn-primary font-weight-bold" id="btn-struk">Print Struk</button>
                                    <button type="submit" disabled class="btn btn-light-primary font-weight-bold" id="btn-transaksi">Simpan Transaksi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end: Invoice action-->
                    <!-- end: Invoice-->
                    <form action="{{ route('kasir.print') }}" method="POST" target="_blank" id="form_struk">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="nama_pelanggan" id="nama_pelanggan_print">
                        <input type="hidden" name="total_bayar" id="total_bayar_print">
                        <input type="hidden" name="uang_bayar" id="uang_bayar_print">
                        <input type="hidden" name="uang_kembali" id="uang_kembali_print">
                        <input type="hidden" name="pot_harga" id="pot_harga_print">
                        <input type="hidden" name="no_transaksi" value="{{ $kode_transaksi }}" id="no_transaksi_print">
                    </form>
                </div>
            </div>
            <!-- end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>


<div class="modal fade" id="modalPcs" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
    
</div>
<div class="modal fade" id="modalDiskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
    
</div>
@endsection

@section('js-custom')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    getListObat();
    getTotalBayar();

    @if(session("success"))
        customAlert('Sukses','Transaksi Berhasil','success');
    @endif

    $(document).on("keypress", 'form', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });

    $('#btn-struk').on('click', function(){
        $('#total_bayar_print').val($('#jumlah_tagihan').val());
        $('#uang_bayar_print').val($('#uang_bayar').val());
        $('#uang_kembali_print').val($('#uang_kembali').val());
        $('#pot_harga_print').val($('#pot_pen').val());
        $('#nama_pelanggan_print').val($('#pelanggan_id').find(':selected').val());
        $('#form_struk').submit();
        // $('#no_transaksi_print').val($('.kode_transaksi').val());
    });

    $('#tanggal_faktur_input').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
    });

    $('#tanggal_jatuh_tempo').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
    });

    function actionChangePcs(){
        let form = $('#formChangePcs');
        $.ajax({
            url : '{{ route("change.pcs") }}',
            type : 'post',
            data : form.serialize(),
            beforeSend: function(){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success : function(res){
                KTApp.unblockPage();
                getListObat();
                getTotalBayar();
                $('#modalPcs').modal('hide')
            }
        })
    }

    function actionChangeDiskon(){
        let form = $('#formChangeDiskon');
        $.ajax({
            url : '{{ route("change.diskon") }}',
            type : 'post',
            data : form.serialize(),
            beforeSend : function(){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success : function(res){
                $('#modalDiskon').modal('hide')
                getListObat();
                getTotalBayar();
                KTApp.unblockPage();
            }
        })
    }

    $('#pelanggan_id').select2();

    $('#uang_bayar').mask('000.000.000', { reverse: true });

    // $('#uang_bayar').on('keyup',function(){
    //     let total = $('#total_bayar').val();
    //     let fix_total = total.replace(/\./g, "");
    //     let uang_bayar = $(this).val();
    //     let fix_uang_bayar =  uang_bayar.replace(/\./g, "");
    //     let uang_kembali = parseInt(fix_uang_bayar) - parseInt(fix_total);
    //     $('#uang_kembali').mask('000.000.000', { reverse: true }).val(uang_kembali).trigger('input')

    //     if(uang_bayar <= fix_total){
    //         document.getElementById('btn-struk').disabled = true;
    //         document.getElementById('btn-transaksi').disabled = true;
    //     }else{
    //         document.getElementById('btn-struk').disabled = false;
    //         document.getElementById('btn-transaksi').disabled = false;
    //     }
    //     if(uang_kembali >= 0){
    //         document.getElementById('btn-struk').disabled = false;
    //         document.getElementById('btn-transaksi').disabled = false;
    //     }else{
    //         document.getElementById('btn-struk').disabled = true;
    //         document.getElementById('btn-transaksi').disabled = true;
    //     }
    // })

    function deleteList(thiss){
        let id = $(thiss).attr('id');
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
                    url : '{{ route("list.destroy") }}',
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
                        getListObat();
                        getTotalBayar();
                    }
                })
            }
        });
    }

    function changePcs(thiss){
        let id = $(thiss).attr('id');
        $.ajax({
            url : '{{ route("kasir.change.pcs") }}',
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
                $('#modalPcs').html(res);
                $('#modalPcs').modal('show');
                KTApp.unblockPage();
            }
        })
    }

    function getTotalBayar() {
        

        
        $.ajax({
            url : '{{ route("kasir.get.total") }}',
            type : 'get',
            success: function(res){
                console.log(res);
                $('#total_1').mask('000.000.000', { reverse: true }).val(res.total_1).trigger('input')
                $('#pot_pen').mask('000.000.000', { reverse: true }).val(res.pot_pen).trigger('input')
                $('#uang_bayar').mask('000.000.000', { reverse: true });
                // $('#uang_kembali').mask('000.000.000', { reverse: true });
                
                // let pajak = $('#pajak').val();
                // let total_1 = $('#total_1').val(),
                //     int_total_1 = total_1.replace(/\./g, "");
                // let nom_pajak = $('#nom_pajak').val();
                //     int_nom_pajak  = nom_pajak.replace(/\./g, "");
                let uang_bayar = $('#uang_bayar').val(),
                    int_uang_bayar = uang_bayar.replace(/\./g, "");
                let pot_pen = $('#pot_pen').val();
                    int_potpen = pot_pen.replace(/\./g, "");
                // let jumlah_tagihan = $('#jumlah_tagihan').val(),
                //     int_jumlah_tagihan = jumlah_tagihan.replace(/\./g, "");
                
                // let val_nom_pajak = parseInt((pajak/100) * int_total_1);
                // let val_total_2 = (parseInt(int_total_1) - parseInt(int_potpen));
                let val_jumlah_tagihan =  parseInt(res.total_1) - parseInt(res.pot_pen);
                let val_uang_bayar =  parseInt(int_uang_bayar) - parseInt(val_jumlah_tagihan);


                // $('#nom_pajak').mask('000.000.000', { reverse: true }).val(val_nom_pajak).trigger('input')
                // $('#total_2').mask('000.000.000', { reverse: true }).val(val_total_2).trigger('input')
                $('#uang_kembali').mask('000.000.000', { reverse: true }).val(val_uang_bayar).trigger('input')
                $('#jumlah_tagihan').mask('000.000.000', { reverse: true }).val(val_jumlah_tagihan).trigger('input')

                if(val_uang_bayar < 0 || uang_bayar == 0){
                    document.getElementById('btn-struk').disabled = true;
                    document.getElementById('btn-transaksi').disabled = true;
                    $('#uang_kembali').val(val_uang_bayar);
                }else{
                    document.getElementById('btn-struk').disabled = false;
                    document.getElementById('btn-transaksi').disabled = false;
                    $('#uang_kembali').mask('000.000.000', { reverse: true }).val(val_uang_bayar).trigger('input')
                }

            }
        })
    }

    $('#uang_bayar').on('keyup', function(){
        let values = $(this).val();
        let intnya = values.replace(/\./g, "");
        let jml = $('#jumlah_tagihan').val();
        let int_jml  = jml.replace(/\./g, "");
        let val_uang_bayar =  parseInt(intnya) - parseInt(int_jml);
        if(val_uang_bayar < 0 || values == null){
            document.getElementById('btn-struk').disabled = true;
            document.getElementById('btn-transaksi').disabled = true;
            $('#uang_kembali').val(val_uang_bayar);
        }else{
            document.getElementById('btn-struk').disabled = false;
            document.getElementById('btn-transaksi').disabled = false;
            $('#uang_kembali').mask('000.000.000', { reverse: true }).val(val_uang_bayar).trigger('input')
        }
    });

    $('#pajak').on('keyup', function () {
        let pajak = $('#pajak').val();
        let total_1 = $('#total_1').val(),
            int_total_1 = total_1.replace(/\./g, "");
        let nom_pajak = $('#nom_pajak').val();
            int_nom_pajak  = nom_pajak.replace(/\./g, "");
        let total_2 = $('#total_2').val(),
            int_total_2 = total_2.replace(/\./g, "");
        let pot_pen = $('#pot_pen').val();
            int_potpen = pot_pen.replace(/\./g, "");
        let jumlah_tagihan = $('#jumlah_tagihan').val(),
            int_jumlah_tagihan = jumlah_tagihan.replace(/\./g, "");
        
        let val_nom_pajak = parseInt((pajak/100) * int_total_1);
        let val_total_2 = (parseInt(int_total_1) - parseInt(int_potpen));
        let val_jumlah_tagihan =  parseInt(val_total_2) + parseInt(val_nom_pajak);


        $('#nom_pajak').mask('000.000.000', { reverse: true }).val(val_nom_pajak).trigger('input')
        $('#total_2').mask('000.000.000', { reverse: true }).val(val_total_2).trigger('input')
        $('#jumlah_tagihan').mask('000.000.000', { reverse: true }).val(val_jumlah_tagihan).trigger('input')
    })

    function  changeDiskon(thiss) {
        let id = $(thiss).attr('id');
        $.ajax({
            url : '{{ route("kasir.change.diskon") }}',
            type : 'get',
            data : {
                id : id,
            },
            beforeSend : function(res){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success: function(res){
                // console.log(res)
                KTApp.unblockPage();
                $('#modalDiskon').html(res);
                $('#modalDiskon').modal('show');
            }
        })
    }

    $('#btn-cari').on('click', function(){
        $('#tableShowObat').html('');
        let keyword = $('#keyword').val();
        getObat(keyword);
    })

    document.querySelector('#keyword').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            $('#tableShowObat').html('');
            let keyword = $('#keyword').val();
            getObat(keyword);
        }
    });

    // document.querySelector('#modal_jumlah_obat').addEventListener('keypress', function (e) {
    //     if (e.key === 'Enter') {
    //         $('#btn-change-pcs').click();
    //     }
    // });

    function getListObat() {
        $.ajax({
            url : '{{ route("kasir.get.list") }}',
            type : 'get',
            success: function(res){
                $('#tableListObat').html(res);
            }
        })
    }

    

    function getObat(keyword){
        if(keyword == ''){
            $('#tableShowObat').html(`<div class="alert alert-warning">Data Obat Tidak Ada !</div>`);
        }else{
            $.ajax({
                url : '{{ route("kasir.show.obat") }}',
                type : 'get',
                data : {
                    keyword : keyword,
                },
                beforeSend : function(){
                    KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
                },
                success: function(res){
                    KTApp.unblockPage();
                    if(res.kosong){
                        $('#tableShowObat').html(`<div class="alert alert-warning">Data Obat Tidak Ada !</div>`);
                    }else{
                        $('#tableShowObat').html(res.html);
                        $('#table-show').DataTable({
                            pageLength : 5,
                        });

                    }
                    
                }
            })
        }
    }

    function addToList(thiss){
        let id = $(thiss).attr('id');
        $.ajax({
            url : '{{ route("kasir.add.tolist") }}',
            data : {
                id : id,
            },
            success : function(res){
                if(res == 'ada'){
                    customAlert('','Obat sudah ada di list','warning');
                }else{
                    getListObat();
                }
            }
        })
    }
</script>
@endsection
