@foreach ($list as $item)
    <tr>
        <td>{{ $item->kode_obat }} - {{ $item->obat->nama_obat }}</td>
        <td style="cursor: pointer" onclick="changePcs(this)" id="{{ $item->id }}"> <a href="javascript:void(0)"> {{ $item->jumlah_obat == 0 ? '--Masukan Jumlah--' : $item->jumlah_obat }}</a></td>
        <td style="cursor: pointer">{{ $item->unit_id == 0 ? '--Belum ada data--' : $item->unit->nama }}</td>
        <td>Rp.{{ number_format($item->harga,0,',','.') }}</td>
        <td style="cursor: pointer" onclick="changeDiskon(this)" id="{{ $item->id }}"><a href="javascript:void(0)"> Rp.{{ number_format(($item->diskon /100) * $item->subtotal,0,',','.') }} </a></td>
        <td><b> Rp {{ number_format($item->subtotal,0,',','.') }} </b> &nbsp; &nbsp; <button type="button" onclick="deleteList(this)" id="{{ $item->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> </td>
    </tr>

@endforeach

