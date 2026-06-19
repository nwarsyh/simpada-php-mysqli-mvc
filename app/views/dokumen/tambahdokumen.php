<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulTambahDokumen'] ;?></h6>
                    <!-- Tombol Action -->
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/Dokumen" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-arrow-bar-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="<?= BASEURL?>/Dokumen/createDokumen" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <!--bagian kode, nomor, nama-->
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="kode_dokumen" class="form-label">Kode Dokumen</label>
                                <input id="kode_dokumen" name="kode_dokumen" placeholder="Kode Dokumen" type="text" class="form-control form-control-sm form-loginsatu" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                <input id="nomor_dokumen" name="nomor_dokumen" placeholder="Nomor Dokumen" type="text" class="form-control form-control-sm form-loginsatu" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                <input id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" type="text" class="form-control form-control-sm form-loginsatu" oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <!--bagian kategori bagian pengelola, lokasi-->
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="kategori_dokumen" class="form-label">Kategori Dokumen</label>
                                <select id="kategori_dokumen" name="kategori_dokumen" class="form-select form-select-sm form-loginsatu">
                                    <option selected>--Pilih Kategori Dokumen--</option>
                                    <?php foreach ($dataSimpanPinjam['dataKategori'] as $dataKategori):?>
                                        <option value="<?= $dataKategori['id_kategori']; ?>"><?= $dataKategori['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="pengelola_dokumen" class="form-label">Unit Pengelola</label>
                                <select id="pengelola_dokumen" name="pengelola_dokumen" class="form-select form-select-sm form-loginsatu">
                                    <option selected>--Pilih Unit Pengelola--</option>
                                    <?php foreach ($dataSimpanPinjam['dataDepartemen'] as $dataDepartemen):?>
                                        <option value="<?= $dataDepartemen['id_departemen']; ?>"><?= $dataDepartemen['nama_departemen']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="lokasi_dokumen" class="form-label">Lokasi Dokumen</label>
                                <select id="lokasi_dokumen" name="lokasi_dokumen" class="form-select form-select-sm form-loginsatu">
                                    <option selected>--Pilih Lokasi Dokumen--</option>
                                    <?php foreach ($dataSimpanPinjam['dataLokasi'] as $dataLokasi):?>
                                        <option value="<?= $dataLokasi['id_lokasi']; ?>">
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
                                <input id="tanggal_awal_dokumen" name="tanggal_awal_dokumen" type="date" class="form-control form-control-sm form-loginsatu">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="tanggal_retensi_dokumen" class="form-label">Tanggal Retensi Dokumen</label>
                                <input id="tanggal_retensi_dokumen" name="tanggal_retensi_dokumen" type="date" class="form-control form-control-sm form-loginsatu">
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <label for="status_dokumen" class="form-label">Status Dokumen</label>
                                <select id="status_dokumen" name="status_dokumen" class="form-select form-select-sm form-loginsatu">
                                    <option selected>--Pilih Status Dokumen--</option>
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
                                <select class="form-select form-select-sm form-loginsatu" id="prov_dokumen" name="prov_dokumen">
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach($dataSimpanPinjam['dataWilayah'] as $dataWiayah): ?>
                                        <option value="<?= $dataWiayah['kode']; ?>"><?= $dataWiayah['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kabkota_dokumen" class="form-label">Kabupaten/Kota</label>
                                <select class="form-control form-control-sm form-loginsatu" id="kabkota_dokumen" name="kabkota_dokumen"></select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kec_dokumen" class="form-label">Kecamatan</label>
                                <select class="form-control form-control-sm form-loginsatu" id="kec_dokumen" name="kec_dokumen"></select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kel_dokumen" class="form-label">Kelurahan</label>
                                <select class="form-control form-control-sm form-loginsatu" id="kel_dokumen" name="kel_dokumen"></select>
                            </div>
                        </div>
                        <!--bagian jumlah dan file-->
                        <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="jumlah_dokumen" class="form-label">Jumlah Dokumen</label>
                                <input id="jumlah_dokumen" name="jumlah_dokumen" placeholder="NIP Karyawan" type="number" class="form-control form-control-sm form-loginsatu">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="lampiran_dokumen" class="form-label">Lampiran Dokumen</label>
                                <input id="lampiran_dokumen" name="lampiran_dokumen" type="file" class="form-control form-control-sm form-loginsatu">
                            </div>
                        </div>
                        <!--bagian deskripsi-->
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <label for="deskripsi_dokumen" class="form-label">Deskripsi Dokumen</label>
                                <textarea id="deskripsi_dokumen" name="deskripsi_dokumen" class="form-control form-loginsatu" placeholder="Deskripsi Jika Ada" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-items-center">
                        <div class="d-flex gap-2">
                            <a href="<?= BASEURL; ?>/Dokumen" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                                <i class="bi bi-arrow-bar-left me-1"></i> Kembali
                            </a>
                            <button type="reset" class="btn kostumbtn btn-danger shadow-sm d-flex align-items-center">
                                <i class="bi bi-ban me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn kostumbtn btn-success shadow-sm d-flex align-items-center">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END Bagian Konten CRUD-->
</div>
