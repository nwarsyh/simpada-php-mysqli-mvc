<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulTransaksi'] ;?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th class="text-center" width="5%">#</th>
                        <th class="text-center">NIP Karyawan</th>
                        <th class="text-center">Nama Karyawan</th>
                        <th class="text-center">Nomor Dokumen</th>
                        <th class="text-center">Tanggal Peminjaman</th>
                        <th class="text-center">Tanggal Rencana Pengembalian</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $No = 1;
                    foreach ($dataSimpanPinjam['dataTransaksi'] as $dataTransaksi):
                        if($dataTransaksi['status_peminjaman'] == "Menunggu Konfirmasi"){
                            $iconStatus = "bi bi-arrow-clockwise"; $WarnaButton = 'btn-warning';
                        } else if($dataTransaksi['status_peminjaman'] == "Peminjaman Aktif"){
                            $iconStatus = "bi bi-cpu"; $WarnaButton = 'btn-success';
                        } else if($dataTransaksi['status_peminjaman'] == "Sudah Dikembalikan") {
                            $iconStatus = "bi bi-check2-circle"; $WarnaButton = 'btn-primary';
                        } else{
                            $iconStatus = "bi bi-ban"; $WarnaButton = 'btn-info';
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
                        <?php if ($dataTransaksi['status_peminjaman'] == "Menunggu Konfirmasi"):?>
                            <a href="#" type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>"
                               data-bs-toggle="modal" data-bs-target="#ubahPeminjamanKonfirmasi<?=$dataTransaksi['id_peminjaman']; ?>">
                                <i class="<?= $iconStatus?>"></i> <?= $dataTransaksi['status_peminjaman']; ?>
                            </a>
                        <?php elseif ($dataTransaksi['status_peminjaman'] == "Sudah Dikembalikan"): ?>
                            <a href="#" type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>">
                                <i class="<?= $iconStatus?>"></i> <?= $dataTransaksi['status_peminjaman']; ?>
                            </a>
                        <?php else:?>
                            <a href="#" type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>"
                               data-bs-toggle="modal" data-bs-target="#ubahPeminjamanAktif<?=$dataTransaksi['id_peminjaman']; ?>">
                                <i class="<?= $iconStatus?>"></i> <?= $dataTransaksi['status_peminjaman']; ?>
                            </a>
                        <?php endif;?>

                            </td>
                        </tr>
                        <!--Start Konfirmasi Peminjaman Account-->
                        <div class="modal fade"
                             id="ubahPeminjamanKonfirmasi<?=$dataTransaksi['id_peminjaman']; ?>"
                             tabindex="-1"
                             aria-labelledby="ubahPeminjamanKonfirmasiLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ubahPeminjamanKonfirmasiLabel">Ubah Status Peminjaman</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL?>/Transaksi/updateKonfirmasiTransaksi" method="post">
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
                                                        <input id="tgl_pinjam" name="tgl_pinjam" value="<?= FormatDate($dataTransaksi['tgl_peminjaman'])?>" type="text" class="form-control form-control-sm" readonly>

                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="tgl_rencana_kembali" class="form-label">Tanggal Rencana Pengembalian</label>
                                                        <input id="tgl_rencana_kembali" name="tgl_rencana_kembali" value="<?= FormatDate($dataTransaksi['tgl_rencana_pengembalian'])?>" type="text" class="form-control form-control-sm" readonly>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                                                        <select id="status_peminjaman" name="status_peminjaman" class="form-select form-select-sm" aria-label="Default select example">
                                                            <option value="<?= $dataTransaksi['status_peminjaman']; ?>"><?= $dataTransaksi['status_peminjaman']; ?></option>
                                                            <option value="Diterima">Approve Peminjaman</option>
                                                            <option value="Ditolak">Peminjaman Ditolak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="catatan_konfirmasi" class="form-label">Catatan Konfirmasi</label>
                                                        <textarea id="catatan_konfirmasi" name="catatan_konfirmasi" class="form-control" placeholder="Catatan Konfirmasi Jika Ada" style="height: 100px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary costumbtn">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--ENDA Konfirmasi Peminjaman Account-->
                        <!--Start Konfirmasi Peminjaman Account-->
                        <div class="modal fade"
                             id="ubahPeminjamanAktif<?=$dataTransaksi['id_peminjaman']; ?>"
                             tabindex="-1"
                             aria-labelledby="ubahPeminjamanKonfirmasiLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ubahPeminjamanKonfirmasiLabel">Ubah Status Peminjaman</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL?>/Transaksi/updateAktifTransaksi" method="post">
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
                                                        <input id="tgl_pinjam" name="tgl_pinjam" value="<?= FormatDate($dataTransaksi['tgl_peminjaman'])?>" type="text" class="form-control form-control-sm" readonly>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="tgl_rencana_kembali" class="form-label">Tanggal Rencana Pengembalian</label>
                                                        <input id="tgl_rencana_kembali" name="tgl_rencana_kembali" value="<?= FormatDate($dataTransaksi['tgl_rencana_pengembalian'])?>" type="text" class="form-control form-control-sm" readonly>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
                                                        <input id="tgl_kembali" name="tgl_kembali" type="date" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                                                        <select id="status_peminjaman" name="status_peminjaman" class="form-select form-select-sm" aria-label="Default select example">
                                                            <option value="<?= $dataTransaksi['status_peminjaman']; ?>"><?= $dataTransaksi['status_peminjaman']; ?></option>
                                                            <option value="Peminjaman Aktif">Peminjaman Aktif</option>
                                                            <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="catatan_konfirmasi" class="form-label">Catatan Konfirmasi</label>
                                                        <textarea id="catatan_konfirmasi" name="catatan_konfirmasi" class="form-control" placeholder="Catatan Konfirmasi Jika Ada" style="height: 100px"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary costumbtn">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--ENDA Konfirmasi Peminjaman Account-->
                        <?php $No++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>