<main class="app-main">
    <!--<div class="app-content-header">p;</div>-->
    <div class="app-content mt-3">
        <div class="container-fluid">
            <form action="<?= BASEURL?>/Dokumen/createDokumen" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h5><?= $dataSimpanPinjam['SubJudulTambahDokumen'] ;?></h5>
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
                                <input id="kode_dokumen" name="kode_dokumen" placeholder="Kode Dokumen" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                <input id="nomor_dokumen" name="nomor_dokumen" placeholder="Nomor Dokumen" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                <input id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <!--bagian kategori bagian pengelola, lokasi-->
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <label for="kategori_dokumen" class="form-label">Kategori Dokumen</label>
                                <select id="kategori_dokumen" name="kategori_dokumen" class="form-select form-select-sm">
                                    <option selected>--Pilih Kategori Dokumen--</option>
                                    <?php foreach ($dataSimpanPinjam['dataKategori'] as $dataKategori):?>
                                        <option value="<?= $dataKategori['id_kategori']; ?>"><?= $dataKategori['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="pengelola_dokumen" class="form-label">Unit Pengelola</label>
                                <select id="pengelola_dokumen" name="pengelola_dokumen" class="form-select form-select-sm">
                                    <option selected>--Pilih Unit Pengelola--</option>
                                    <?php foreach ($dataSimpanPinjam['dataDepartemen'] as $dataDepartemen):?>
                                        <option value="<?= $dataDepartemen['id_departemen']; ?>"><?= $dataDepartemen['nama_departemen']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="lokasi_dokumen" class="form-label">Lokasi Dokumen</label>
                                <select id="lokasi_dokumen" name="lokasi_dokumen" class="form-select form-select-sm">
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
                                <label for="tanggal_retensi_dokumen" class="form-label">Tanggal Retensi Dokumen</label>
                                <input id="tanggal_retensi_dokumen" name="tanggal_retensi_dokumen" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="tanggal_awal_dokumen" class="form-label">Tanggal Awal Dokumen</label>
                                <input id="tanggal_awal_dokumen" name="tanggal_awal_dokumen" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <label for="status_dokumen" class="form-label">Status Dokumen</label>
                                <select id="status_dokumen" name="status_dokumen" class="form-select form-select-sm">
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
                                <select class="form-select form-select-sm" id="prov_dokumen" name="prov_dokumen">
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach($dataSimpanPinjam['dataWilayah'] as $dataWiayah): ?>
                                        <option value="<?= $dataWiayah['kode']; ?>"><?= $dataWiayah['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kabkota_dokumen" class="form-label">Kabupaten/Kota</label>
                                <select class="form-control form-control-sm" id="kabkota_dokumen" name="kabkota_dokumen"></select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kec_dokumen" class="form-label">Kecamatan</label>
                                <select class="form-control form-control-sm" id="kec_dokumen" name="kec_dokumen"></select>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="kel_dokumen" class="form-label">Kelurahan</label>
                                <select class="form-control form-control-sm" id="kel_dokumen" name="kel_dokumen"></select>
                            </div>
                        </div>
                        <!--bagian jumlah dan file-->
                        <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="jumlah_dokumen" class="form-label">Jumlah Dokumen</label>
                                <input id="jumlah_dokumen" name="jumlah_dokumen" placeholder="NIP Karyawan" type="number" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="lampiran_dokumen" class="form-label">Lampiran Dokumen</label>
                                <input id="lampiran_dokumen" name="lampiran_dokumen" type="file" class="form-control form-control-sm">
                            </div>
                        </div>
                        <!--bagian deskripsi-->
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <label for="deskripsi_dokumen" class="form-label">Deskripsi Dokumen</label>
                                <textarea id="deskripsi_dokumen" name="deskripsi_dokumen" class="form-control" placeholder="Deskripsi Jika Ada" style="height: 100px"></textarea>
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