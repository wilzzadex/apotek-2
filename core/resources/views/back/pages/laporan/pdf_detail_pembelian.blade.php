<html>
    @php
    $pengaturan = DB::table('app_setup')->where('apotek_id',1)->first();
@endphp
<head>
    <title>Laporan Data Pembelian Obat</title>
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
        <h3>Laporan Detail Pembelian Obat<br>PERIODE {{ $input_tanggal }}</h3>
    </center>
    <hr>
    {{-- <center><h3>Laporan Data Pembelian Obat</h3></center> --}}
	<table id="ex2" width="100%">
        <thead>
			<tr>
                <th width="10px" id="ex2">No</th>
				<th id="ex2">No Faktur</th>
                <th id="ex2">Tanggal Faktur</th>
		        <th id="ex2">Tanggal Pengeluaran</th>
                <th id="ex2">Suplier</th>
                <th id="ex2">PPn</th>
                <th id="ex2">Nominal Pajak</th>
                <th id="ex2">Biaya Lain</th>
                <th id="ex2">Jenis</th>
                <th id="ex2">Keterangan</th>
                <th id="ex2">Status Tagihan</th>
                {{-- <th id="ex2">Admin</th> --}}
			</tr>
		</thead>
        @php
            $no = 1;
            $total_semua = 0;
        @endphp
        @php
                $no = 1;
                $total_semua = 0;
        @endphp
        @foreach ($pembelian as $pembelian)
        @php
            $total_semua += $pembelian->jumlah_tagihan;
        @endphp
       
        <tbody>
            
               <tr>
                   <th id="ex2">{{ $no++ }}</th>
                   <th id="ex2">{{ $pembelian->no_faktur }}</th>
                   <th id="ex2">{{ date('d M Y',strtotime($pembelian->tgl_faktur)) }}</th>
                   <th id="ex2">{{ date('d M Y',strtotime($pembelian->created_at)) }}</th>
                   <th id="ex2">{{ $pembelian->suplier->nama_suplier }}</th>
                   <th id="ex2">{{ $pembelian->pajak }} %</th>
                   <th id="ex2">{{ number_format(($pembelian->pajak / 100) * $pembelian->jumlah_tagihan) }}</th>
                   <th id="ex2">{{ number_format($pembelian->biaya_lain) }}</th>
                   <th id="ex2">{{ $pembelian->jenis }}</th>
                   <th id="ex2">{{ $pembelian->jenis == 'Kredit' ? date('d M Y',strtotime($pembelian->jatuh_tempo)) : '' }}</th>
                   <th id="ex2">{{ $pembelian->status_tagihan == 'lunas' ? 'Lunas' : 'Belum Terbayar' }}</th>
               </tr>
               <tr>
                    <td id="ex2" colspan="11">
                        <table id="ex2" width="100%">
                            <thead>
                                <tr>
                                    <th id="ex2">Obat</th>
                                    <th id="ex2">Jumlah</th>
                                    <th id="ex2">Harga Beli Satuan Satuan</th>
                                    <th id="ex2">Diskon</th>
                                    <th id="ex2">Nominal Diskon</th>
                                    {{-- <th id="ex2">Subtotal</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($detail as $item)
                                    @if ($item->no_faktur == $pembelian->no_faktur)
                                        <tr>
                                            <td id="ex2">{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
                                            <td id="ex2">{{ $item->jumlah_obat }} {{ $item->unit->nama }}</td>
                                            <td id="ex2">{{ number_format($item->harga_beli) }}</td>
                                            <td id="ex2">{{ $item->diskon }} %</td>
                                            <td id="ex2">{{ number_format(($item->diskon / 100) * $item->harga_beli) }}</td>
                                            {{-- <td id="ex2">{{ number_format($item->subtotal) }}</td> --}}
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </td>
               </tr>
         
		</tbody>
        @endforeach
        <tfoot>
            <tr>
                <th id="ex2" colspan="9">Total</th>
                <th id="ex2" colspan="2">{{ number_format($total_semua) }}</th>
            </tr>
        </tfoot>
		
		
	</table>
 
</body>
</html>

