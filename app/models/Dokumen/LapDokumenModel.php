<?php
class LapDokumenModel extends BaseModel
{

    private $JudulLapDokumen = 'Laporan Arsip';
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    public function getJudulLapDokumen()
    {
        return$this->JudulLapDokumen;
    }
    public function panggilDataLaporanAll()
    {
        $this->Database->query("SELECT d.*,
        dep.nama_departemen, dep.kode_departemen,
        kat.nama_kategori, kat.kode_kategori,
        lok.nomor_lemari, lok.nomor_rak, lok.nomor_box, lok.warna_map,
        provinsi.nama AS provinsi_dokumen,
        kabkota.nama AS kabkota_dokumen,
        kecamatan.nama AS kecamatan_dokumen,
        kelurahan.nama AS kelurahan_dokumen
        FROM {$this->TabelDokumen} d
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = d.unitpengelola_dokumen
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = d.kategori_dokumen
        LEFT JOIN {$this->TabelLokasi} lok
        ON lok.id_lokasi = d.lokasi_dokumen
        LEFT JOIN {$this->TabelWilayah} provinsi ON provinsi.kode = d.provinsi_dokumen
        LEFT JOIN {$this->TabelWilayah} kabkota ON kabkota.kode = d.kabkota_dokumen
        LEFT JOIN {$this->TabelWilayah} kecamatan ON kecamatan.kode = d.kec_dokumen
        LEFT JOIN {$this->TabelWilayah} kelurahan ON kelurahan.kode = d.kel_dokumen
        ORDER BY d.id_dokumen ASC");
        return $this->Database->resultSet();
    }
    public function panggilDataLaporanDokumen($Tanggal_Awal, $Tanggal_Akhir)
    {
        $this->Database->query("SELECT d.*,
        dep.nama_departemen, dep.kode_departemen,
        kat.nama_kategori, kat.kode_kategori,
        lok.nomor_lemari, lok.nomor_rak, lok.nomor_box, lok.warna_map,
        provinsi.nama AS provinsi_dokumen,
        kabkota.nama AS kabkota_dokumen,
        kecamatan.nama AS kecamatan_dokumen,
        kelurahan.nama AS kelurahan_dokumen
        FROM {$this->TabelDokumen} d
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = d.unitpengelola_dokumen
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = d.kategori_dokumen
        LEFT JOIN {$this->TabelLokasi} lok
        ON lok.id_lokasi = d.lokasi_dokumen
        LEFT JOIN {$this->TabelWilayah} provinsi ON provinsi.kode = d.provinsi_dokumen
        LEFT JOIN {$this->TabelWilayah} kabkota ON kabkota.kode = d.kabkota_dokumen
        LEFT JOIN {$this->TabelWilayah} kecamatan ON kecamatan.kode = d.kec_dokumen
        LEFT JOIN {$this->TabelWilayah} kelurahan ON kelurahan.kode = d.kel_dokumen
        WHERE DATE(tgl_awal_dokumen)
        BETWEEN :Tanggal_Awal AND :Tanggal_Akhir
        ORDER BY tgl_awal_dokumen ASC");
        $this->Database->bind('Tanggal_Awal', $Tanggal_Awal);
        $this->Database->bind('Tanggal_Akhir', $Tanggal_Akhir);
        return $this->Database->resultSet();
    }
}