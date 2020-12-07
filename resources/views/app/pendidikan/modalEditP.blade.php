<!-- MODAL EDIT -->
<button id="openModalEdit" data-toggle="modal" data-target="#EditPendidikan" style="display:none"></button>
<div class="modal animated fadeInDownBig text-left" id="EditPendidikan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel53" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning white">
                <h4 class="modal-title white" id="myModalLabel53">Ubah Pendidikan</h4>
            </div>
            <form id="formEditP" method="POST" action="">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kd_pend">Kode Pendidikan</label>
                                    <input input onkeypress="return isNumberKey(event)" type="text" id="kd_pendEdit" class="form-control" placeholder="Masukan Kode Pendidikan" name="kd_pend">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_pend">Nama Pendidikan</label>
                                    <input type="text" id="nm_pendEdit" class="form-control" placeholder="Masukan Nama Pendidikan" name="nm_pend">
                                </div>
                            </div>
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