@extends('back.master')
@section('breadcumb')
Laporan / Pembelian Obat
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('laporan.pembelian.cetak') }}" method="POST" target="_blank" class="form">
                        @csrf
                        @if (auth()->user()->role == 'admin')
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="checkbox" name="is_detail" value="is_detail" id="detail_pen"> <label for="detail_pen"> Cetak dengan detail pembelian</label>
                                </div>
                                <br>
                                <div class="col-3">
                                    <label>Jenis</label>
                                    <select name="type" class="form-control">
                                        <option value="semua">Semua</option>
                                        <option value="tunai">Tunai</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                                <div class="col-3" id="showTanggal">
                                    <label>Pilih Periode</label>
                                    <div class='input-group' id='kt_daterangepicker_6'>
                                        <input type='text' name="tanggal" required class="form-control" readonly placeholder="Select date range" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-3" id="btnn">
                                    
                                    {{-- <button type="submit" name="type_button" value="excel" class="btn btn-success" style="margin-top: 25px">Export Excel</button> --}}
                                    <button type="submit" name="type_button" value="pdf" class="btn btn-danger" style="margin-top: 25px">Export PDF</button>
                                </div>
                            </div>
                        @endif
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

    $('#kasir_id').select2();
    $('#type').on('change', function(){
        let type = $(this).find(':selected').val();
        if(type  == 'kasir'){
            $('#daftar_kasir').css('display','');
            $('#showTanggal').css('display','');
            $('#btnn').css('display','');
        }else if(type == 'periode'){
            $('#daftar_kasir').css('display','none');
            document.getElementById('daftar_kasir').disabled = true
            $('#showTanggal').css('display','');
            $('#btnn').css('display','');
        }else{
            $('#daftar_kasir').css('display','none');
            $('#showTanggal').css('display','none');
            $('#btnn').css('display','none');
        }
    })

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

    // renderTable(input_tanggal, input_tahun);

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



   

</script>
@endsection