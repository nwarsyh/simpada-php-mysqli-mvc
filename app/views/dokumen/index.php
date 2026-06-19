<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulDokumen'] ;?></h6>

                    <!-- Tombol Action -->
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/Dokumen/tambahdokumen" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-plus me-1"></i> Tambah <?= $dataSimpanPinjam['SubJudulDokumen'] ;?>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">Nomor Dokumen</th>
                            <th class="text-center">Nama Dokumen</th>
                            <th class="text-center">Masa Retensi</th>
                            <th class="text-center">Status Dokumen</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataDokumen'] as $dataDokumen):
                            if($dataDokumen['status_dokumen'] == "Aktif"){
                                $warnadot = "status-dokumen-aktif";
                            } else if($dataDokumen['status_dokumen'] == "Tidak Aktif"){
                                $warnadot = "status-dokumen-tidakaktif";
                            } else if($dataDokumen['status_dokumen'] == "Dimusnahkan") {
                                $warnadot = "status-dokumen-dimusnahkan";
                            } else if($dataDokumen['status_dokumen'] == "Permanen"){
                                $warnadot = "status-dokumen-permanen";
                            } else{
                                $warnadot = "status-dokumen-lainnya";
                            }




                            if($dataDokumen['status_dokumen'] == "Aktif"){
                                $iconStatus = "bi bi-check"; $WarnaButton = 'bg-primary';
                            } else if($dataDokumen['status_dokumen'] == "Tidak Aktif"){
                                $iconStatus = "bi bi-x"; $WarnaButton = 'bg-danger';
                            } else if($dataDokumen['status_dokumen'] == "Permanen") {
                                $iconStatus = "bi bi-file-lock2"; $WarnaButton = 'bg-success';
                            } else if($dataDokumen['status_dokumen'] == "Dimusnahkan") {
                                $iconStatus = "bi bi-fire"; $WarnaButton = 'bg-warning';
                            } else{
                                $iconStatus = "bi bi-ban"; $WarnaButton = 'bg-info';
                            }
                            $TanggalAwal = new DateTime($dataDokumen['tgl_awal_dokumen']);
                            $TanggalAkhir = new DateTime($dataDokumen['tgl_retensi_dokumen']);
                            $MasaRestensi = $TanggalAwal->diff($TanggalAkhir)->y;
                            ?>
                            <tr class="text-center">
                                <td><?= $No; ?></td>
                                <td><?= $dataDokumen['nomor_dokumen'] ;?></td>
                                <td>(<?= $dataDokumen['kode_dokumen'] ;?>) <?= $dataDokumen['nama_dokumen'] ;?></td>
                                <td>
                                    <?= FormatDate($dataDokumen['tgl_awal_dokumen']) ;?><br>
                                    s/d <?= FormatDate($dataDokumen['tgl_retensi_dokumen']) ;?><br>
                                    (<?= $MasaRestensi ;?> Tahun)
                                </td>
                                <td>
                                    <div class="status-peminjaman <?= $warnadot; ?>">
                                        <span class="status-dot"></span>
                                        <?= $dataDokumen['status_dokumen']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="<?= BASEURL?>/Dokumen/detaildokumen/<?=$dataDokumen['id_dokumen']; ?>">
                                                <i class="bi bi-eye text-success"></i> Detail Dokumen
                                            </a>
                                            <a href="<?= BASEURL?>/Dokumen/ubahdokumen/<?=$dataDokumen['id_dokumen']; ?>">
                                                <i class="bi bi-pen text-warning"></i> Ubah Dokumen
                                            </a>
                                            <a href="<?= BASEURL?>/Dokumen/deleteDokumen/<?=$dataDokumen['id_dokumen']; ?>" class="alert-confirm-hapus">
                                                <i class="bi bi-trash text-danger"></i> Hapus Dokumen
                                            </a>
                                        </div>
                                    </div>


<!--                                    <a href="--><?//= BASEURL?><!--/Dokumen/detaildokumen/--><?//=$dataDokumen['id_dokumen']; ?><!--"-->
<!--                                       class="btn btn-success kostumbtn me-2">-->
<!--                                        <i class="bi bi-eye"></i>-->
<!--                                    </a>-->
<!--                                    <a href="--><?//= BASEURL?><!--/Dokumen/ubahdokumen/--><?//=$dataDokumen['id_dokumen']; ?><!--"-->
<!--                                       class="btn btn-warning kostumbtn text-white me-2">-->
<!--                                        <i class="bi bi-pen"></i>-->
<!--                                    </a>-->
<!--                                    <a href="--><?//= BASEURL?><!--/Dokumen/deleteDokumen/--><?//=$dataDokumen['id_dokumen']; ?><!--"-->
<!--                                       class="btn btn-danger kostumbtn alert-confirm-hapus">-->
<!--                                        <i class="bi bi-trash"></i>-->
<!--                                    </a>-->
                                </td>
                            </tr>
                            <?php $No++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--END Bagian Konten CRUD-->
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