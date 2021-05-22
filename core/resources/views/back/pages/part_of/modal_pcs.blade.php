<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <form id="formChangePcs">
                @csrf
                <div class="form-group row mt-5">
                    <div class="col-6">
                        <label>Masukan Jumlah Obat</label>
                        <input type="number" min="1" value="{{ $temp->jumlah_obat }}" name="jumlah_obat" id="modal_jumlah_obat" required min="0" class="form-control">
                        <input type="hidden" name="id" value="{{ $temp->id }}">
                    </div>
                    <div class="col-6">
                        <label>Pilih Satuan Obat</label>
                        <select name="unit_id" id="unit_id" id="modal_satuan_obat" class="form-control">
                            @foreach ($satuan as $item)
                                <option value="{{ $item->unit_id }}" {{ $item->unit_id == $temp->unit_id ? 'selected' : ''  }}>{{ $item->unit->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="col-12">
                        <button type="button" onclick="actionChangePcs()" id="btn-change-pcs" class="btn btn-primary btn-sm float-right mt-3">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>