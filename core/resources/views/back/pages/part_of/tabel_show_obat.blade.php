
<table class="table table-bordered" id="table-show">
    <thead>
    <tr>
        <td></td>
        <td>Obat</td>
        <td>Kategori</td>
        {{-- <td>Golongan</td> --}}
        <td>Tgl Exp</td>
        <td>Stok</td>
        <td>Harga Jual</td>
    </tr>
</thead>
<tbody>
    @foreach ($obat as $item)
    <tr>
        <td>
            <button onclick="addToList(this)" type="button" id="{{ $item->id }}" class="btn btn-icon btn-sm btn-success">
                <i class="fas fa-check"></i>
            </button>
        </td>
        <td>{{ $item->kode_obat }} - {{ $item->nama_obat }}</td>
        <td>{{ $item->kategori->nama_kategori }}</td>
        {{-- <td>{{ $item->golongan->nama_golongan }}</td> --}}
        <td>
            @php
                $exp = '';
                foreach($item->details as $key => $items){
                    if($key == 0){
                        $exp .= date('d M Y',strtotime($items->tgl_exp)) . '<br>';
                    }
                }
            @endphp
           {!! $exp !!}
        </td>
        <td>
            @php
                $stok = '';
                foreach($item->satuans as $key => $satuan){
                    $stok .= $satuan->stok . ' ' . $satuan->unit->nama . '<br>';
                }
            @endphp
           {!! $stok !!}
        </td>
        <td>
            @php
                $hargas = '';
                foreach($item->satuans as $key => $harga){
                    $hargas .= $harga->unit->nama . ' : ' . number_format($harga->harga_Jual,0,',','.') . '<br>';
                }
            @endphp
           {!! $hargas !!}
        </td>
    </tr>
    @endforeach                          
</tbody>                               
</table>