<div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 1000px">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               X
            </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table>
                    <tr>
                        <td><b>No Transaksi</b></td>
                        <td style="min-width: 30px;text-align:center">:</td>
                        <td>
                            {{$penjualan->no_transaksi}}
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Transaksi</b></td>
                        <td style="min-width: 30px;text-align:center">:</td>
                        <td>
                            {{ date('d F Y H:i',strtotime($penjualan->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <td><b>Kasir</b></td>
                        <td style="min-width: 30px;text-align:center">:</td>
                        <td>
                            {{$penjualan->user->name}}
                        </td>
                    </tr>
                </table>
                <br>
                <table class="table table-bordered" id="tabelDetail">
                    <tr>
                        <th style="max-width: 40px;min-width:40px">No</th>
                        <th style="min-width: 150px">Obat</th>
                        <th>Jumlah</th>
                        <th style="">Harga</th>
                        <th>Diskon</th>
                        <th>Nominal Diskon</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach ($detail as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
                        <td>{{ $item->jumlah_obat }}</td>
                        <td>Rp. {{ number_format($item->harga) }}</td>
                        <td>{{ $item->diskon }}</td>
                        <td>Rp.{{ number_format((($item->diskon / 100) * $item->harga)) }}</td>
                        <td>Rp.{{ number_format($item->subtotal) }}</td>
                    </tr>
                    @endforeach
                    <tr style="text-align: center">
                        <th colspan="2">Uang Bayar</th>
                        <th colspan="3">Uang Kembali</th>
                        <th colspan="2">Grand Total</th>
                    </tr>
                    <tr style="text-align: center">
                        <th colspan="2">{{ number_format($penjualan->uang_bayar) }}</th>
                        <th colspan="3">{{ number_format($penjualan->uang_kembali) }}</th>
                        <th colspan="2">{{ number_format($penjualan->jumlah_tagihan) }}</th>
                    </tr>
                   
                </table>
                <a href="{{ route('histori.penjualan.print',$penjualan->id) }}" class="btn btn-primary btn-sm float-right">Cetak Struk</a>
            </div>
        </div>
    </div>
</div>