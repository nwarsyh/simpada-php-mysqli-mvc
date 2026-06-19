<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulProfil'] ;?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="img-wrapper">
                                <img src="<?= BASEURL;?>/public/media/profil/<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']; ?>">
                                <h6 class="nama-usewr"><?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']; ?></h6>
                                <ul>
                                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="#"><i class="bi bi-tiktok"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                                    <li><a href="#"><i class="bi bi-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-md-8">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Lengkap</div>
                                        <?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']; ?>
                                    </div>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#ubahAccount<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>">
                                                <i class="bi bi-eye text-success"></i> Ubah Profil
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#ubahPassword<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>">
                                                <i class="bi bi-pen text-primary"></i> Ubah Password
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Departemen</div>
                                        (<?= $dataSimpanPinjam['userAktifNow']['kode_departemen']; ?>) <?= $dataSimpanPinjam['userAktifNow']['nama_departemen']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Jenis Kelamin</div>
                                        <?= $dataSimpanPinjam['userAktifNow']['jenis_kelamin_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nomor HP</div>
                                        <?= $dataSimpanPinjam['userAktifNow']['nomor_hp_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Email</div>
                                        <?= $dataSimpanPinjam['userAktifNow']['email_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Status</div>
                                        <?= $dataSimpanPinjam['userAktifNow']['status_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Masuk</div>
                                        <?= FormatDate($dataSimpanPinjam['userAktifNow']['tanggal_masuk_karyawan']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Registrasi</div>
                                        <?= FormatDateTime($dataSimpanPinjam['userAktifNow']['create_at_karyawan']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Update</div>
                                        <?= FormatDateTime($dataSimpanPinjam['userAktifNow']['update_at_karyawan']); ?>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Bagian Konten CRUD-->
</div>
<!--START EDIT Profil-->
<div class="modal fade" id="ubahAccount<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>"
     tabindex="-1" aria-labelledby="ubahAccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahAccountLabel">Ubah Profil</h1>
                <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Profil/updateProfil" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="namadepan" class="form-label">Nama Depan</label>
                        <input name="namadepan" id="namadepan" type="text" value="<?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']?>" class="form-control form-control-sm form-loginsatu">
                        <input name="id_accounts" id="id_accounts" type="hidden" value="<?= $dataSimpanPinjam['userAktifNow']['id_karyawan']?>" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="namabelakang" class="form-label">Nama Belakang</label>
                        <input name="namabelakang" id="namabelakang" type="text" value="<?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']?>" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline form-control-sm form-loginsatu">
                            <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="Laki-Laki"
                                <?= ($dataSimpanPinjam['userAktifNow']['jenis_kelamin_karyawan'] === 'Laki-Laki') ? 'checked' : '';?>>
                            <label class="form-check-label" for="lakilaki">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan"
                                <?= ($dataSimpanPinjam['userAktifNow']['jenis_kelamin_karyawan'] === 'Perempuan') ? 'checked' : '';?>>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nohp" class="form-label">Nomor Handphone</label>
                        <input name="nohp" id="nohp" type="text" value="<?= $dataSimpanPinjam['userAktifNow']['nomor_hp_karyawan']?>" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" id="email" type="email" value="<?= $dataSimpanPinjam['userAktifNow']['email_karyawan']?>" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="profil" class="form-label">Foto Profil</label>
                        <input name="profil_lama" id="profil_lama" type="hidden" value="<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']?>" class="form-control form-control-sm">
                        <input name="profil" id="profil" type="file" class="form-control form-control-sm form-loginsatu">
                        <img src="<?= BASEURL;?>/public/media/profil/<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']?>" width="150" class="mt-2 rounded-circle">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Batal</button>
                    <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                    <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END EDIT Profil-->
<!--START EDIT Profil-->
<div class="modal fade" id="ubahPassword<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>"
     tabindex="-1" aria-labelledby="ubahAccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahAccountLabel">Ubah Profil</h1>
                <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Profil/updatePassword" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" id="username" value="<?= $dataSimpanPinjam['userAktifNow']['user_accounts']?>" type="text" class="form-control form-control-sm form-loginsatu">
                        <input name="id_accounts" id="id_accounts" value="<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>" type="text" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input name="password_lama" id="password_lama" type="password" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input name="password" id="password" type="password" class="form-control form-control-sm form-loginsatu">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirm" class="form-label">Konfirmasi Password Baru</label>
                        <input name="password_confirm" id="password_confirm" type="password" class="form-control form-control-sm form-loginsatu">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Batal</button>
                <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END EDIT Profil-->

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