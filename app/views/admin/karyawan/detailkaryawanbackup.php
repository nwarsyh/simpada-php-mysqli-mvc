<main class="app-main">
    <!--<div class="app-content-header">&nbsp;</div>-->
    <div class="app-content mt-3">
        <div class="container-fluid">
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
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h5><?= $dataSimpanPinjam['SubJudulDetailKaryawan'] ;?></h5>
                        <a href="<?= BASEURL; ?>/Admin/Karyawan" type="button" class="btn btn-sm btn-primary shadow-sm">
                            <i class="bi bi-arrow-bar-left text-white-50"></i>Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-profil">
                                <div class="profile-header">
                                    <img src="<?= BASEURL;?>/public/media/profil/<?= $dataSimpanPinjam['dataKaryawanByID']['foto_profil_karyawan']; ?>">
                                </div>
<!--                                <div class="nama-karyawan">-->
<!--                                    <span>-->
<!--                                        --><?//= $dataSimpanPinjam['dataKaryawanByID']['nama_depan_karyawan']; ?>
<!--                                        --><?//= $dataSimpanPinjam['dataKaryawanByID']['nama_belakang_karyawan']; ?>
<!--                                    </span>-->
<!--                                    <button type="button"-->
<!--                                            class="btn--profil btn btn-sm costumbtn text-white --><?//= $WarnaButton; ?><!--">-->
<!--                                        <i class="--><?//= $iconStatus?><!--"></i>-->
<!--                                        --><?//= $Status ;?>
<!--                                    </button>-->
<!--                                </div>-->
                            </div>

                        </div>
                        <div class="col-md-7">

                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">NIP</div>
                                        <?= $dataSimpanPinjam['dataKaryawanByID']['nip_karyawan']; ?>
                                    </div>
                                    <button type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>">
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
            </div>
        </div>
    </div>
</main>