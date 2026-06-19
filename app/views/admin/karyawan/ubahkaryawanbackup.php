<main class="app-main">
    <!--<div class="app-content-header">&nbsp;</div>-->
    <div class="app-content mt-3">
        <div class="container-fluid">
            <form action="<?= BASEURL?>/Admin/Karyawan/updateKaryawan" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h5><?= $dataSimpanPinjam['SubJudulUbahKaryawan'] ;?></h5>
                            <a href="<?= BASEURL; ?>/Admin/Karyawan" type="button" class="btn btn-sm btn-primary shadow-sm">
                                <i class="bi bi-arrow-bar-left text-white-50"></i>Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="nip_karyawan" class="form-label">NIP Karyawan</label>
                                    <input id="nip_karyawan" name="nip_karyawan" value="<?= $dataSimpanPinjam['dataKaryawanByID']['nip_karyawan']; ?>" type="text" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                                    <input id="id_karyawan" name="id_karyawan" value="<?= $dataSimpanPinjam['dataKaryawanByID']['id_karyawan']; ?>" type="hidden" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                                    <input id="redirect_id" name="redirect_id" value="<?= $dataSimpanPinjam['dataKaryawanByID']['id_karyawan']; ?>" type="hidden" class="form-control form-control-sm" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nama_depan" class="form-label">Nama Depan</label>
                                    <input id="nama_depan" name="nama_depan" value="<?= $dataSimpanPinjam['dataKaryawanByID']['nama_depan_karyawan']; ?>" type="text" class="form-control form-control-sm">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                    <input id="nama_belakang" name="nama_belakang" value="<?= $dataSimpanPinjam['dataKaryawanByID']['nama_belakang_karyawan']; ?>" type="text" class="form-control form-control-sm">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jk_karyawan" class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk_karyawan" id="lakilaki" value="Laki-Laki"
                                            <?= ($dataSimpanPinjam['dataKaryawanByID']['jenis_kelamin_karyawan'] === 'Laki-Laki') ? 'checked' : '';?>>
                                        <label class="form-check-label" for="lakilaki">Laki - Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk_karyawan" id="perempuan" value="Perempuan"
                                            <?= ($dataSimpanPinjam['dataKaryawanByID']['jenis_kelamin_karyawan'] === 'Perempuan') ? 'checked' : '';?>>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                                    <input id="nomor_hp" name="nomor_hp" type="text" value="<?= $dataSimpanPinjam['dataKaryawanByID']['nomor_hp_karyawan']; ?>" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="email_karyawan" class="form-label">Email Karyawan</label>
                                    <input id="email_karyawan" name="email_karyawan" type="email" value="<?= $dataSimpanPinjam['dataKaryawanByID']['email_karyawan']; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="id_departemen" class="form-label">Unit Departemen</label>
                                    <select id="id_departemen" name="id_departemen" class="form-select form-control form-select-sm">
                                        <?php foreach ($dataSimpanPinjam['dataDepartemen'] as $dataDepartemen):?>
                                            <option value="<?= $dataDepartemen['id_departemen']; ?>"
                                                <?= ($dataDepartemen['id_departemen'] == $dataSimpanPinjam['dataKaryawanByID']['id_departemen']) ? 'selected' : '' ?>>
                                                <?= $dataDepartemen['nama_departemen']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="status_karyawan" class="form-label">Status Karyawan</label>
                                    <select id="status_karyawan" name="status_karyawan" class="form-select form-control form-select-sm">
                                        <option value="<?= $dataSimpanPinjam['dataKaryawanByID']['status_karyawan']; ?>"><?= $dataSimpanPinjam['dataKaryawanByID']['status_karyawan']; ?></option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                        <option value="Ditangguhkan">Ditangguhkan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                    <input id="tgl_masuk" name="tgl_masuk" type="date" value="<?= $dataSimpanPinjam['dataKaryawanByID']['tanggal_masuk_karyawan']; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="profil_karyawan" class="form-label">Profil Karyawan</label>
                                    <input id="profil_karyawan_lama" name="profil_karyawan_lama" value="<?= $dataSimpanPinjam['dataKaryawanByID']['foto_profil_karyawan']; ?>" type="hidden" class="form-control form-control-sm">
                                    <input id="profil_karyawan" name="profil_karyawan" type="file" class="form-control form-control-sm">
                                    <img src="<?= BASEURL;?>/public/media/profil/<?= $dataSimpanPinjam['dataKaryawanByID']['foto_profil_karyawan']; ?>" width="150" class="mt-2 rounded-circle">
                                </div>
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