<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= BASEURL?>/Admin/Kategori/createKategori" method="post" id="formInputKategori">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input id="nama_kategori" name="nama_kategori" type="text" class="form-control form-control-sm" placeholder="Nama Kategori">
                                            <input id="id_kategori" name="id_kategori" type="hidden" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input id="kode_kategori" name="kode_kategori" type="text" class="form-control form-control-sm" placeholder="Kode Kategori">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-sm-flex justify-content-end gap-2">
                                            <button type="reset" class="btn btn-sm btn-danger costumbtn text-white" id="btnResetKategori">
                                                <i class="bi bi-ban text-white-50"></i>
                                                <span>Batal</span>
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-primary costumbtn" id="btnSubmitKategori">
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
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Create At</th>
                        <th class="text-center">Update At</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $No = 1;
                    foreach ($dataSimpanPinjam['dataKategori'] as $dataKategori):?>
                        <tr class="text-center">
                            <td><?= $No; ?></td>
                            <td><?= $dataKategori['nama_kategori'] ;?></td>
                            <td><?= $dataKategori['kode_kategori'] ;?></td>
                            <td><?= FormatDateTime($dataKategori['create_at_kategori']) ;?></td>
                            <td><?= FormatDateTime($dataKategori['update_at_kategori']) ;?></td>
                            <td>
                                <button class="btn btn-warning btn-sm text-white costumbtn btn-editKategori"
                                        data-id_kategori="<?=$dataKategori['id_kategori']; ?>"
                                        data-nama_kategori="<?=$dataKategori['nama_kategori']; ?>"
                                        data-kode_kategori="<?=$dataKategori['kode_kategori']; ?>">
                                    <i class="bi bi-pen"></i>
                                </button>
                                <a href="<?= BASEURL?>/Admin/Kategori/deleteKategori/<?=$dataKategori['id_kategori']; ?>"
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