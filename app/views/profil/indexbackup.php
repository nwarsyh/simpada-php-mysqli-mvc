<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulProfil'] ;?></h5>
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
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
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
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Lengkap</div>
                                        <?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']; ?>
                                    </div>
                                    <span class="me-1 badge text-bg-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#ubahAccount<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>">&nbsp;&nbsp;&nbsp;&nbsp;Update Profil&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span class="badge text-bg-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#ubahPassword<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>">Update Password</span>
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
</main>
<!--Tambah Data Jenis Start -->
<div class="modal fade"
     id="ubahAccount<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>"
     tabindex="-1"
     aria-labelledby="ubahAccountLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahAccountLabel">Ubah Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Profil/updateProfil" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="namadepan" class="form-label">Nama Depan</label>
                        <input name="namadepan" id="namadepan" type="text" value="<?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']?>" class="form-control form-control-sm">
                        <input name="id_accounts" id="id_accounts" type="hidden" value="<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>" class="form-control form-control-sm">
                    </div>
                    <div class="form-group mb-3">
                        <label for="namabelakang" class="form-label">Nama Belakang</label>
                        <input name="namabelakang" id="namabelakang" type="text" value="<?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']?>" class="form-control form-control-sm">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline form-control-sm">
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
                        <input name="nohp" id="nohp" type="text" value="<?= $dataSimpanPinjam['userAktifNow']['nomor_hp_karyawan']?>" class="form-control form-control-sm">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" id="email" type="email" value="<?= $dataSimpanPinjam['userAktifNow']['email_karyawan']?>" class="form-control form-control-sm">
                    </div>
                    <div class="form-group mb-3">
                        <label for="profil" class="form-label">Foto Profil</label>
                        <input name="profil_lama" id="profil_lama" type="hidden" value="<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']?>" class="form-control form-control-sm">
                        <input name="profil" id="profil" type="file" class="form-control form-control-sm">
                        <img src="<?= BASEURL;?>/public/media/profil/<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']?>" width="150" class="mt-2 rounded-circle">
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
<!--Tambah Data Jenis End -->
<!--START Ubah Password -->
<div class="modal fade"
     id="ubahPassword<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>"
     tabindex="-1"
     aria-labelledby="ubahAccountLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahAccountLabel">Ubah Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Profil/updateProfil" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" id="username" value="<?= $dataSimpanPinjam['userAktifNow']['user_accounts']?>" type="text" class="form-control form-control-sm form-loginsatu">
                        <input name="id_accounts" id="id_accounts" value="<?= $dataSimpanPinjam['userAktifNow']['id_accounts']?>" type="hidden" class="form-control form-control-sm form-loginsatu">
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
                <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary costumbtn">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--START Ubah Password -->