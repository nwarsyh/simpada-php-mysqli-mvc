<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulAccount'] ;?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">NIP Karyawan</th>
                            <th class="text-center">Nama Karyawan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataAccount'] as $dataAccount):
                            if($dataAccount['id_accounts'] === 0){
                                $StatusUser = "Belum Punya Akun"; $warnadot = "status-dokumen-tidakaktif";
                            } else{
                                $StatusUser = "Sudah Punya Akun"; $warnadot = "status-dokumen-aktif";
                            }




                        if ($dataAccount['id_accounts'] === 0){
                            $StatusUser = "Belum Punya Akun"; $badge = "bg-danger";
                        }else{
                            $StatusUser = "Sudah Punya Akun"; $badge = "bg-success";
                        }?>
                        <tr class="text-center">
                            <td><?= $No; ?></td>
                            <td><?= $dataAccount['nip_karyawan'] ;?></td>
                            <td><?= $dataAccount['nama_depan_karyawan'] ;?> <?= $dataAccount['nama_belakang_karyawan'] ;?></td>
                            <td>
                                <div class="status-peminjaman <?= $warnadot; ?>">
                                    <span class="status-dot"></span>
                                    <?= $StatusUser; ?>
                                </div>
                            </td>
                            <td>
                                <?php  if ($dataAccount['id_accounts']) :?>
                                <div class="table-action">
                                    <button class="kostumbtn btn table-action-btn">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="table-action-menu">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#ubahAccount<?=$dataAccount['id_karyawan']; ?>">
                                            <i class="bi bi-person-exclamation text-warning"></i> Ubah Akun
                                        </a>

                                        <a href="<?= BASEURL?>/Admin/Account/deleteAccount/<?=$dataAccount['id_accounts']; ?>"
                                           class="alert-confirm-hapus kostumbtn">
                                            <i class="bi bi-person-dash text-danger"></i> Hapus Akun
                                        </a>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="table-action">
                                    <button class="kostumbtn btn table-action-btn">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="table-action-menu">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#tambahAccount<?=$dataAccount['id_karyawan']; ?>">
                                            <i class="bi bi-person-add text-success"></i> Tambah Akun
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                            <!--START TAMBAH ACCOUNT-->
                            <div class="modal fade" id="tambahAccount<?=$dataAccount['id_karyawan']; ?>"
                                 tabindex="-1" aria-labelledby="tambahAccountLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="tambahAccountLabel">Tambah Identitas</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= BASEURL?>/Admin/Account/createAccount" method="post">
                                                <div class="form-group">
                                                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                                    <input id="nama_karyawan" name="nama_karyawan" value="<?= $dataAccount['nip_karyawan'] ;?> | <?= $dataAccount['nama_depan_karyawan'] ;?> <?= $dataAccount['nama_belakang_karyawan'] ;?>" type="text" class="form-control form-control-sm form-loginsatu" readonly>
                                                    <input id="id_karyawan" name="id_karyawan" value="<?= $dataAccount['id_karyawan'] ;?>" type="hidden" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="role_accounts" class="form-label">Role Users</label>
                                                    <select id="role_accounts" name="role_accounts" class="form-select form-control form-select-sm" aria-label="Default select example">
                                                        <option selected>--Pilih Role Akses--</option>
                                                        <option value="Admin">Admin</option>
                                                        <!--<option value="Tata Usaha (TU">Tata Usaha (TU</option>-->
                                                        <option value="Arsiparis">Arsiparis</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="user_accounts" class="form-label">Username</label>
                                                    <input id="user_accounts" name="user_accounts" required type="text" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass_accounts" class="form-label">Password</label>
                                                    <input id="pass_accounts" name="pass_accounts" required type="password" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ulangi_pass_accounts" class="form-label">Ulangi Password</label>
                                                    <input id="ulangi_pass_accounts" name="ulangi_pass_accounts" required type="password" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Tutup</button>
                                            <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                                            <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--END TAMBAH ACCOUNT-->
                            <!--START UBAH IDENTITAS-->
                            <div class="modal fade" id="ubahAccount<?=$dataAccount['id_karyawan']; ?>"
                                 tabindex="-1" aria-labelledby="ubahAccountLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ubahAccountLabel">Ubah Account</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= BASEURL?>/Admin/Account/updateAccount" method="post">
                                                <div class="form-group">
                                                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                                    <input id="nama_karyawan" name="nama_karyawan" value="<?= $dataAccount['nip_karyawan'] ;?> | <?= $dataAccount['nama_depan_karyawan'] ;?> <?= $dataAccount['nama_belakang_karyawan'] ;?>" type="text" class="form-control form-control-sm form-loginsatu" readonly>
                                                    <input id="id_accounts" name="id_accounts" value="<?= $dataAccount['id_accounts'] ;?>" type="hidden" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="role_accounts" class="form-label">Role Users</label>
                                                    <select id="role_accounts" name="role_accounts" class="form-select form-control form-select-sm form-loginsatu" aria-label="Default select example">
                                                        <option value="<?= $dataAccount['role_accounts'] ;?>"><?= $dataAccount['role_accounts'] ;?></option>
                                                        <option value="Admin">Admin</option>
                                                        <!--<option value="Tata Usaha (TU">Tata Usaha (TU</option>-->
                                                        <option value="Arsiparis">Arsiparis</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="user_accounts" class="form-label">Username</label>
                                                    <input id="user_accounts" name="user_accounts" value="<?= $dataAccount['user_accounts'] ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass_accounts" class="form-label">Password</label>
                                                    <input id="pass_accounts" name="pass_accounts"type="password" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ulangi_pass_accounts" class="form-label">Ulangi Password</label>
                                                    <input id="ulangi_pass_accounts" name="ulangi_pass_accounts" type="password" class="form-control form-control-sm form-loginsatu">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Tutup</button>
                                            <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                                            <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--END UBAH ACCOUNT-->
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