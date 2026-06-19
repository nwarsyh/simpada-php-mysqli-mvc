<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulKaryawan'] ;?></h5>
                                <a href="<?= BASEURL; ?>/Admin/Karyawan/tambahkaryawan" type="button" class="btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-plus fa-sm text-white-50"></i> Tambah <?= $dataSimpanPinjam['SubJudulKaryawan'] ;?>
                                </a>
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
                        $iconStatus = "bi bi-check"; $WarnaButton = 'btn-success';
                    }else if($dataKaryawan['status_karyawan'] == "Tidak Aktif"){
                        $iconStatus = "bi bi-x"; $WarnaButton = 'btn-danger';
                    }else if($dataKaryawan['status_karyawan'] == "Ditangguhkan") {
                        $iconStatus = "bi bi-sticky"; $WarnaButton = 'btn-warning';
                    }else{
                        $iconStatus = "bi bi-layers"; $WarnaButton = 'btn-info';
                    }
                    ?>

                    <tr class="text-center">
                        <td><?= $No; ?></td>
                        <td><?= $dataKaryawan['nama_depan_karyawan'] ;?> <?= $dataKaryawan['nama_belakang_karyawan'] ;?></td>
                        <td><?= $dataKaryawan['nip_karyawan'] ;?></td>
                        <td><?= $dataKaryawan['nama_departemen'] ;?></td>
                        <td>
                            <button type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>">
                                <i class="<?= $iconStatus?>"></i> <?= $dataKaryawan['status_karyawan'] ;?>
                            </button>
                        </td>
                        <td>
                            <a href="<?= BASEURL?>/Admin/Karyawan/detailkaryawan/<?=$dataKaryawan['id_karyawan']; ?>"
                               class="btn btn-success btn-sm costumbtn text-white me-2">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="<?= BASEURL?>/Admin/Karyawan/ubahkaryawan/<?=$dataKaryawan['id_karyawan']; ?>"
                               class="btn btn-warning btn-sm costumbtn text-white me-2">
                                <i class="bi bi-pen"></i>
                            </a>
                            <a href="<?= BASEURL?>/Admin/Karyawan/deleteKaryawan/<?=$dataKaryawan['id_karyawan']; ?>"
                               class="btn btn-danger btn-sm alert-confirm-hapus costumbtn">
                                <i class="bi bi-trash"></i>
                            </a>

                        </td>
                    </tr>
                        <?php $No++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>