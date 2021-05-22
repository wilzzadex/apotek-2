<html>
    @php
    $pengaturan = DB::table('app_setup')->where('apotek_id',1)->first();
@endphp
<head>
    <title>Laporan Data Penjualan Obat</title>
    <style>
        body{
            font-family: arial, sans-serif;
            font-size: 10px;
        }
        .center {
            text-align: center;
            
            }
        #ex2{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            /* width: 100%; */
        }

        #ex2{
            border: 1px solid;
            text-align: left;
            padding: 1px;
        }
      #ex{
            font-family: arial, sans-serif;
            
            width: 100%;
        }

      #ex{
            /* border: 1px solid; */
            text-align: left;
            padding: 10px;
        }

        #header-table {
            margin-top: 30px;

        }

        #header-table td {
            padding: 0px;
        }
    </style>
    {{-- {{ date('d M Y',strtotime($dari)) }} s/d {{ date('d M Y',strtotime($sampai)) }} --}}
<body>
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
        <h3>Laporan Data Penjualan Obat<br>PERIODE {{ $input_tanggal }}</h3>
    </center>
    <hr>
    {{-- <center><h3>Laporan Data Penjualan Obat</h3></center> --}}
	<table id="ex2" width="100%">
        @php
            $no = 1;
            $total_semua = 0;
        @endphp
        
        <thead>
			<tr>
                <th width="10px" id="ex2">No</th>
				<th id="ex2">No Transaksi</th>
                <th id="ex2">Tanggal Transaksi</th>
		        <th id="ex2">Pelanggan</th>
                <th id="ex2">Grand Total</th>
                <th id="ex2">Kasir</th>
			</tr>
		</thead>
        <tbody>
            @foreach ($penjualan as $penjualan)
        @php
            $total_semua += $penjualan->jumlah_tagihan;
        @endphp
			<tr>
                <td id="ex2">{{ $no++ }}</td>
                <td id="ex2">{{ $penjualan->no_transaksi }}</td>
                <td id="ex2">{{ date('d M Y H:i',strtotime($penjualan->created_at)) }}</td>
                <td id="ex2">{{ $penjualan->pelanggan_id == 0 ? '-Umum-' : '' }}</td>
                <td id="ex2">{{ number_format($penjualan->jumlah_tagihan) }}</td>
                <td id="ex2">{{ $penjualan->user->name }}</td>
            </tr>
            @endforeach
		</tbody>
       
        <tfoot>
            <tr>
                <th id="ex2" colspan="4">Total</th>
                <th id="ex2" colspan="2">{{ number_format($total_semua) }}</th>
            </tr>
        </tfoot>
		
		
	</table>
 
</body>
</html>

