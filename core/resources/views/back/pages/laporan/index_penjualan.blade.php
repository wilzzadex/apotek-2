@extends('back.master')
@section('breadcumb')
Laporan / Penjualan Obat
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('laporan.penjualan.cetak2') }}" method="POST" target="_blank" class="form">
                        @csrf
                        @if (auth()->user()->role == 'admin')
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="checkbox" name="is_detail" value="is_detail" id="detail_pen"> <label for="detail_pen"> Cetak dengan detail penjualan</label>
                                </div>
                                <br>
                                <div class="col-3">
                                    <label>Berdasarkan</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Pilih Type...</option>
                                        <option value="periode">Periode</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                                <div class="col-3" style="display: none " id="daftar_kasir">
                                    <label>Daftar Kasir</label> <br>
                                    <select name="kasir_id" id="kasir_id" style="width: 100%" class="form-control">
                                        <option value="">Pilih Kasir...</option>
                                        @foreach ($kasir as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3" id="showTanggal" style="display: none">
                                    <label>Pilih Tanggal</label>
                                    <div class='input-group' id='kt_daterangepicker_6'>
                                        <input required type='text' name="tanggal" class="form-control" readonly placeholder="Select date range" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-3" id="btnn" style="display: none">
                                    
                                    {{-- <button type="submit" name="type_button" value="excel" class="btn btn-success" style="margin-top: 25px">Export Excel</button> --}}
                                    <button type="submit" name="type_button" value="pdf" class="btn btn-danger" style="margin-top: 25px">Export PDF</button>
                                </div>
                            </div>
                        @endif
                        @if (auth()->user()->role == 'kasir')
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="checkbox" name="is_detail" value="is_detail" id="detail_pen"> <label for="detail_pen"> Cetak dengan detail penjualan</label>
                            </div>
                            <div class="col-3" style=" " id="daftar_kasir">
                                <label> Kasir</label> <br>
                                <input type="hidden" readonly class="form-control" name="kasir_id" value="{{ auth()->user()->id }}">
                                <input class="form-control" readonly value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-3" id="showTanggal" style="display: ">
                                <label>Pilih Tanggal</label>
                                <div class='input-group' id='kt_daterangepicker_6'>
                                    <input required type='text' name="tanggal" class="form-control" readonly placeholder="Select date range" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3" id="btnn" style="display:">
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