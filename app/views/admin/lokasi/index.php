<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulLokasi'] ;?></h6>
                </div>
                <form action="<?= BASEURL?>/Admin/Lokasi/createLokasi" method="post" id="formInputLokasi">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <input id="nomor_lemari" name="nomor_lemari" type="number" class="form-control form-control-sm form-loginsatu" placeholder="Nomor Lemari" >
                                    <input id="id_lokasi" name="id_lokasi" type="hidden" class="form-control form-control-sm form-loginsatu">
                                </div>
                                <div class="form-group">
                                    <input id="nomor_rak" name="nomor_rak" type="number" class="form-control form-control-sm form-loginsatu" placeholder="Nomor Lemari">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group  mb-3">
                                    <input id="nomor_box" name="nomor_box" type="number" class="form-control form-control-sm form-loginsatu" placeholder="Nomor Box">
                                </div>
                                <div class="form-group">
                                    <select id="warna_map" name="warna_map" class="form-select form-loginsatu form-select-sm">
                                        <option selected>--Pilih Warna Map--</option>
                                        <option value="Merah">Merah</option>
                                        <option value="Kuning">Kuning</option>
                                        <option value="Hijau">Hijau</option>
                                        <option value="Biru">Biru</option>
                                        <option value="Hitam">Hitam</option>
                                        <option value="Putih">Putih</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-sm-flex justify-content-end gap-2">
                                    <button type="reset" class="btn kostumbtn btn-danger shadow-sm d-flex align-items-center" id="btnResetLokasi">
                                        <i class="bi bi-ban me-1"></i>
                                        <span>Batal</span>
                                    </button>
                                    <button type="submit" class="btn kostumbtn btn-success shadow-sm d-flex align-items-center" id="btnSubmitLokasi">
                                        <i class="bi bi-floppy me-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr class="anwar-separator anwar-separator-dot"/>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">Nomor Lemari</th>
                            <th class="text-center">Nomor Rak</th>
                            <th class="text-center">Nomor Box</th>
                            <th class="text-center">Warna Map</th>
                            <th class="text-center">Create At</th>
                            <th class="text-center">Update At</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataLokasi'] as $dataLokasi):?>
                            <tr class="text-center">
                                <td><?= $No; ?></td>
                                <td><?= $dataLokasi['nomor_lemari'] ;?></td>
                                <td><?= $dataLokasi['nomor_rak'] ;?></td>
                                <td><?= $dataLokasi['nomor_box'] ;?></td>
                                <td><?= $dataLokasi['warna_map'] ;?></td>
                                <td><?= FormatDateTime($dataLokasi['create_at_lokasi']) ;?></td>
                                <td><?= FormatDateTime($dataLokasi['update_at_lokasi']) ;?></td>
                                <td>
                                    <button class="btn btn-warning text-white kostumbtn btn-editLokasi"
                                            data-idlokasi="<?=$dataLokasi['id_lokasi']; ?>"
                                            data-nomorlemari="<?=$dataLokasi['nomor_lemari']; ?>"
                                            data-nomorrak="<?=$dataLokasi['nomor_rak']; ?>"
                                            data-nomorbox="<?=$dataLokasi['nomor_box']; ?>"
                                            data-warnamap="<?=$dataLokasi['warna_map']; ?>">
                                        <i class="bi bi-pen"></i>
                                    </button>
                                    <a href="<?= BASEURL?>/Admin/Lokasi/deleteLokasi/<?=$dataLokasi['id_lokasi']; ?>"
                                       class="btn btn-danger alert-confirm-hapus kostumbtn">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $No++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--END Bagian Konten CRUD-->
</div>
