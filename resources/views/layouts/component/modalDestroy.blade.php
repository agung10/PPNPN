<!-- MODAL DELETE -->
<div class="modal animated fadeInDownBig text-left" id="modalDestroy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header white bg-danger">
                <h5 class="modal-title white" id="exampleModalLabel">Konfirmasi Hapus</h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary has-ripple" data-dismiss="modal">Tutup</button>
                <form id="deleteConf" method="POST" action="">
                @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger has-ripple">Hapus</a>
                </form>
            </div>
        </div>
    </div>
</div>