<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $dataTransaksi['nama_depan_karyawan'] ;?> <?= $dataTransaksi['nama_belakang_karyawan'] ;?></h5>
        </div>
        <p class="mb-1"><?= $dataTransaksi['nip_karyawan'] ;?></p>
        <small><?= $dataTransaksi['nama_departemen'] ;?></small>
    </a>
</div>
<ol class="list-group mt-3">
    <li class="list-group-item d-flex justify-content-between align-items-start active">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Detail Dokumen</div>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Nomor Dokumen</div>
            <?= $dataTransaksi['nomor_dokumen'] ;?>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Kode Dokumen</div>
            <?= $dataTransaksi['kode_dokumen'] ;?>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Pengelola Dokumen</div>
            <?= $dataTransaksi['nama_departemen'] ;?>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Lokasi Dokumen</div>
            Lemari No. <?= $dataTransaksi['nomor_lemari']; ?> |
            Rak No.<?= $dataTransaksi['nomor_rak']; ?> |
            Box No.<?= $dataTransaksi['nomor_box']; ?> |
            Warna Map. <?= $dataTransaksi['warna_map']; ?>
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Wilayah Dokumen</div>
            <?= $dataTransaksi['kelurahan_dokumen']; ?>,
            <?= $dataTransaksi['kecamatan_dokumen']; ?>,
            <?= $dataTransaksi['kabkota_dokumen']; ?>,
            <?= $dataTransaksi['provinsi_dokumen']; ?>
        </div>
    </li>
</ol>