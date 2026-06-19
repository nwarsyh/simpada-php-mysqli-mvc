<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulDokumen'] ;?></h5>
                                <a href="<?= BASEURL; ?>/Dokumen/tambahdokumen" type="button" class="btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-plus fa-sm text-white-50"></i> Tambah <?= $dataSimpanPinjam['SubJudulDokumen'] ;?>
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
                        <th class="text-center">Nomor Dokumen</th>
                        <th class="text-center">Nama Dokumen</th>
                        <th class="text-center">Kode Dokumen</th>
                        <th class="text-center">Jumlah Dokumen</th>
                        <th class="text-center">Status Dokumen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $No = 1;
                    foreach ($dataSimpanPinjam['dataDokumen'] as $dataDokumen):
                    if($dataDokumen['status_dokumen'] == "Aktif"){
                        $iconStatus = "bi bi-check"; $WarnaButton = 'btn-primary';
                    } else if($dataDokumen['status_dokumen'] == "Tidak Aktif"){
                        $iconStatus = "bi bi-x"; $WarnaButton = 'btn-danger';
                    } else if($dataDokumen['status_dokumen'] == "Permanen") {
                        $iconStatus = "bi bi-file-lock2"; $WarnaButton = 'btn-success';
                    } else if($dataDokumen['status_dokumen'] == "Dimusnahkan") {
                        $iconStatus = "bi bi-fire"; $WarnaButton = 'btn-warning';
                    } else{
                        $iconStatus = "bi bi-ban"; $WarnaButton = 'btn-info';
                    }
                    ?>
                        <tr class="text-center">
                        <td><?= $No; ?></td>
                        <td><?= $dataDokumen['nomor_dokumen'] ;?></td>
                        <td><?= $dataDokumen['nama_dokumen'] ;?></td>
                        <td><?= $dataDokumen['kode_dokumen'] ;?></td>
                        <td><?= $dataDokumen['jumlah_dokumen'] ;?></td>
                        <td>
                            <button type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>">
                                <i class="<?= $iconStatus?>"></i> <?= $dataDokumen['status_dokumen']; ?>
                            </button>
                        </td>
                        <td>
                            <a href="<?= BASEURL?>/Dokumen/detaildokumen/<?=$dataDokumen['id_dokumen']; ?>"
                               class="btn btn-success btn-sm costumbtn text-white me-2">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="<?= BASEURL?>/Dokumen/ubahdokumen/<?=$dataDokumen['id_dokumen']; ?>"
                               class="btn btn-warning btn-sm costumbtn text-white me-2">
                                <i class="bi bi-pen"></i>
                            </a>
                            <a href="<?= BASEURL?>/Dokumen/deleteDokumen/<?=$dataDokumen['id_dokumen']; ?>"
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