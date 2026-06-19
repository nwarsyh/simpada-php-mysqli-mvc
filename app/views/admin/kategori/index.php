<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulKategori'] ;?></h6>
                </div>
                <form action="<?= BASEURL?>/Admin/Kategori/createKategori" method="post" id="formInputKategori">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input id="nama_kategori" name="nama_kategori" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Nama Kategori">
                                    <input id="id_kategori" name="id_kategori" type="hidden" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input id="kode_kategori" name="kode_kategori" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Kode Kategori">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-sm-flex justify-content-end gap-2">

                                    <button type="reset" class="btn kostumbtn btn-danger shadow-sm d-flex align-items-center" id="btnResetKategori">
                                        <i class="bi bi-ban me-1"></i>
                                        <span>Batal</span>
                                    </button>
                                    <button type="submit" class="btn kostumbtn btn-success shadow-sm d-flex align-items-center" id="btnSubmitKategori">
                                        <i class="bi bi-floppy me-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr class="anwar-separator anwar-separator-dot"/>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
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
                                    <button class="btn btn-warning kostumbtn text-white btn-editKategori"
                                            data-idkategori="<?=$dataKategori['id_kategori']; ?>"
                                            data-namakategori="<?=$dataKategori['nama_kategori']; ?>"
                                            data-kodekategori="<?=$dataKategori['kode_kategori']; ?>">
                                        <i class="bi bi-pen"></i>
                                    </button>
                                    <a href="<?= BASEURL?>/Admin/Kategori/deleteKategori/<?=$dataKategori['id_kategori']; ?>"
                                       class="btn btn-danger kostumbtn alert-confirm-hapus">
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
    </div>
    <!--END Bagian Konten CRUD-->
</div>
