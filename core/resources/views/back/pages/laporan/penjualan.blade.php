@extends('back.master')
@section('breadcumb')
Laporan / Laba Rugi
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('laporan.penjualan.cetak') }}" method="POST" target="_blank" class="form">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Pilih Periode</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class='input-group' id='kt_daterangepicker_6'>
                                    <input required type='text' name="tanggal" class="form-control" readonly placeholder="Select date range" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm float-right">Cetak</button>
                        
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

<div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">

</div>
@endsection

@section('js-custom')
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    @if (session("success"))
        customAlert('Sukses', 'Data berhasil di simpan', 'success')
    @endif

    var start = moment().subtract(29, 'days');
    var end = moment();
    $('#kt_daterangepicker_6').daterangepicker({
        buttonClasses: ' btn',
        applyClass: 'btn-primary',
        cancelClass: 'btn-secondary',

        startDate: start,
        endDate: end,
        ranges: {
            'Hari Ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
            '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, function (start, end, label) {
        $('#kt_daterangepicker_6 .form-control').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    });
    
    // $(document).ready(function(){
    let input_tanggal = $('#input_tanggal').find(':selected').val();
    let input_tahun = $('#input_tahun').find(':selected').val();
    let title_tanggal = $('#input_tanggal').find(':selected').html();
    $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)

    renderTable(input_tanggal, input_tahun);

    $('#input_tanggal').on('change', function () {
        input_tanggal = $(this).find(':selected').val();
        $('#user_table').dataTable().fnDestroy();
        renderTable(input_tanggal, input_tahun);
        title_tanggal = $('#input_tanggal').find(':selected').html();
        $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)
    })

    $('#input_tahun').on('change', function () {
        input_tahun = $(this).find(':selected').val();
        $('#user_table').dataTable().fnDestroy();
        renderTable(input_tanggal, input_tahun);
        $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)
    })

    function lihatDetail(obj) {
        let id = $(obj).attr('id');
        $.ajax({
            url: '{{ route("histori.pembelian.detail") }}',
            type: 'get',
            data: {
                id: id
            },
            beforeSend: function () {
                myBlock();
            },
            success: function (res) {
                $('#modalDetail').html(res);
                $('#modalDetail').modal('show');
                KTApp.unblockPage();
            }
        })
    }



    function renderTable(bulan, tahun) {
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                url: "{{ route('histori.penjualan.data') }}",
                type: 'get',
                data: {
                    tahun: input_tahun,
                    bulan: input_tanggal
                },
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'no_transaksi', name: 'no_transaksi' },
                { data: 'tgl_transaksi', name: 'tgl_transaksi' },
                { data: 'pelanggan_id', name: 'pelanggan_id' },
                { data: 'jumlah_bayar', name: 'jumlah_bayar' },
                { data: 'aksi', name: 'aksi' },

            ]
        })
    }




</script>
@endsection