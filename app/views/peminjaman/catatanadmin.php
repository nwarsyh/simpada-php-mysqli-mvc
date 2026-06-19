
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="keteranganDiterimaLabel">Catatan Konfirmasi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action bg-success" aria-current="true">
                    Catatan Admin
                </button>
                <button type="button" class="list-group-item list-group-item-action"><?= $dataPeminjaman['catatan_admin_peminjaman'];?></button>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
