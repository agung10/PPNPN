<!-- MODAL ADD -->
<div class="modal animated fadeInDownBig text-left" id="Addjabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel53" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel53">Tambah Jabatan</h4>
            </div>
            <form method="POST" action="{{ route('jabatan.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kd_jabatan">Kode Jabatan</label>
                                    <input input onkeypress="return isNumberKey(event)" type="text" id="kd_jabatan" class="form-control" placeholder="Masukan Kode Jabatan" name="kd_jabatan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_jabatan">Nama Jabatan</label>
                                    <input type="text" id="nm_jabatan" class="form-control" placeholder="Masukan Nama Jabatan" name="nm_jabatan" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kualifikasi_pend">Kualifikasi Pendidikan</label>
                            <input type="text" id="kualifikasi_pend" class="form-control" placeholder="Masukan Kualifikasi Pendidikan" name="kualifikasi_pend" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_jabatan">Lokasi Jabatan</label>
                            <input type="text" id="lokasi_jabatan" class="form-control" placeholder="Masukan Nama Jabatan" name="lokasi_jabatan" required>
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