<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <form id="formChangeDiskon">
                @csrf
                <div class="form-group">
                   
                    <label>Masukan Jumlah Diskon (%)</label>
                    <input type="number" name="diskon" value="{{ $temp->diskon}}" required min="0" class="form-control">
                    <input type="hidden" name="id" value="{{ $temp->id }}">
                
                    
                </div>
                <button type="button" class="btn btn-primary btn-sm float-right mt-3" onclick="actionChangeDiskon()">Simpan Perubahan</button>
            </form>
        </div>
        
    </div>
</div>