<div class="modal-dialog" role="document">
    <form action="{{ route('obat.ubahhargabeli') }}" method="POST">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Harga Beli Satuan Obat {{ $obat->nama_obat }} ({{ $obat->kode_obat }})</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-12">
          
                    @csrf
                    @foreach ($satuan_obat as $item)
                    <div class="form-group">
                        <label>Harga 1 {{ $item->unit->nama }}</label>
                        <input type="hidden" name="id[]" value="{{ $item->id }}">
                        <input type="text" required name="harga[]" id="harga_{{ $item->id }}" class="form-control">
                    </div>
                    @endforeach
                
           
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
    </div>
</form>
</div>