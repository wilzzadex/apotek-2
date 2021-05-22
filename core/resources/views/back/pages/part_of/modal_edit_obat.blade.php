<div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 1000px">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Masuk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               X
            </button>
          </div>
        <div class="modal-body">
            <form method="POST" id="form_edit_obat">
                @csrf
               
                        <div class="row">
                            <div class="col-4 mt-2">
                                <input type="hidden" name="id" value="{{ $temp->id }}">
                                <label>Nama Obat</label>
                                <span class="text-danger">*</span></label>
                                <select name="obat_id" onchange="obat_change(this)" style="width: 100%" class="form-control" id="obat_id_edit">
                                    <option value="">- Pilih Obat -</option>
                                    @foreach ($obat as $item)
                                        <option value="{{ $item->kode_obat }}" {{ $item->kode_obat == $temp->kode_obat ? 'selected' : '' }}>{{ $item->kode_obat }}-{{ $item->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-2">
                                <label>No Batch</label>
                                <span class="text-danger">*</span></label>
                                <input type="text" style="text-transform: uppercase" value="{{ $temp->no_batch }}" name="no_batch" class="form-control" placeholder="No Batch" id="no_batch_edit">
                            </div>
                            <div class="col-4 mt-2">
                                <label>Jumlah</label>
                                <span class="text-danger">*</span></label>
                                <input type="number" name="jumlah_obat" class="form-control" value="{{ $temp->jumlah_obat }}" placeholder="Jumlah" min="0" id="jumlah_obat_edit">
                            </div>
                            <div class="col-4 mt-2">
                                <label>Unit</label>
                                <span class="text-danger">*</span></label>
                                <select  name="unit_id" onchange="unitChange(this)" style="width: 100%" class="form-control" id="unit_id_edit">
                                    <option value="">- Pilih Satuan -</option>
                                    @foreach ($unit as $item)
                                        <option value="{{ $item->unit->id }}" {{ $item->unit->id == $temp->unit_id  ? 'selected' : ''}}>{{ $item->unit->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-2">
                                <label>Tanggal Expired</label>
                                <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ date('m/d/Y',strtotime($temp->tgl_exp)) }}" name="tgl_exp" id="tgl_exp_edit" readonly placeholder="Klik disini ..."/>
                            </div>
                            <div class="col-4 mt-2">
                                <label>HNA (Rp)</label>
                                <span class="text-danger">*</span></label>
                                <input type="text" name="harga_beli" value="{{ $satuan_obat->harga_beli }}" class="form-control" placeholder="Harga Beli" id="harga_beli_edit">
                            </div>
                            <div class="col-4 mt-2">
                                <label>Diskon (%)</label>
                                <input type="number" name="diskon" value="{{ $temp->diskon }}" class="form-control" min="0" placeholder="Diskon" id="diskon_edit">
                            </div>
                            <div class="col-4 mt-2">
                                <label>PPn (%)</label>
                                <input type="number" onkeyup="changeHna(this)" name="margin_jual" value="{{ $temp->margin_jual }}" class="form-control" min="0" placeholder="Margin Harga Jual" id="margin_jual_edit">
                            </div>
                            <div class="col-4 mt-2">
                                <label>PPn + Hna (Rp)</label>
                                <input type="text" name="hna_ppn" value="{{ $temp->margin_jual }}" class="form-control" min="0" placeholder="Margin Harga Jual" id="hna_ppn_edit">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary float-right" id="btn-tambah">Ubah</button>
                                {{-- <button type="button" class="btn btn-warning float-right" id="btn-ubah">Ubah</button> --}}
                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                        
                    
            </form>
        </div>
    </div>
</div>