<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulTransaksi'] ;?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">NIP Karyawan</th>
                            <th class="text-center">Nama Karyawan</th>
                            <th class="text-center">Nomor Dokumen</th>
                            <th class="text-center">Tanggal Peminjaman</th>
                            <th class="text-center">Tanggal Rencana</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataTransaksi'] as $dataTransaksi):
                            if($dataTransaksi['status_peminjaman'] == "Menunggu Konfirmasi"){
                                $warnadot = "status-menunggu";
                            } else if($dataTransaksi['status_peminjaman'] == "Peminjaman Aktif"){
                                $warnadot = "status-aktif";
                            } else if($dataTransaksi['status_peminjaman'] == "Sudah Dikembalikan") {
                                $warnadot = "status-kembali";
                            } else if($dataTransaksi['status_peminjaman'] == "Diterima"){
                                $warnadot = "status-diapprove";
                            } else if($dataTransaksi['status_peminjaman'] == "Ditolak"){
                                $warnadot = "status-ditolak";
                            } else{
                                $warnadot = "status-lainnya";
                            }
                        ?>
                        <tr class="text-center">
                            <td><?= $No; ?></td>
                            <td><?= $dataTransaksi['nip_karyawan'] ;?></td>
                            <td><?= $dataTransaksi['nama_depan_karyawan'] ;?> <?= $dataTransaksi['nama_belakang_karyawan'] ;?></td>
                            <td><?= $dataTransaksi['nomor_dokumen'] ;?></td>
                            <td><?= FormatDate($dataTransaksi['tgl_peminjaman']) ;?></td>
                            <td><?= FormatDate($dataTransaksi['tgl_rencana_pengembalian']) ;?></td>
                            <td>
                                <div class="status-peminjaman <?= $warnadot; ?>">
                                    <span class="status-dot"></span>
                                    <?= $dataTransaksi['status_peminjaman']; ?>
                                </div>
                            </td>
                            <td>
                                <?php if ($dataTransaksi['status_peminjaman'] == "Menunggu Konfirmasi"):?>
                                <div class="table-action">
                                    <button class="kostumbtn btn table-action-btn">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="table-action-menu">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#ubahPeminjamanKonfirmasi<?=$dataTransaksi['id_peminjaman']; ?>">
                                            <i class="bi bi-arrow-clockwise text-warning"></i> <?= $dataTransaksi['status_peminjaman']; ?>
                                        </a>
                                    </div>
                                </div>
                                <?php elseif ($dataTransaksi['status_peminjaman'] == "Sudah Dikembalikan"): ?>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="#">
                                                <i class="bi bi-check2-square text-primary"></i> <?= $dataTransaksi['status_peminjaman']; ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php else:?>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#ubahPeminjamanAktif<?=$dataTransaksi['id_peminjaman']; ?>">
                                                <i class="bi bi-radioactive text-success"></i> <?= $dataTransaksi['status_peminjaman']; ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </td>
                        </tr>
                            <div class="modal fade" id="ubahPeminjamanKonfirmasi<?=$dataTransaksi['id_peminjaman']; ?>"
                                 tabindex="-1" aria-labelledby="ubahPeminjamanKonfirmasiLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ubahPeminjamanKonfirmasiLabel">Konfirmasi Peminjaman</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= BASEURL?>/Transaksi/updateKonfirmasiTransaksi" method="post">
                                            <div class="modal-body">
                                                <input id="id_peminjaman" name="id_peminjaman" value="<?= $dataTransaksi['id_peminjaman']; ?>" type="hidden" class="form-control form-control-sm">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php
                                                        $file = __DIR__ . '/detailpinjaman.php';
                                                        if (file_exists($file)) {
                                                            include $file;
                                                        } else {
                                                            echo "<!-- Sidebar kiri tidak ditemukan -->";
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
                                                            <input id="tgl_pinjam" name="tgl_pinjam" value="<?= FormatDate($dataTransaksi['tgl_peminjaman'])?>" type="text" class="form-control form-control-sm form-loginsatu" readonly>

                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="tgl_rencana_kembali" class="form-label">Tanggal Rencana Pengembalian</label>
                                                            <input id="tgl_rencana_kembali" name="tgl_rencana_kembali" value="<?= FormatDate($dataTransaksi['tgl_rencana_pengembalian'])?>" type="text" class="form-control form-control-sm form-loginsatu" readonly>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                                                            <select id="status_peminjaman" name="status_peminjaman" class="form-select form-loginsatu form-select-sm" aria-label="Default select example">
                                                                <option value="<?= $dataTransaksi['status_peminjaman']; ?>"><?= $dataTransaksi['status_peminjaman']; ?></option>
                                                                <option value="Diterima">Approve Peminjaman</option>
                                                                <option value="Ditolak">Peminjaman Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="catatan_konfirmasi" class="form-label">Catatan Konfirmasi</label>
                                                            <textarea id="catatan_konfirmasi" name="catatan_konfirmasi" class="form-control form-control-sm form-loginsatu" placeholder="Catatan Konfirmasi Jika Ada" style="height: 100px"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Batal</button>
                                                <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                                                <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="ubahPeminjamanAktif<?=$dataTransaksi['id_peminjaman']; ?>"
                                 tabindex="-1" aria-labelledby="ubahPeminjamanAktifLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ubahPeminjamanAktifLabel">Ubah Status Pinjaman</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="<?= BASEURL?>/Transaksi/updateAktifTransaksi" method="post">
                                            <div class="modal-body">
                                                <input id="id_peminjaman" name="id_peminjaman" value="<?= $dataTransaksi['id_peminjaman']; ?>" type="hidden" class="form-control form-control-sm form-loginsatu">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php
                                                        $file = __DIR__ . '/detailpinjaman.php';
                                                        if (file_exists($file)) {
                                                            include $file;
                                                        } else {
                                                            echo "<!-- Sidebar kiri tidak ditemukan -->";
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
                                                            <input id="tgl_pinjam" name="tgl_pinjam" value="<?= FormatDate($dataTransaksi['tgl_peminjaman'])?>" type="text" class="form-control form-control-sm form-loginsatu" readonly>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="tgl_rencana_kembali" class="form-label">Tanggal Rencana Pengembalian</label>
                                                            <input id="tgl_rencana_kembali" name="tgl_rencana_kembali" value="<?= FormatDate($dataTransaksi['tgl_rencana_pengembalian'])?>" type="text" class="form-control form-control-sm form-loginsatu" readonly>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
                                                            <input id="tgl_kembali" name="tgl_kembali" type="date" class="form-control form-control-sm form-loginsatu">
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                                                            <select id="status_peminjaman" name="status_peminjaman" class="form-select form-loginsatu form-select-sm" aria-label="Default select example">
                                                                <option value="<?= $dataTransaksi['status_peminjaman']; ?>"><?= $dataTransaksi['status_peminjaman']; ?></option>
                                                                <option value="Peminjaman Aktif">Peminjaman Aktif</option>
                                                                <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="catatan_konfirmasi" class="form-label">Catatan Konfirmasi</label>
                                                            <textarea id="catatan_konfirmasi" name="catatan_konfirmasi" class="form-control form-loginsatu" placeholder="Catatan Konfirmasi Jika Ada" style="height: 100px"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Batal</button>
                                                <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                                                <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php $No++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('click', function(e) {
        document.querySelectorAll('.table-action-menu')
            .forEach(menu => {
            if (!menu.parentElement.contains(e.target)) {
            menu.classList.remove('show');
        }
    });
        if (e.target.closest('.table-action-btn')) {
            const menu = e.target
                .closest('.table-action')
                .querySelector('.table-action-menu');
            menu.classList.toggle('show');
        }
    });
</script>