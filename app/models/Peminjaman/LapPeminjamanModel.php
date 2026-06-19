<?php
class LapPeminjamanModel extends BaseModel
{

    private $JudulLapPeminjaman = 'Laporan Peminjaman';
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    private $TabelPeminjaman = 'tabel_peminjaman';
    public function getJudulLapPeminjaman()
    {
        return $this->JudulLapPeminjaman;
    }
    public function panggilDataLaporanPeminjaman($id_karyawan, $TglAwal, $TglAkhir){
        $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
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
        WHERE pj.karyawan_peminjaman = :karyawan_peminjaman
        AND DATE(tgl_peminjaman)
        BETWEEN :Tanggal_Awal AND :Tanggal_Akhir
        ORDER BY pj.id_peminjaman DESC");
        $this->Database->bind('karyawan_peminjaman', $id_karyawan);
        $this->Database->bind('Tanggal_Awal', $TglAwal);
        $this->Database->bind('Tanggal_Akhir', $TglAkhir);
        return $this->Database->resultSet();
    }
}