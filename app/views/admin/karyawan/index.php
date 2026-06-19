<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulKaryawan'] ;?></h6>
                    <!-- Tombol Action -->
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/Admin/Karyawan/tambahkaryawan" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-plus me-1"></i> Tambah <?= $dataSimpanPinjam['SubJudulKaryawan'] ;?>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">Nama Karyawan</th>
                            <th class="text-center">NIP Karyawan</th>
                            <th class="text-center">Departemen</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataKaryawan'] as $dataKaryawan):
                            if($dataKaryawan['status_karyawan'] == "Aktif"){
                                $warnadot = "status-dokumen-aktif";
                            } else if($dataKaryawan['status_karyawan'] == "Tidak Aktif"){
                                $warnadot = "status-dokumen-tidakaktif";
                            } else if($dataKaryawan['status_karyawan'] == "Ditangguhkan") {
                                $warnadot = "status-dokumen-dimusnahkan";
                            } else{
                                $warnadot = "status-dokumen-lainnya";
                            }

                        if($dataKaryawan['status_karyawan'] == "Aktif"){
                            $iconStatus = "bi bi-check"; $WarnaButton = 'bg-success';
                        }else if($dataKaryawan['status_karyawan'] == "Tidak Aktif"){
                            $iconStatus = "bi bi-x"; $WarnaButton = 'bg-danger';
                        }else if($dataKaryawan['status_karyawan'] == "Ditangguhkan") {
                            $iconStatus = "bi bi-sticky"; $WarnaButton = 'bg-warning';
                        }else{
                            $iconStatus = "bi bi-layers"; $WarnaButton = 'bg-info';
                        }
                        ?>
                        <tr class="text-center">
                            <td><?= $No; ?></td>
                            <td><?= $dataKaryawan['nama_depan_karyawan'] ;?> <?= $dataKaryawan['nama_belakang_karyawan'] ;?></td>
                            <td><?= $dataKaryawan['nip_karyawan'] ;?></td>
                            <td><?= $dataKaryawan['nama_departemen'] ;?></td>
                            <td>
                                <div class="status-peminjaman <?= $warnadot; ?>">
                                    <span class="status-dot"></span>
                                    <?= $dataKaryawan['status_karyawan']; ?>
                                </div>
                            </td>
                            <td>
                                <div class="table-action">
                                    <button class="kostumbtn btn table-action-btn">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="table-action-menu">
                                        <a href="<?= BASEURL?>/Admin/Karyawan/detailkaryawan/<?=$dataKaryawan['id_karyawan']; ?>">
                                            <i class="bi bi-eye text-success"></i> Detail Karyawan
                                        </a>
                                        <a href="<?= BASEURL?>/Admin/Karyawan/ubahkaryawan/<?=$dataKaryawan['id_karyawan']; ?>">
                                            <i class="bi bi-pen text-warning"></i> Ubah Karyawan
                                        </a>
                                        <a href="<?= BASEURL?>/Admin/Karyawan/deleteKaryawan/<?=$dataKaryawan['id_karyawan']; ?>"
                                           class="alert-confirm-hapus">
                                            <i class="bi bi-trash text-danger"></i> Hapus Karyawan
                                        </a>
                                    </div>
                                </div>





<!--                                -->
<!--                                <a href="--><?//= BASEURL?><!--/Admin/Karyawan/detailkaryawan/--><?//=$dataKaryawan['id_karyawan']; ?><!--"-->
<!--                                   class="btn btn-success kostumbtn me-2">-->
<!--                                    <i class="bi bi-eye"></i>-->
<!--                                </a>-->
<!--                                <a href="--><?//= BASEURL?><!--/Admin/Karyawan/ubahkaryawan/--><?//=$dataKaryawan['id_karyawan']; ?><!--"-->
<!--                                   class="btn btn-warning kostumbtn text-white me-2">-->
<!--                                    <i class="bi bi-pen"></i>-->
<!--                                </a>-->
<!--                                <a href="--><?//= BASEURL?><!--/Admin/Karyawan/deleteKaryawan/--><?//=$dataKaryawan['id_karyawan']; ?><!--"-->
<!--                                   class="btn btn-danger kostumbtn alert-confirm-hapus">-->
<!--                                    <i class="bi bi-trash"></i>-->
<!--                                </a>-->

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