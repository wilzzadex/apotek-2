@extends('back.master')
@section('breadcumb')
Dashboard
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <!--begin::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <!--begin::Header-->
                       
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                              
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <!--begin::Header-->
                       
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <figure class="highcharts-figure">
                                <div id="detailGrafik"></div>
                              
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>

            </div>
            <!--end::Row-->

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection

@section('js-custom')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var start = moment().subtract(29, 'days');
    var end = moment();
    loadChart()

    $(document).ready(function(){
        
    })

    // function changeTanggal(thiss){
    //     alert('tes')
    // }

    // $('#tanggals').on('change', function(){
    //     alert('tes')
    //     let tanggal = $(this).val();
    //     getGrafikObat(tanggal);
    // })


    getGrafikObat(start.format('MM/DD/YYYY') + ' - ' +end.format('MM/DD/YYYY'))

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

   

    function getGrafikObat(tanggal){
        var dataCat = [];
        var dataSer = [];
        $.ajax({
            url : '{{ route("grafik.obat") }}',
            type : 'get',
            data : {
                tanggal : tanggal,
            },
            success: function(res){
                var grafikObat = res.grafik_obat;
                $.each(grafikObat,function(key,items){
                    dataCat.push(items.tgl_transaksi)
                    dataSer.push(parseInt( items.total))
                })
                console.log(dataSer)
                loadChart(dataCat,dataSer)
            }
        })
    }

    function loadChart(dataCat,dataSer) {
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'Grafik Penjualan Obat'
            },
            xAxis: {
                categories: dataCat,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} Rupiah</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                series: {
                    lineWidth: 5,
                },
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: ' ',
                color: "#008ffa",
                data: dataSer,

            }]
        });
    }

    

</script>
@endsection