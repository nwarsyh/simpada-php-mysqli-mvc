<main class="app-main">
    <!--<div class="app-content-header">p;</div>-->
    <div class="app-content mt-3">
        <div class="container-fluid">
            <form action="<?= BASEURL?>/Dokumen/updateDokumen" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h5><?= $dataSimpanPinjam['SubJudulUbahDokumen'] ;?></h5>
                            <a href="<?= BASEURL; ?>/Dokumen" type="button" class="btn btn-sm btn-primary shadow-sm">
                                <i class="bi bi-arrow-bar-left text-white-50"></i>Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--bagian kode, nomor, nama-->
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="kode_dokumen" class="form-label">Kode Dokumen</label>
                                <input id="kode_dokumen" name="kode_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['kode_dokumen']; ?>" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                                <input id="id_dokumen" name="id_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['id_dokumen']; ?>" type="hidden" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                                <input id="redirect_dokumen" name="redirect_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['id_dokumen']; ?>" type="hidden" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                <input id="nomor_dokumen" name="nomor_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['nomor_dokumen']; ?>" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                <input id="nama_dokumen" name="nama_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['nama_dokumen']; ?>" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <!--bagian kategori bagian pengelola, lokasi-->
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="kategori_dokumen" class="form-label">Kategori Dokumen</label>
                                <select id="kategori_dokumen" name="kategori_dokumen" class="form-select form-select-sm">
                                    <option selected>--Pilih Kategori Dokumen--</option>
                                    <?php foreach ($dataSimpanPinjam['dataKategori'] as $dataKategori):?>
                                        <option value="<?= $dataKategori['id_kategori']; ?>"
                                            <?= ($dataKategori['id_kategori'] == $dataSimpanPinjam['dataDokumenByID']['kategori_dokumen']) ? 'selected' : '' ?>>
                                            <?= $dataKategori['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="pengelola_dokumen" class="form-label">Unit Pengelola</label>
                                <select id="pengelola_dokumen" name="pengelola_dokumen" class="form-select form-select-sm">
                                    <option selected>--Pilih Unit Pengelola--</option>
                                    <?php foreach ($dataSimpanPinjam['dataDepartemen'] as $dataDepartemen):?>
                                        <option value="<?= $dataDepartemen['id_departemen']; ?>"
                                            <?= ($dataDepartemen['id_departemen'] == $dataSimpanPinjam['dataDokumenByID']['unitpengelola_dokumen']) ? 'selected' : '' ?>>
                                            <?= $dataDepartemen['nama_departemen']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="lokasi_dokumen" class="form-label">Lokasi Dokumen</label>
                                <select id="lokasi_dokumen" name="lokasi_dokumen" class="form-select form-select-sm">
                                    <option selected>--Pilih Lokasi Dokumen--</option>
                                    <?php foreach ($dataSimpanPinjam['dataLokasi'] as $dataLokasi):?>
                                        <option value="<?= $dataLokasi['id_lokasi']; ?>"
                                            <?= ($dataLokasi['id_lokasi'] == $dataSimpanPinjam['dataDokumenByID']['lokasi_dokumen']) ? 'selected' : '' ?>>
                                            Lemari No.<?= $dataLokasi['nomor_lemari']; ?> |
                                            Rak No.<?= $dataLokasi['nomor_rak']; ?> |
                                            Box No.<?= $dataLokasi['nomor_box']; ?> |
                                            Warna Map <?= $dataLokasi['warna_map']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!--bagian tanggal dokumen, tanggal retensi, status dokumen-->
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="tanggal_awal_dokumen" class="form-label">Tanggal Awal Dokumen</label>
                                <input id="tanggal_awal_dokumen" name="tanggal_awal_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['tgl_awal_dokumen']; ?>" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="tanggal_retensi_dokumen" class="form-label">Tanggal Retensi Dokumen</label>
                                <input id="tanggal_retensi_dokumen" name="tanggal_retensi_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['tgl_retensi_dokumen']; ?>" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="status_dokumen" class="form-label">Status Dokumen</label>
                                <select id="status_dokumen" name="status_dokumen" class="form-select form-select-sm">
                                    <option value="<?= $dataSimpanPinjam['dataDokumenByID']['status_dokumen']; ?>"><?= $dataSimpanPinjam['dataDokumenByID']['status_dokumen']; ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                    <option value="Permanen">Permanen</option>
                                    <option value="Dimusnahkan">Dimusnahkan</option>
                                </select>
                            </div>
                        </div>
                        <!--bagian wilayah-->
                        <div class="row">
                            <div class="form-group col-md-3 mb-2">
                                <label for="prov_dokumen" class="form-label">Provinsi</label>
                                <select class="form-select form-select-sm" id="prov_dokumen" name="prov_dokumen">
                                    <?php foreach ($dataSimpanPinjam['dataWilayah'] as $dataProvinsi) : ?>
                                        <option value="<?= $dataProvinsi['kode']; ?>"
                                            <?= ($dataProvinsi['kode'] == $dataSimpanPinjam['dataDokumenByID']['provinsi_dokumen']) ? 'selected' : '' ?>>
                                            <?= $dataProvinsi['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kabkota_dokumen" class="form-label">Kabupaten/Kota</label>
                                <select class="form-control form-control-sm" id="kabkota_dokumen" name="kabkota_dokumen">
                                    <?php foreach ($dataSimpanPinjam['dataKabupaten'] as $dataKabupaten) : ?>
                                        <option value="<?= $dataKabupaten['kode']; ?>"
                                            <?= ($dataKabupaten['kode'] == $dataSimpanPinjam['dataDokumenByID']['kabkota_dokumen']) ? 'selected' : '' ?>>
                                            <?= $dataKabupaten['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kec_dokumen" class="form-label">Kecamatan</label>
                                <select class="form-control form-control-sm" id="kec_dokumen" name="kec_dokumen">
                                    <?php foreach ($dataSimpanPinjam['dataKecamatan'] as $dataKecamatan) : ?>
                                        <option value="<?= $dataKecamatan['kode']; ?>"
                                            <?= ($dataKecamatan['kode'] == $dataSimpanPinjam['dataDokumenByID']['kec_dokumen']) ? 'selected' : '' ?>>
                                            <?= $dataKecamatan['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kel_dokumen" class="form-label">Kelurahan</label>
                                <select class="form-control form-control-sm" id="kel_dokumen" name="kel_dokumen">
                                    <?php foreach ($dataSimpanPinjam['dataKelurahan'] as $dataKelurahan) : ?>
                                        <option value="<?= $dataKelurahan['kode']; ?>"
                                            <?= ($dataKelurahan['kode'] == $dataSimpanPinjam['dataDokumenByID']['kel_dokumen']) ? 'selected' : '' ?>>
                                            <?= $dataKelurahan['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!--bagian jumlah dan file-->
                        <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="jumlah_dokumen" class="form-label">Jumlah Dokumen</label>
                                <input id="jumlah_dokumen" name="jumlah_dokumen" value="<?= $dataSimpanPinjam['dataDokumenByID']['jumlah_dokumen']; ?>" type="number" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="lampiran_dokumen" class="form-label">Lampiran Dokumen</label>
                                <input id="lampiran_dokumen_lama" name="lampiran_dokumen_lama" value="<?= $dataSimpanPinjam['dataDokumenByID']['file_dokumen']; ?>" type="hidden" class="form-control form-control-sm">
                                <input id="lampiran_dokumen" name="lampiran_dokumen" type="file" class="form-control form-control-sm">
                                <a href="<?= BASEURL;?>/public/media/dokumen/<?= $dataSimpanPinjam['dataDokumenByID']['file_dokumen']; ?>" class="text-decoration-none" target="_blank"><?= $dataSimpanPinjam['dataDokumenByID']['file_dokumen']; ?></a>
                            </div>
                        </div>
                        <!--bagian deskripsi-->
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <label for="deskripsi_dokumen" class="form-label">Deskripsi Dokumen</label>
                                <textarea id="deskripsi_dokumen" name="deskripsi_dokumen" class="form-control" placeholder="Deskripsi Jika Ada" style="height: 100px"><?= $dataSimpanPinjam['dataDokumenByID']['deksripsi_dokumen']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-sm-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-sm btn-danger costumbtn text-white">
                                <i class="bi bi-ban text-white-50"></i>
                                <span> Batal</span>
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary costumbtn">
                                <i class="bi bi-floppy text-white-50"></i>
                                <span> Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>