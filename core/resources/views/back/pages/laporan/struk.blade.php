

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
</head>
<body onload="window.print()">

<br>

{{ $set->nama_aplikasi }} <br>
{{ $set->alamat_aplikasi }} <br>
{{ $set->no_telp }} <br>
================================
<br>

Kode : {{ $penjualan->no_transaksi }} <br>
Tanggal : {{ date('d M Y H:i') }} <br>
Kasir : {{ $penjualan->user->name }} <br>
Pelanggan : {{ $penjualan->pelanggan->nama_instansi }} <br>
--------------------------------
<br>
@foreach ($detail_penjualan as $key => $item)
{{ $item->kode_obat }} - {{ $item->obat->nama_obat }} <br>
{{ $item->jumlah_obat }} x {{ number_format($item->harga) }} / {{ $item->unit->nama }}  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
{{-- {{ $item->diskon != 0 ? $item->diskon . '%' : '0%' }} --}}

{{-- {{ number_format(($item->diskon / 100) * $item->harga) }} --}}
{{ number_format($item->subtotal) }}

<br>
@endforeach
-------------------------------- <br>
Total :        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Rp. {{ number_format($penjualan->jumlah_tagihan) }} <br>
Pot. Harga :   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Rp. {{ number_format($penjualan->pot_pen)  }} <br>
Uang Bayar :   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Rp. {{ number_format($penjualan->uang_bayar) }} <br>
Kembali :      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Rp. {{ number_format($penjualan->uang_kembali) }} <br>
<br>
-------------------------------- <br>
<br>
Terima Kasih <br>
================================ <br>
<br>
<br>
<br>
- <br>
</body>
</html>
    




{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Faktur Penjualan Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                font-size: 17px;
            }

            #childTable{
                border: none;
            }

            body {
                padding-top: 10px;
                font-family: sans-serif;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <table id="data" style="width:100%">
        <tr>
            <td colspan="3">
                <div class="row">
                    <div class="col-6 text-center">
                        <img width="50%" src="{{ url('file_ref/pengaturan_aplikasi',$pengaturan->logo_aplikasi) }}" alt="">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <h5>FAKTUR</h5>
                            </div>
                            <div class="col-12">
                                No. {{ $penjualan->no_faktur }}
                            </div>
                            <div class="col-12">
                                <span>Telp : {{ $pengaturan->no_telp }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <span>{{ $pengaturan->alamat_aplikasi }}</span>
                    </div>
                </div>
            </td>
            <td colspan="3">
                <div class="row">
                    <div class="col-6">
                        KEPADA :
                    </div>
                    <div class="col-6 float-right">
                        {{ date('Y/m/d/') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $penjualan->pelanggan->penanggung_jawab }}, {{ $penjualan->pelanggan->nama_instansi }}
                    </div>
                    <div class="col-12 float-right">
                        {{ $penjualan->pelanggan->alamat }}
                    </div>
                    <div class="col-12 float-right">
                        Telp : {{ $penjualan->pelanggan->no_telp }}
                    </div>
                </div>
               
            </td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">T.O.P</th>
            <th colspan="2" class="text-center">TGL FAKTUR</th>
            <th colspan="2" class="text-center">TGL JATUH TEMPO</th>
        </tr>
        <tr>
            <th colspan="2" class="text-center">{{ $penjualan->top }} Hari</th>
            <th colspan="2" class="text-center">{{ $penjualan->tgl_faktur }}</th>
            <th colspan="2" class="text-center">{{ $penjualan->jatuh_tempo }}</th>
        </tr>
        <tr>
            <td class="text-center">NAMA BARANG</td>
            <td class="text-center">DISKON</td>
            <td class="text-center">UNIT</td>
            <td class="text-center">HARGA SATUAN</td>
            <td class="text-center">HARGA TOTAL</td>
        </tr>
        
        @foreach ($detail_penjualan as $key => $item)
        <tr>
            <td>{{ $item->obat->nama_obat }}</td>
            <td class="text-center">{{ $item->diskon }} %</td>
            <td class="text-center">{{ $item->jumlah_obat }} {{ $item->unit->nama }}</td>
            <td class="text-center">{{ number_format($item->harga) }}</td>
            <td class="text-center">{{ number_format($item->subtotal) }}</td>
        </tr>
        @endforeach
        <tr>
            <th class="text-center">TOTAL 1</th>
            <th class="text-center">POT PENJUALAN</th>
            <th class= "text-center">TOTAL 2</th>
            <th class="text-center">PPN</th>
            <th colspan="2" class="text-center">JUMLAH TAGIHAN</th>
        </tr>
        <tr>
            <th class="text-center">{{ number_format($penjualan->total_1) }}</th>
            <th class="text-center">{{ number_format($penjualan->pot_pen) }}</th>
            <th class= "text-center">{{ number_format($penjualan->total_1 - $penjualan->pot_pen) }}</th>
            <th class="text-center">{{ number_format(($penjualan->pajak / 100) * $penjualan->jumlah_tagihan) }}</th>
            <th colspan="2" class="text-center">{{ number_format($penjualan->total_1 - $penjualan->pot_pen) }}</th>
        </tr>
        <tr>
            <td colspan="6">Terbilang : {{ $penjualan->terbilang }}</td>
        </tr>
      
    </table>
</body>

</html> --}}