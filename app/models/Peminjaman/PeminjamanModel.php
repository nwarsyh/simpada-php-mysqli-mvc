<?php
class PeminjamanModel extends BaseModel
{

    private $JudulPeminjaman = 'Peminjaman';
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    private $TabelPeminjaman = 'tabel_peminjaman';
    public function getJudulPeminjaman()
    {
        return $this->JudulPeminjaman;
    }
    public function panggilDataPeminjaman($panggilDataPeminjaman)
    {
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
        WHERE pj.karyawan_peminjaman = :karyawan_peminjaman ORDER BY pj.id_peminjaman DESC");
        $this->Database->bind('karyawan_peminjaman', $panggilDataPeminjaman);
        return $this->Database->resultSet();
    }
    public function cariDataDokumen($cariDataDokumen)
    {
        $this->Database->query("SELECT
        d.id_dokumen, d.nomor_dokumen, d.nama_dokumen, d.kode_dokumen, d.jumlah_dokumen,
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
        WHERE d.status_dokumen IN ('Aktif', 'Permanen') AND d.nomor_dokumen LIKE :nomor_dokumen LIMIT 10");
        $this->Database->bind('nomor_dokumen', '%' . $cariDataDokumen . '%');
        return $this->Database->resultSet();
    }
    public function tambahDataPeminjaman($tambahDataPeminjaman)
    {
        $this->Database->query("INSERT INTO {$this->TabelPeminjaman}
        (id_peminjaman, dokumen_peminjaman,
        karyawan_peminjaman,
        tgl_peminjaman,
        tgl_rencana_pengembalian,
        status_peminjaman,
        catatan_peminjaman,
        create_at_peminjaman,
        update_at_peminjaman) VALUES ('',
        :doc_id,
        :id_karyawan,
        :tgl_peminjaman,
        :tanggal_rencana_kembali,
        :status_peminjaman,
        :catatan_peminjaman,
        :create_at_peminjaman,
        :update_at_peminjaman)");
        $DateTime = date('Y-m-d H:i:s');
        $TanggalPeminjaman = date('Y-m-d');
        $StatusAwal = 'Menunggu Konfirmasi';
        $this->Database->bind('doc_id', $tambahDataPeminjaman['doc_id']);
        $this->Database->bind('id_karyawan', $tambahDataPeminjaman['id_karyawan']);
        $this->Database->bind('tgl_peminjaman', $TanggalPeminjaman);
        $this->Database->bind('tanggal_rencana_kembali', $tambahDataPeminjaman['tanggal_rencana_kembali']);
        $this->Database->bind('status_peminjaman', $StatusAwal);
        $this->Database->bind('catatan_peminjaman', $tambahDataPeminjaman['catatan_peminjaman']);
        $this->Database->bind('create_at_peminjaman', $DateTime);
        $this->Database->bind('update_at_peminjaman', $DateTime);
        $this->Database->execute();
        $this->Database->query("UPDATE {$this->TabelDokumen} SET
        jumlah_dokumen = jumlah_dokumen - 1
        WHERE id_dokumen =:doc_id");
        $this->Database->bind('doc_id', $tambahDataPeminjaman['doc_id']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function hapusDataPeminjaman($hapusDataPeminjaman)
    {
        $this->Database->query("SELECT dokumen_peminjaman FROM {$this->TabelPeminjaman} WHERE id_peminjaman =:id_peminjaman");
        $this->Database->bind('id_peminjaman', $hapusDataPeminjaman);
        $dataDokumen = $this->Database->single();
        if (!$dataDokumen) {
            return false;
        }
        $this->Database->query("DELETE FROM {$this->TabelPeminjaman} WHERE id_peminjaman=:id_peminjaman");
        $this->Database->bind('id_peminjaman', $hapusDataPeminjaman);
        $this->Database->execute();
        $this->Database->query("UPDATE {$this->TabelDokumen} SET jumlah_dokumen = jumlah_dokumen + 1 WHERE id_dokumen =:id_dokumen");
        $this->Database->bind('id_dokumen', $dataDokumen['dokumen_peminjaman']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function panggilDetaiLLaporan($panggilDetaiLLaporan)
    {
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
        WHERE pj.id_peminjaman = :id_peminjaman");
        $this->Database->bind('id_peminjaman', $panggilDetaiLLaporan);
        return $this->Database->single();
    }
}