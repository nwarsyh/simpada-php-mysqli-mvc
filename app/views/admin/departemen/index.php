<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulDepartemen'] ;?></h6>
                </div>
                <form action="<?= BASEURL?>/Admin/Departemen/createDepartemen" method="post" id="formInputDepartemen">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input id="nama_departemen" name="nama_departemen" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Nama Departemen">
                                    <input id="id_departemen" name="id_departemen" type="hidden" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input id="kode_departemen" name="kode_departemen" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Kode Departemen">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-sm-flex justify-content-end gap-2">
                                    <button type="reset" class="btn kostumbtn btn-danger shadow-sm d-flex align-items-center" id="btnResetDepartemen">
                                        <i class="bi bi-ban me-1"></i>
                                        <span>Batal</span>
                                    </button>
                                    <button type="submit" class="btn kostumbtn btn-success shadow-sm d-flex align-items-center" id="btnSubmitDepartemen">
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
                            <th class="text-center">Nama Departemen</th>
                            <th class="text-center">Kode Departemen</th>
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
                                    <button class="btn btn-warning text-white kostumbtn btn-editDepartemen"
                                            data-iddepartemen="<?=$dataDepartemen['id_departemen']; ?>"
                                            data-namadepartemen="<?=$dataDepartemen['nama_departemen']; ?>"
                                            data-kodedepartemen="<?=$dataDepartemen['kode_departemen']; ?>">
                                        <i class="bi bi-pen"></i>
                                    </button>
                                    <a href="<?= BASEURL?>/Admin/Departemen/deleteDepartemen/<?=$dataDepartemen['id_departemen']; ?>"
                                       class="btn btn-danger alert-confirm-hapus kostumbtn">
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