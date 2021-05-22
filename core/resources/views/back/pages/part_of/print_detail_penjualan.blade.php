<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Histori Pembelian Obat</title>
    <style>
        @media print {
            @page {
                size: auto;
                margin-top: 0;
                margin-bottom: 0px;
            }

            #data,
            #data th,
            #data td {
                border: 1px solid;
            }

            #data td,
            #data th {
                padding: 5px;
            }

            #data {
                border-spacing: 0px;
                margin-top: 40px;
            }

            body {
                padding-top: 50px;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <center>
        <h1>Faktur Pembelian Obat</h1>
    </center>
    <table>
        <tr>
            <td><b>Nomor Faktur</b></td>
            <td>:</td>
            <td>
                {{$pembelian->no_faktur}}
            </td>
        </tr>
        <tr>
            <td><b>Tanggal Faktur</b></td>
            <td>:</td>
            <td>
                {{$pembelian->tgl_faktur}}
            </td>
        </tr>
    </table>
    <table id="data">
        <tr>
            <th style="max-width: 40px;min-width:40px">No</th>
            <th style="min-width: 100px">No Batch</th>
            <th style="min-width: 150px">Obat</th>
            <th style="min-width: 150px">Tgl exp</th>
            <th>Jumlah</th>
            <th style="min-width: 150px">Hna</th>
            <th>Diskon</th>
            <th>PPn</th>
            <th>Nominal Diskon</th>
            <th>Nominal PPn</th>
            <th>Subtotal</th>
        </tr>
        @php
        $subtotal = 0;

        $total_harga_beli = 0;
        $total_diskon = 0;
        $total_margin = 0;


        $total_1 = 0;
        $total_2 = 0;
        $pot_pen = 0;
        @endphp
        @foreach ($detail as $key => $item)
        <tr>
            @php
            $subtotal = $item->jumlah_obat * $item->harga_beli;
            $diskon = (int) ($item->diskon / 100) * $subtotal;
            $margin = (int) ($item->margin_jual / 100) * $item->harga_beli;
            $fix_total = $subtotal - $diskon;

            $total_harga_beli += $item->harga_beli;
            $total_diskon += $item->diskon;
            $total_margin += $item->margin_jual;


            $total_1 += $item->harga_beli * $item->jumlah_obat;
            $pot_pen += $item->nom_diskon;
            @endphp
            <td>{{ $key+1 }}</td>
            <td>{{ $item->no_batch }}</td>
            <td>{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
            <td>{{ date('d F Y',strtotime($item->tgl_exp)) }}</td>
            <td>{{ $item->jumlah_obat }} {{ $item->unit->nama }}</td>
            <td>Rp.{{ number_format($item->harga_beli,0,',','.') }}</td>
            <td>{{ $item->diskon }} %</td>
            <td>{{ $item->margin_jual }} %</td>
            <td>Rp.{{ number_format((($item->diskon / 100) * $subtotal),0,',','.') }}</td>
            <td>Rp.{{ number_format($item->nom_ppn,0,',','.') }}</td>
            <td>Rp.{{ number_format($item->subtotal,0,',','.') }}</td>
        </tr>
        @endforeach
        @php
        $total_2 = $total_1 - $pot_pen;
        $pajak = ($pembelian->pajak / 100) * $total_2;
        @endphp
        <tr>
            <th colspan="2" style="vertical-align : middle;text-align:center;">TOTAL 1</th>
            <th colspan="" style="vertical-align : middle;text-align:center;">POT PENJUALAN</th>
            <th colspan="2" style="vertical-align : middle;text-align:center;">TOTAL 2</th>
            <th colspan="2" style="vertical-align : middle;text-align:center;">PPN ({{ $pembelian->pajak }}%)</th>
            <th colspan="4" style="vertical-align : middle;text-align:center;">JUMLAH TAGIHAN</th>
        </tr>
        <tr>
            <th colspan="2" style="vertical-align : middle;text-align:center;">{{ number_format($total_1,0,',','.') }}</th>
            <th colspan="" style="vertical-align : middle;text-align:center;">{{ number_format($pot_pen,0,',','.') }}</th>
            <th colspan="2" style="vertical-align : middle;text-align:center;">{{ number_format($total_2,0,',','.') }}</th>
            <th colspan="2" style="vertical-align : middle;text-align:center;">{{ number_format($pajak,0,',','.') }}</th>
            <th colspan="4" rowspan="2" style="vertical-align : middle;text-align:center;">{{ number_format($pembelian->jumlah_tagihan,0,',','.') }}</th>
        </tr>
        <tr>
            <th colspan="7">Biaya Lain : {{ number_format($pembelian->biaya_lain,0,',','.') }}</th>
        </tr>
    </table>
</body>

</html>