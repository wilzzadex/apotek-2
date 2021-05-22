<!DOCTYPE html>
<html lang="en">
@php
    $pengaturan = DB::table('app_setup')->where('apotek_id',1)->first();
@endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @media print {
            @page {
                size: auto;
                margin-top: 0;
                margin-bottom: 0px;
                margin-left: 50px;
                margin-right: 50px;
            }
        }

        #header-table {
            margin-top: 30px;

        }

        #header-table td {
            padding: 0px;
        }
    </style>
</head>

<body onload="window.print()">
    <table id="header-table">
        <tr>
            <td rowspan="5"><img src="{{asset('file_ref/pengaturan_aplikasi/'.$pengaturan->logo_aplikasi) }}" style="width: 70px; margin: 10px;" alt=""></td>
        </tr>
        <tr>
            <td colspan="3">
                <h3 style="margin: 0px;">{{ $pengaturan->nama_aplikasi }}</h3>
            </td>
        </tr>
        <tr>
            <td colspan="3"><b>{{ $pengaturan->alamat_aplikasi }}</b></td>
        </tr>
        <tr>
            <td colspan="3"><b>{{ $pengaturan->no_telp }}</b></td>
        </tr>
    </table>
    <hr style="margin-bottom: -10px;">
    <center>
        <h3>LAPORAN LABA RUGI<br>PERIODE {{ $input_tanggal }}</h3>
    </center>
    <hr>
    <table width="100%">
        <tr>
            <td style="padding:0px">
                <table width="100%" style="padding: 0px;">
                    <tr>
                        <td><h3 style="margin: 0px;">PEMASUKAN</h3></td>
                        <td style="text-align: right;">
                            <h3>{{ number_format($penjualan,0,',','.')  }}</h3>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 30px;"></td>
            <td></td>
            <td>
                <table width="100%" style="padding: 0px;">
                    <tr>
                        <td><h3 style="margin: 0px;">PENGELUARAN</h3></td>
                        <td style="text-align: right;">
                            <h3>{{ number_format($pembelian,0,',','.')  }}</h3>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        {{-- <tr>
            <td style="padding:0px">
                <table width="100%" style="padding: 0px;">
                    <tr>
                        <td><b>Nama Akun</b></td>
                        <td style="text-align: right;">
                            <b>Nominal</b>
                        </td>
                    </tr>
                    <tr>
                        <td>Penjualan Obat</td>
                        <td style="text-align: right;">
                            Nominal
                        </td>
                    </tr>
                    <tr>
                        <td>Biaya Pengiriman</td>
                        <td style="text-align: right;">
                            Nominal
                        </td>
                    </tr>
                </table>
            </td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 20px; padding-bottom: 20px;">
                <b>Total Pemasukan</b>
            </td>
            <td colspan="2" style="text-align: right; padding-top: 20px; padding-bottom: 20px;">
                <b>9.080.292,83</b>
            </td>
        </tr>
        <tr>
            <td style="padding:0px">
                <table width="100%" style="padding: 0px;">
                    <tr>
                        <td colspan="2"><b>Harga Pokok Terjual</b></td>
                    </tr>
                    <tr>
                        <td>Obat Terjual</td>
                        <td style="text-align: right;">
                            Nominal
                        </td>
                    </tr>
                    <tr>
                        <td>Total Harga Pokok Penjualan</td>
                        <td style="text-align: right;">
                            Nominal
                        </td>
                    </tr>
                </table>
            </td> --}}
            {{-- <td colspan="2"></td>
            <td style="padding:0px">
                <table width="100%">
                    <tr>
                        <td style="height: 40px"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                            Nominal -
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr style="margin:0px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 20px;">
                <b>Laba Kotor</b>
            </td>
            <td colspan="2" style="text-align: right; padding-top: 20px;">
                <b>9.080.292,83&nbsp;&nbsp;</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 0px;">
                <b>Total Pengeluaran</b>
            </td>
            <td colspan="2" style="text-align: right; padding:0px;">
                <b>9.080.292,83 -</b>
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-top: 20px;">
                <b>Laba Bersih</b>
            </td>
            <td colspan="2" style="text-align: right; padding-top: 20px;">
                <b>9.080.292,83&nbsp;&nbsp;</b>
            </td>
        </tr> --}}
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <center>
                    <h3>Laba Rugi: {{ number_format($penjualan - $pembelian ,0,',','.')  }}</h3>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>
                <br>
                <center>
                    <p>
                        Kab. Bandung, {{ date('d M Y') }}<br>
                        {{ auth()->user()->name }}
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                         __________________
                    </p>
                </center>
            </td>
        </tr>
    </table>
</body>

</html>