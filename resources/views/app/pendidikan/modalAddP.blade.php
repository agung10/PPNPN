<!-- MODAL ADD -->
<div class="modal animated fadeInDownBig text-left" id="AddPendidikan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel53" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel53">Tambah Pendidikan</h4>
            </div>
            <form method="POST" action="{{ route('pendidikan.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kd_pend">Kode Pendidikan</label>
                                    <input input onkeypress="return isNumberKey(event)" type="text" id="kd_pend" class="form-control" placeholder="Masukan Kode Pendidikan" name="kd_pend" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_pend">Nama Pendidikan</label>
                                    <input type="text" id="nm_pend" class="form-control" placeholder="Masukan Nama Pendidikan" name="nm_pend" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>