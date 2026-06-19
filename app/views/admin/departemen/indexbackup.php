<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= BASEURL?>/Admin/Departemen/createDepartemen" method="post" id="formInputDepartemen">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input id="nama_departemen" name="nama_departemen" type="text" class="form-control form-control-sm" placeholder="Nama Departemen">
                                            <input id="id_departemen" name="id_departemen" type="hidden" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input id="kode_departemen" name="kode_departemen" type="text" class="form-control form-control-sm" placeholder="Kode Departemen">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-sm-flex justify-content-end gap-2">
                                            <button type="reset" class="btn btn-sm btn-danger costumbtn text-white" id="btnResetDepartemen">
                                                <i class="bi bi-ban text-white-50"></i>
                                                <span>Batal</span>
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-primary costumbtn" id="btnSubmitDepartemen">
                                                <i class="bi bi-floppy text-white-50"></i>
                                                <span>Simpan</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        <th class="text-center">Nama Departemen</th>
                        <th class="text-center">KOde Departemen</th>
                        <th class="text-center">Create At</th>
                        <th class="text-center">Update At</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $No = 1;
                    foreach ($dataSimpanPinjam['dataDepartemen'] as $dataDepartemen):?>
                    <tr class="text-center">
                        <td><?= $No; ?></td>
                        <td><?= $dataDepartemen['nama_departemen'] ;?></td>
                        <td><?= $dataDepartemen['kode_departemen'] ;?></td>
                        <td><?= FormatDateTime($dataDepartemen['create_at_departemen']) ;?></td>
                        <td><?= FormatDateTime($dataDepartemen['update_at_departemen']) ;?></td>
                        <td>
                            <button class="btn btn-warning btn-sm text-white costumbtn btn-editDepartemen"
                                    data-id_departemen="<?=$dataDepartemen['id_departemen']; ?>"
                                    data-nama_departemen="<?=$dataDepartemen['nama_departemen']; ?>"
                                    data-kode_departemen="<?=$dataDepartemen['kode_departemen']; ?>">
                                <i class="bi bi-pen"></i>
                            </button>
                            <a href="<?= BASEURL?>/Admin/Departemen/deleteDepartemen/<?=$dataDepartemen['id_departemen']; ?>"
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