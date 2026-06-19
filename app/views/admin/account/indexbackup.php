<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulAccount'] ;?></h5>
                                <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#">
                                    <i class="bi bi-plus fa-sm text-white-50"></i> Tambah <?= $dataSimpanPinjam['SubJudulAccount'] ;?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <table class="table table-striped" id="table1">
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
                    if ($dataAccount['id_accounts'] === 0){
                        $StatusUser = "Belum Punya Akun"; $badge = "bg-danger";
                    }else{
                        $StatusUser = "Sudah Punya Akun"; $badge = "bg-success";
                    }?>
                    <tr class="text-center">
                        <td><?= $No; ?></td>
                        <td><?= $dataAccount['nip_karyawan'] ;?></td>
                        <td><?= $dataAccount['nama_depan_karyawan'] ;?> <?= $dataAccount['nama_belakang_karyawan'] ;?></td>
                        <td><span class="badge <?= $badge; ?>"><?= $StatusUser; ?></span></td>
                        <td>
                    <?php  if ($dataAccount['id_accounts']) :?>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ubahAccount<?=$dataAccount['id_karyawan']; ?>" class="btn btn-warning btn-sm text-white costumbtn">
                            <i class="bi bi-person-exclamation"></i>
                        </a>

                        <a href="<?= BASEURL?>/Admin/Account/deleteAccount/<?=$dataAccount['id_accounts']; ?>"
                           class="btn btn-danger btn-sm alert-confirm-hapus costumbtn">
                            <i class="bi bi-person-dash"></i>
                        </a>
                    <?php else: ?>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#tambahAccount<?=$dataAccount['id_karyawan']; ?>" class="btn btn-success btn-sm text-white costumbtn">
                            <i class="bi bi-person-add"></i>
                        </a>
                    <?php endif; ?>
                        </td>
                    </tr>
                    <!--Start Tambah Account-->
                    <div class="modal fade"
                         id="tambahAccount<?=$dataAccount['id_karyawan']; ?>"
                         tabindex="-1"
                         aria-labelledby="tambahAccountLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambahAccountLabel">Tambah Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= BASEURL?>/Admin/Account/createAccount" method="post">
                                        <div class="form-group">
                                            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                            <input id="nama_karyawan" name="nama_karyawan" value="<?= $dataAccount['nip_karyawan'] ;?> | <?= $dataAccount['nama_depan_karyawan'] ;?> <?= $dataAccount['nama_belakang_karyawan'] ;?>" type="text" class="form-control form-control-sm" readonly>
                                            <input id="id_karyawan" name="id_karyawan" value="<?= $dataAccount['id_karyawan'] ;?>" type="hidden" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="role_accounts" class="form-label">Role Users</label>
                                            <select id="role_accounts" name="role_accounts" class="form-select form-control form-select-sm" aria-label="Default select example">
                                                <option selected>--Pilih Role Akses--</option>
                                                <option value="Admin">Admin</option>
                                                <!--<option value="Tata Usaha (TU">Tata Usaha (TU</option>-->
                                                <option value="Sekretariat">Sekretariat</option>
                                                <option value="Karyawan">Karyawan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_accounts" class="form-label">Username</label>
                                            <input id="user_accounts" name="user_accounts" required type="text" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass_accounts" class="form-label">Password</label>
                                            <input id="pass_accounts" name="pass_accounts" required type="password" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="ulangi_pass_accounts" class="form-label">Ulangi Password</label>
                                            <input id="ulangi_pass_accounts" name="ulangi_pass_accounts" required type="password" class="form-control form-control-sm">
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
                    <!--END Tambah Account-->
                    <!--Start Tambah Account-->
                    <div class="modal fade"
                         id="ubahAccount<?=$dataAccount['id_karyawan']; ?>"
                         tabindex="-1"
                         aria-labelledby="ubahAccountLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ubahAccountLabel">Ubah Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= BASEURL?>/Admin/Account/updateAccount" method="post">
                                        <div class="form-group">
                                            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                            <input id="nama_karyawan" name="nama_karyawan" value="<?= $dataAccount['nip_karyawan'] ;?> | <?= $dataAccount['nama_depan_karyawan'] ;?> <?= $dataAccount['nama_belakang_karyawan'] ;?>" type="text" class="form-control form-control-sm" readonly>
                                            <input id="id_accounts" name="id_accounts" value="<?= $dataAccount['id_accounts'] ;?>" type="text" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="role_accounts" class="form-label">Role Users</label>
                                            <select id="role_accounts" name="role_accounts" class="form-select form-control form-select-sm" aria-label="Default select example">
                                                <option value="<?= $dataAccount['role_accounts'] ;?>"><?= $dataAccount['role_accounts'] ;?></option>
                                                <option value="Admin">Admin</option>
                                                <!--<option value="Tata Usaha (TU">Tata Usaha (TU</option>-->
                                                <option value="Sekretariat">Sekretariat</option>
                                                <option value="Karyawan">Karyawan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_accounts" class="form-label">Username</label>
                                            <input id="user_accounts" name="user_accounts" value="<?= $dataAccount['user_accounts'] ;?>" type="text" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass_accounts" class="form-label">Password</label>
                                            <input id="pass_accounts" name="pass_accounts"type="password" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group">
                                            <label for="ulangi_pass_accounts" class="form-label">Ulangi Password</label>
                                            <input id="ulangi_pass_accounts" name="ulangi_pass_accounts" type="password" class="form-control form-control-sm">
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
                    <!--END Tambah Account-->
                    <?php $No++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
