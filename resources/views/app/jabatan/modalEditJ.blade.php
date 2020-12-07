<!-- MODAL EDIT -->
<button id="openModalEdit" data-toggle="modal" data-target="#EditJabatan" style="display:none"></button>
<div class="modal animated fadeInDownBig text-left" id="EditJabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel53" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning white">
                <h4 class="modal-title white" id="myModalLabel53">Ubah Jabatan</h4>
            </div>
            <form id="formEditJ" method="POST" action="">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kd_jabatan">Kode Jabatan</label>
                                    <input input onkeypress="return isNumberKey(event)" type="text" id="kd_jabatanEdit" class="form-control" placeholder="Masukan Kode Jabatan" name="kd_jabatan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_jabatan">Nama Jabatan</label>
                                    <input type="text" id="nm_jabatanEdit" class="form-control" placeholder="Masukan Nama Jabatan" name="nm_jabatan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kualifikasi_pend">Kualifikasi Pendidikan</label>
                            <input type="text" id="kualifikasi_pendEdit" class="form-control" placeholder="Masukan Nama Jabatan" name="kualifikasi_pend">
                        </div>
                        <div class="form-group">
                            <label for="lokasi_jabatan">Lokasi Jabatan</label>
                            <input type="text" id="lokasi_jabatanEdit" class="form-control" placeholder="Masukan Lokasi Jabatan" name="lokasi_jabatan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>