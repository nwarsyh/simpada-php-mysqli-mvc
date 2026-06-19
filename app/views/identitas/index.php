<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulIdentitas'] ;?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-8">
                            <ol class="list-group bg-danger">
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
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="card-identitas">
                                <div class="img-wrapper">
                                    <img src="<?= BASEURL;?>/public/media/profilaplikasi/<?= $dataSimpanPinjam['dataIdentitas']['logo_perusahaan']; ?>">
                                    <h6 class="nama-usewr"><?= $dataSimpanPinjam['dataIdentitas']['nama_perusahaan']; ?></h6>
                                    <ul>
                                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                                        <li><a href="#"><i class="bi bi-tiktok"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                                        <li><a href="#"><i class="bi bi-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#ubahIdentitas<?= $dataSimpanPinjam['dataIdentitas']['id_identitas']; ?>" class="btn btn-warning kostumbtn text-white">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ubahIdentitas<?= $dataSimpanPinjam['dataIdentitas']['id_identitas']; ?>"
     tabindex="-1" aria-labelledby="ubahIdentitasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahIdentitasLabel">Ubah Identitas</h1>
                <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Identitas/updateIdentitas" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_identitas" class="form-label">Nama Aplikasi</label>
                                <input id="nama_identitas" name="nama_identitas" value="<?= $dataSimpanPinjam['dataIdentitas']['nama_aplikasi'] ?? '-' ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                                <input id="id_identitas" name="id_identitas" value="<?= $dataSimpanPinjam['dataIdentitas']['id_identitas'] ?? '-' ;?>" type="hidden" class="form-control form-control-sm form-loginsatu">
                            </div>
                            <div class="form-group">
                                <label for="nama_company" class="form-label">Nama Perusahaan</label>
                                <input id="nama_company" name="nama_company" value="<?= $dataSimpanPinjam['dataIdentitas']['nama_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                            </div>
                            <div class="form-group">
                                <label for="alamat_company" class="form-label">Alamat Perusahaan</label>
                                <textarea id="alamat_company" name="alamat_company" class="form-control form-control-sm form-loginsatu" style="height: 50px"><?= $dataSimpanPinjam['dataIdentitas']['alamat_perusahaan'] ?? '-' ;?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="anwar-separator anwar-separator-dot"/>
                    <div class="row">
                        <div class="form-group col-md-3 mb-2">
                            <label for="prov_company" class="form-label">Provinsi</label>
                            <select class="form-control form-control-sm form-loginsatu" id="prov_company" name="prov_company">
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
                            <select class="form-control form-control-sm form-loginsatu" id="kab_kota_company" name="kab_kota_company">
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
                            <select class="form-control form-control-sm form-loginsatu" id="kec_company" name="kec_company">
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
                            <select class="form-control form-control-sm form-loginsatu" id="kel_company" name="kel_company">
                                <?php foreach ($dataSimpanPinjam['dataKelurahan'] as $Kelurahan) : ?>
                                    <option value="<?= $Kelurahan['kode']; ?>"
                                        <?= ($Kelurahan['kode'] == $dataSimpanPinjam['dataIdentitas']['nama_kelurahan']) ? 'selected' : '' ?>>
                                        <?= $Kelurahan['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr class="anwar-separator anwar-separator-dot"/>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kodepos_company" class="form-label">Kode Pos</label>
                                <input id="kodepos_company" name="kodepos_company" value="<?= $dataSimpanPinjam['dataIdentitas']['kodepos_identitas'] ?? '-' ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="notelp_company" class="form-label">No Telp Perusahaan</label>
                                <input id="notelp_company" name="notelp_company" value="<?= $dataSimpanPinjam['dataIdentitas']['notelp_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email_company" class="form-label">Email Perusahaan</label>
                                <input id="email_company" name="email_company" value="<?= $dataSimpanPinjam['dataIdentitas']['email_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fax_company" class="form-label">Fax Perusahaan</label>
                                <input id="fax_company" name="fax_company" value="<?= $dataSimpanPinjam['dataIdentitas']['fax_perusahaan'] ?? '-' ;?>" type="text" class="form-control form-control-sm form-loginsatu">
                            </div>
                        </div>
                    </div>
                    <hr class="anwar-separator anwar-separator-dot"/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="logo_company" class="form-label">Profil Perusahaan</label>
                                <input id="logo_company_lama" name="logo_company_lama" value="<?= $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'] ?? '-' ;?>" type="hidden" class="form-control form-control-sm form-loginsatu">
                                <input id="logo_company" name="logo_company" type="file" class="form-control form-control-sm">
                                <img src="<?= BASEURL;?>/public/media/profilaplikasi/<?= $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'] ?? ''; ?>" width="150" class="mt-2 rounded-circle">
                            </div>
                        </div>
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