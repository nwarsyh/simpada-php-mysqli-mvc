<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/06/2026
 * Time: 01.42
 */
class TransaksiModel extends BaseModel
{
    private $JudulTransaksi = 'Laman Transaksi';
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    private $TabelPeminjaman = 'tabel_peminjaman';
    public function getJudulTransaksi()
    {
        return $this->JudulTransaksi;
    }
    public function panggilDataTransaksi()
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
        ORDER BY pj.id_peminjaman DESC");
        return $this->Database->resultSet();
    }
    public function ubahKonfirmasiTransaksi($ubahKonfirmasiTransaksi)
    {
        if ($_POST['status_peminjaman'] == 'Diterima'){
            $this->Database->query("UPDATE {$this->TabelPeminjaman} SET
            status_peminjaman =:status_peminjaman, catatan_admin_peminjaman =:catatan_konfirmasi
            WHERE id_peminjaman  =:id_peminjaman ");
            $this->Database->bind('status_peminjaman', $ubahKonfirmasiTransaksi['status_peminjaman']);
            $this->Database->bind('catatan_konfirmasi', $ubahKonfirmasiTransaksi['catatan_konfirmasi']);
            $this->Database->bind('id_peminjaman', $ubahKonfirmasiTransaksi['id_peminjaman']);
            $this->Database->execute();
            return $this->Database->rowCount();
        }else{
            //cari iddokumen di tabel peminjaman
            $this->Database->query("SELECT dokumen_peminjaman FROM {$this->TabelPeminjaman} WHERE id_peminjaman =:id_peminjaman");
            $this->Database->bind('id_peminjaman', $ubahKonfirmasiTransaksi['id_peminjaman']);
            $dataDokumen = $this->Database->single();

            if (!$dataDokumen) {
                return false;
            }
            $this->Database->query("UPDATE {$this->TabelPeminjaman} SET
            status_peminjaman =:status_peminjaman, catatan_admin_peminjaman =:catatan_konfirmasi
            WHERE id_peminjaman  =:id_peminjaman ");
            $this->Database->bind('status_peminjaman', $ubahKonfirmasiTransaksi['status_peminjaman']);
            $this->Database->bind('catatan_konfirmasi', $ubahKonfirmasiTransaksi['catatan_konfirmasi']);
            $this->Database->bind('id_peminjaman', $ubahKonfirmasiTransaksi['id_peminjaman']);
            $this->Database->execute();

            $this->Database->query("UPDATE {$this->TabelDokumen} SET jumlah_dokumen = jumlah_dokumen + 1 WHERE id_dokumen =:id_dokumen");
            $this->Database->bind('id_dokumen', $dataDokumen['dokumen_peminjaman']);
            $this->Database->execute();
            return $this->Database->rowCount();
        }

    }
    public function ubahAktifTransaksi($ubahAktifTransaksi)
    {
        //cari iddokumen di tabel peminjaman
        $this->Database->query("SELECT dokumen_peminjaman FROM {$this->TabelPeminjaman} WHERE id_peminjaman =:id_peminjaman");
        $this->Database->bind('id_peminjaman', $ubahAktifTransaksi['id_peminjaman']);
        $dataDokumen = $this->Database->single();

        if (!$dataDokumen) {
            return false;
        }
        $this->Database->query("UPDATE {$this->TabelPeminjaman} SET
        tgl_pengembalian =:tgl_kembali,
        status_peminjaman =:status_peminjaman,
        catatan_admin_peminjaman =:catatan_konfirmasi
        WHERE id_peminjaman  =:id_peminjaman");
        $this->Database->bind('tgl_kembali', $ubahAktifTransaksi['tgl_kembali']);
        $this->Database->bind('status_peminjaman', $ubahAktifTransaksi['status_peminjaman']);
        $this->Database->bind('catatan_konfirmasi', $ubahAktifTransaksi['catatan_konfirmasi']);
        $this->Database->bind('id_peminjaman', $ubahAktifTransaksi['id_peminjaman']);
        $this->Database->execute();

        $this->Database->query("UPDATE {$this->TabelDokumen} SET jumlah_dokumen = jumlah_dokumen + 1 WHERE id_dokumen =:id_dokumen");
        $this->Database->bind('id_dokumen', $dataDokumen['dokumen_peminjaman']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }

}