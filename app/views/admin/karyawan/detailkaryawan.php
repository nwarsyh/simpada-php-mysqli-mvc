<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulDetailKaryawan'] ;?></h6>

                    <!-- Tombol Action -->
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/Admin/Karyawan" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-arrow-bar-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $Status = $dataSimpanPinjam['dataKaryawanByID']['status_karyawan'];
                    if($Status == "Aktif"){
                        $iconStatus = "bi bi-check"; $WarnaButton = 'btn-success';
                    }else if($Status == "Tidak Aktif"){
                        $iconStatus = "bi bi-x"; $WarnaButton = 'btn-danger';
                    }else if($Status == "Ditangguhkan") {
                        $iconStatus = "bi bi-sticky"; $WarnaButton = 'btn-warning';
                    }else{
                        $iconStatus = "bi bi-layers"; $WarnaButton = 'btn-info';
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="img-wrapper">
                                <img src="<?= BASEURL;?>/public/media/profil/<?= $dataSimpanPinjam['dataKaryawanByID']['foto_profil_karyawan']; ?>">
                                <h6 class="nama-usewr"><?= $dataSimpanPinjam['dataKaryawanByID']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['dataKaryawanByID']['nama_belakang_karyawan']; ?></h6>
                                <ul>
                                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                    <li><a href="#"><i class="bi bi-tiktok"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                                    <li><a href="#"><i class="bi bi-whatsapp"></i></a></li>
                                </ul>
                            </div>



<!--                            <div class="card-profil">-->
<!--                                <div class="profile-header">-->
<!--                                    <img src="--><?//= BASEURL;?><!--/public/media/profil/--><?//= $dataSimpanPinjam['dataKaryawanByID']['foto_profil_karyawan']; ?><!--">-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <div class="col-md-7">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">NIP</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['nip_karyawan']; ?>
                                    </div>
                                    <button type="button" class="btn kostumbtn text-white <?= $WarnaButton; ?>">
                                        <i class="<?= $iconStatus?>"></i> <?= $Status ;?>
                                    </button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Lengkap</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['dataKaryawanByID']['nama_belakang_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Departemen</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['nama_departemen']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Jenis Kelamin</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['jenis_kelamin_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nomor HP</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['nomor_hp_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Email</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['email_karyawan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Masuk</div>
                                        <?= FormatDate($dataSimpanPinjam['dataKaryawanByID']['tanggal_masuk_karyawan']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Input</div>
                                        <?= FormatDateTime($dataSimpanPinjam['dataKaryawanByID']['create_at_karyawan']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Update</div>
                                        <?= FormatDateTime($dataSimpanPinjam['dataKaryawanByID']['update_at_karyawan']); ?>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                    <div class="card-footer d-flex justify-content-end align-items-center">
                        <div class="d-flex gap-2">
                            <a href="<?= BASEURL; ?>/Admin/Karyawan" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                                <i class="bi bi-arrow-bar-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!--END Bagian Konten CRUD-->
</div>
