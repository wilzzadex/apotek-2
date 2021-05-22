<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Satuan Obat {{ $obat->nama_obat }} ({{ $obat->kode_obat }})</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-12">
            <table>
                @foreach ($satuan_obat as $item)
                <tr>
                    <td> 1 </td>
                    <td> {{ $item->unit->nama }} </td>
                    <td> = </td>
                    <td> {{ $item->jumlah_satuan }} </td>
                    <td> {{ $item->satuanParent->unit->nama }} </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
    </div>
</div>