<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/06/2026
 * Time: 19.05
 */
class LapTransaksiModel extends BaseModel
{
    private $JudulLapTransaksi = 'Laporan Transaksi';
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelPeminjaman = 'tabel_peminjaman';
    public function getJudulLapTransaksi()
    {
        return$this->JudulLapTransaksi;
    }
    public function panggilDataLapTransaksi($Tanggal_Awal, $Tanggal_Akhir)
    {
        $this->Database->query("SELECT pj.*,
        kar.nip_karyawan, kar.nama_depan_karyawan, kar.nama_belakang_karyawan,
        dok.id_dokumen, dok.nomor_dokumen, dok.nama_dokumen, dok.kode_dokumen, dok.file_dokumen,
        dep.nama_departemen, dep.kode_departemen,
        kat.nama_kategori, kat.kode_kategori,
        lok.nomor_lemari, lok.nomor_rak, lok.nomor_box, lok.warna_map,
        provinsi.nama AS provinsi_dokumen,
        kabkota.nama AS kabkota_dokumen,
        kecamatan.nama AS kecamatan_dokumen,
        kelurahan.nama AS kelurahan_dokumen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman 
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        LEFT JOIN {$this->TabelLokasi} lok
        ON lok.id_lokasi = dok.lokasi_dokumen
        LEFT JOIN {$this->TabelWilayah} provinsi
        ON provinsi.kode = dok.provinsi_dokumen
        LEFT JOIN {$this->TabelWilayah} kabkota
        ON kabkota.kode = dok.kabkota_dokumen
        LEFT JOIN {$this->TabelWilayah} kecamatan
        ON kecamatan.kode = dok.kec_dokumen
        LEFT JOIN {$this->TabelWilayah} kelurahan
        ON kelurahan.kode = dok.kel_dokumen
        WHERE DATE(tgl_peminjaman)
        BETWEEN :Tanggal_Awal AND :Tanggal_Akhir
        ORDER BY pj.id_peminjaman DESC");
        $this->Database->bind('Tanggal_Awal', $Tanggal_Awal);
        $this->Database->bind('Tanggal_Akhir', $Tanggal_Akhir);
        return $this->Database->resultSet();
    }
}