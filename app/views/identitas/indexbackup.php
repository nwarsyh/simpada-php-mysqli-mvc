<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulIdentitas'] ;?></h5>
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
                <div class="col-12 col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Aplikasi</div>
                                        <?= $dataSimpanPinjam['dataIdentitas']['nama_aplikasi'] ?? '-' ;?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Perusahaan</div>
                                        <?= $dataSimpanPinjam['dataIdentitas']['nama_perusahaan'] ?? '-' ;?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Alamat Perusahaan</div>
                                        <?= $dataSimpanPinjam['dataIdentitas']['alamat_perusahaan'] ?? '-' ;?>,
                                        <?= $dataSimpanPinjam['dataIdentitas']['nama_kelurahan'] ?? '-' ;?>,
                                        <?= $dataSimpanPinjam['dataIdentitas']['nama_kecamatan'] ?? '-' ;?>,
                                        <?= $dataSimpanPinjam['dataIdentitas']['nama_kabupaten'] ?? '-' ;?>,
                                        <?= $dataSimpanPinjam['dataIdentitas']['nama_provinsi'] ?? '-' ;?>,
                                        <?= $dataSimpanPinjam['dataIdentitas']['kodepos_identitas'] ?? '-' ;?>

                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nomor Telepon</div>
                                        <?= $dataSimpanPinjam['dataIdentitas']['notelp_perusahaan'] ?? '-' ;?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Email Perusahaan</div>
                                        <?= $dataSimpanPinjam['dataIdentitas']['email_perusahaan'] ?? '-' ;?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Fax Perusahaan</div>
                                        <?= $dataSimpanPinjam['dataIdentitas']['fax_perusahaan'] ?? '-' ;?>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="card-profil">
                        <div class="profile-header">
                            <img src="<?= BASEURL;?>/public/media/profilaplikasi/<?= $dataSimpanPinjam['dataIdentitas']['logo_perusahaan']; ?>">
                        </div>
                        <div class="card-footer text-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#ubahIdentitas<?= $dataSimpanPinjam['dataIdentitas']['id_identitas']; ?>" class="btn btn-warning btn-sm custombtn text-white">
                                <i class="bi bi-pen"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Tambah Data Jenis Start -->
<div class="modal fade" id="ubahIdentitas<?= $dataSimpanPinjam['dataIdentitas']['id_identitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahIdentitasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="ubahIdentitasLabel">Ubah Identitas</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Identitas/updateIdentitas" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_identitas" class="form-label">Nama Aplikasi</label>
                                <input id="nama_identitas" name="nama_identitas" value="<?= $dataSimpanPinjam['dataIdentitas']['nama_aplikasi'] ?? '-' ;?>" type="text" class="form-control form-control-sm">
                                <input id="id_identitas" name="id_identitas" value="<?= $dataSimpanPinjam['dataIdentitas']['id_identitas'] ?? '-' ;?>" type="hidden" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="nama_company" class="form-label">Nama Perusahaan</label>
                                <input id="nama_company" name="nama_company" value="<?= $dataSimpanPinjam['dataIdentitas']['nama_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="alamat_company" class="form-label">Alamat Perusahaan</label>
                                <textarea id="alamat_company" name="alamat_company" class="form-control" style="height: 50px"><?= $dataSimpanPinjam['dataIdentitas']['alamat_perusahaan'] ?? '-' ;?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-3 mb-2">
                            <label for="prov_company" class="form-label">Provinsi</label>
                            <select class="form-control form-control-sm" id="prov_company" name="prov_company">
                                <?php foreach ($dataSimpanPinjam['dataWilayah'] as $Provinsi) : ?>
                                    <option value="<?= $Provinsi['kode']; ?>"
                                        <?= ($Provinsi['kode'] == $dataSimpanPinjam['dataIdentitas']['provinsi_identitas']) ? 'selected' : '' ?>>
                                        <?= $Provinsi['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <label for="kab_kota_company" class="form-label">Kabupaten</label>
                            <select class="form-control form-control-sm" id="kab_kota_company" name="kab_kota_company">
                                <?php foreach ($dataSimpanPinjam['dataKabupaten'] as $Kabupaten) : ?>
                                    <option value="<?= $Kabupaten['kode']; ?>"
                                        <?= ($Kabupaten['kode'] == $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']) ? 'selected' : '' ?>>
                                        <?= $Kabupaten['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <label for="kec_company" class="form-label">Kabupaten</label>
                            <select class="form-control form-control-sm" id="kec_company" name="kec_company">
                                <?php foreach ($dataSimpanPinjam['dataKecamatan'] as $Kecamatan) : ?>
                                    <option value="<?= $Kecamatan['kode']; ?>"
                                        <?= ($Kecamatan['kode'] == $dataSimpanPinjam['dataIdentitas']['nama_kecamatan']) ? 'selected' : '' ?>>
                                        <?= $Kecamatan['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <label for="kel_company" class="form-label">Kelurahan</label>
                            <select class="form-control form-control-sm" id="kel_company" name="kel_company">
                                <?php foreach ($dataSimpanPinjam['dataKelurahan'] as $Kelurahan) : ?>
                                    <option value="<?= $Kelurahan['kode']; ?>"
                                        <?= ($Kelurahan['kode'] == $dataSimpanPinjam['dataIdentitas']['nama_kelurahan']) ? 'selected' : '' ?>>
                                        <?= $Kelurahan['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kodepos_company" class="form-label">Kode Pos</label>
                                <input id="kodepos_company" name="kodepos_company" value="<?= $dataSimpanPinjam['dataIdentitas']['kodepos_identitas'] ?? '-' ;?>" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="notelp_company" class="form-label">No Telp Perusahaan</label>
                                <input id="notelp_company" name="notelp_company" value="<?= $dataSimpanPinjam['dataIdentitas']['notelp_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email_company" class="form-label">Email Perusahaan</label>
                                <input id="email_company" name="email_company" value="<?= $dataSimpanPinjam['dataIdentitas']['email_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fax_company" class="form-label">Fax Perusahaan</label>
                                <input id="fax_company" name="fax_company" value="<?= $dataSimpanPinjam['dataIdentitas']['fax_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="logo_company" class="form-label">Profil Perusahaan</label>
                                <input id="logo_company_lama" name="logo_company_lama" value="<?= $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'] ?? '-' ;?>" type="hidden" class="form-control form-control-sm">
                                <input id="logo_company" name="logo_company" type="file" class="form-control form-control-sm">
                                <img src="<?= BASEURL;?>/public/img/profilidentitas/<?= $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'] ?? ''; ?>" width="150" class="mt-2 rounded-circle">
                            </div>
                        </div>
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