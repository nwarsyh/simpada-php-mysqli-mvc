<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/06/2026
 * Time: 12.52
 */
class GlobalModel extends BaseModel
{
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelAccounts = 'tabel_accounts';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    private $TabelPeminjaman = 'tabel_peminjaman';
    public function panggilTotalPeminjaman(){
        $this->Database->query("SELECT COUNT(*) AS totalpeminjaman
        FROM {$this->TabelPeminjaman}");
        $result = $this->Database->single();
        return $result['totalpeminjaman'];
    }
    public function panggilTotalMenungguKonfirmasi(){
        $this->Database->query("SELECT COUNT(*) AS totalmenunggu
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Menunggu Konfirmasi'");
        $result = $this->Database->single();
        return $result['totalmenunggu'];
    }
    public function panggilTotalPeminjamanAktif(){
        $this->Database->query("SELECT COUNT(*) AS totalpeminjaman
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Peminjaman Aktif'");
        $result = $this->Database->single();
        return $result['totalpeminjaman'];
    }
    public function panggilTotalPeminjamanSelesai(){
        $this->Database->query("SELECT COUNT(*) AS totaldikembalikan
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Sudah Dikembalikan'");
        $result = $this->Database->single();
        return $result['totaldikembalikan'];
    }
    public function panggilTotalDokumen()
    {
        $this->Database->query("SELECT COUNT(*) AS totaldokumen
        FROM {$this->TabelDokumen}");
        $result = $this->Database->single();
        return $result['totaldokumen'];
    }
    public function panggilTotalDepartemen()
    {
        $this->Database->query("SELECT COUNT(*) AS totaldepartemen
        FROM {$this->TabelDepartemen}");
        $result = $this->Database->single();
        return $result['totaldepartemen'];
    }
    public function panggilTotalKategori()
    {
        $this->Database->query("SELECT COUNT(*) AS totalkategori
        FROM {$this->TabelKategori}");
        $result = $this->Database->single();
        return $result['totalkategori'];
    }
    public function panggilTotalLokasi()
    {
        $this->Database->query("SELECT COUNT(*) AS totallokasi
        FROM {$this->TabelLokasi}");
        $result = $this->Database->single();
        return $result['totallokasi'];
    }
    public function panggilTotalKaryawan()
    {
        $this->Database->query("SELECT COUNT(*) AS totalkaryawan
        FROM {$this->TabelKaryawan}");
        $result = $this->Database->single();
        return $result['totalkaryawan'];
    }
    public function panggilTotalAccount()
    {
        $this->Database->query("SELECT COUNT(*) AS totalaccount
        FROM {$this->TabelAccounts}");
        $result = $this->Database->single();
        return $result['totalaccount'];
    }
    public function panggilDataUntukGrafik()
    {
        $this->Database->query(" SELECT status_dokumen, COUNT(*) as total_dokumen
        FROM {$this->TabelDokumen}
        GROUP BY status_dokumen
        ORDER BY FIELD(status_dokumen,'Aktif','Tidak Aktif','Permanen','Dimusnahkan')");
        return $this->Database->resultSet();
    }
    public function panggilDokumenLewatRetensi()
    {
        $this->Database->query("SELECT kode_dokumen,
        nomor_dokumen,
        nama_dokumen,
        tgl_retensi_dokumen,
        status_dokumen,
        DATEDIFF(CURDATE(), tgl_retensi_dokumen) AS melewatiretensi
        FROM {$this->TabelDokumen}
        WHERE tgl_retensi_dokumen < CURDATE()
        AND status_dokumen = 'Aktif'
        ORDER BY tgl_retensi_dokumen ASC");
        return $this->Database->resultSet();
    }
    public function panggilJmlDokumenLewatRetensi()
    {
        $hariIni = date('Y-m-d');
        $this->Database->query("SELECT COUNT(*)
        AS jmlmelewatiretensi
        FROM {$this->TabelDokumen}
        WHERE tgl_retensi_dokumen < CURDATE() AND status_dokumen = 'Aktif'");
        $result = $this->Database->single();
        return $result['jmlmelewatiretensi'];
    }
    public function panggilDokumenMemasukiRetensi()
    {
        $this->Database->query("SELECT kode_dokumen,
        nomor_dokumen,
        nama_dokumen,
        tgl_retensi_dokumen,
        status_dokumen,
        DATEDIFF(tgl_retensi_dokumen, CURDATE()) AS memasukiretensi
        FROM {$this->TabelDokumen}
        WHERE tgl_retensi_dokumen >= CURDATE()
        AND tgl_retensi_dokumen <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)
        ORDER BY tgl_retensi_dokumen ASC");
        return $this->Database->resultSet();
    }
    public function panggilJmlDokumenMemasukiRetensi()
    {
        $hariIni = date('Y-m-d');
        $satuBulan = date('Y-m-d', strtotime('+30 days'));
        $this->Database->query("SELECT COUNT(*)
        AS jmlmemasukiretensi
        FROM {$this->TabelDokumen}
        WHERE tgl_retensi_dokumen
        BETWEEN :hariIni AND :satuBulan");
        $this->Database->bind('hariIni', $hariIni);
        $this->Database->bind('satuBulan', $satuBulan);
        $result = $this->Database->single();
        return $result['jmlmemasukiretensi'];
    }
    public function panggilPeminjamanTerlambat()
    {
        $hariIni = date('Y-m-d');
        $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.foto_profil_karyawan,
        dok.id_dokumen,
        dok.nomor_dokumen,
        dok.nama_dokumen,
        dok.kode_dokumen,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        WHERE pj.status_peminjaman = 'Peminjaman Aktif'
        AND pj.tgl_rencana_pengembalian <=:hariIni");
        $this->Database->bind('hariIni', $hariIni);
        return $this->Database->resultSet();
    }
    public function panggilJmlPeminjamanTerlambat()
    {
        $hariIni = date('Y-m-d');
        $this->Database->query("SELECT COUNT(*)
        AS jmlterlambat
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Peminjaman Aktif'
        AND tgl_rencana_pengembalian <=:hariIni");
        $this->Database->bind('hariIni', $hariIni);
        $result = $this->Database->single();
        return $result['jmlterlambat'];
    }

    /*data per user*/
    public function panggildataMenungguKonfirmasiUsers($id_karyawan)
    {
        $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.foto_profil_karyawan,
        dok.id_dokumen,
        dok.nomor_dokumen,
        dok.nama_dokumen,
        dok.kode_dokumen,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        WHERE pj.status_peminjaman = 'Menunggu Konfirmasi'
        AND pj.karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        return $this->Database->resultSet();
    }
    public function panggilJmlMenungguKonfirmasiUsers($id_karyawan){
        $this->Database->query("SELECT COUNT(*) AS totalmenungguusers
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Menunggu Konfirmasi'
        AND karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $result = $this->Database->single();
        return $result['totalmenungguusers'];
    }
    public function panggildataPeminjamanAktifUsers($id_karyawan)
    {
    $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.foto_profil_karyawan,
        dok.id_dokumen,
        dok.nomor_dokumen,
        dok.nama_dokumen,
        dok.kode_dokumen,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        WHERE pj.status_peminjaman = 'Peminjaman Aktif'
        AND pj.karyawan_peminjaman =:id_karyawan");
    $this->Database->bind('id_karyawan', $id_karyawan);
    return $this->Database->resultSet();
    }
    public function panggilJmldataPeminjamanAktifUsers($id_karyawan)
    {
        $this->Database->query("SELECT COUNT(*) AS pinjamanaktifusers
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Peminjaman Aktif'
        AND karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $result = $this->Database->single();
        return $result['pinjamanaktifusers'];
    }
    public function panggildataPinjamanSelesaiUsers($id_karyawan)
    {
        $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.foto_profil_karyawan,
        dok.id_dokumen,
        dok.nomor_dokumen,
        dok.nama_dokumen,
        dok.kode_dokumen,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        WHERE pj.status_peminjaman = 'Sudah Dikembalikan'
        AND pj.karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        return $this->Database->resultSet();
    }
    public function panggilJmldataPinjamanSelesaiUsers($id_karyawan)
    {
        $this->Database->query("SELECT COUNT(*) AS pinjamanselesaiusers
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Sudah Dikembalikan'
        AND karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $result = $this->Database->single();
        return $result['pinjamanselesaiusers'];
    }
    public function panggildataPinjamanDitolakUsers($id_karyawan)
    {
        $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.foto_profil_karyawan,
        dok.id_dokumen,
        dok.nomor_dokumen,
        dok.nama_dokumen,
        dok.kode_dokumen,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        WHERE pj.status_peminjaman = 'Ditolak'
        AND pj.karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        return $this->Database->resultSet();
    }
    public function panggilJmldataPinjamanDitolakUsers($id_karyawan)
    {
        $this->Database->query("SELECT COUNT(*) AS pinjamanditolakusers
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Ditolak'
        AND karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $result = $this->Database->single();
        return $result['pinjamanditolakusers'];
    }

    public function panggilPeminjamanTerlambatUsers($id_karyawan)
    {
        $hariIni = date('Y-m-d');
        $this->Database->query("SELECT pj.*,
        kar.id_karyawan,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.foto_profil_karyawan,
        dok.id_dokumen,
        dok.nomor_dokumen,
        dok.nama_dokumen,
        dok.kode_dokumen,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelPeminjaman} pj
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = pj.karyawan_peminjaman
        LEFT JOIN {$this->TabelDokumen} dok
        ON dok.id_dokumen = pj.dokumen_peminjaman
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = dok.kategori_dokumen
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = dok.unitpengelola_dokumen
        WHERE pj.status_peminjaman = 'Peminjaman Aktif'
        AND pj.tgl_rencana_pengembalian <=:hariIni
        AND pj.karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $this->Database->bind('hariIni', $hariIni);
        return $this->Database->resultSet();
    }
    public function panggilJmlPeminjamanTerlambatUsers($id_karyawan)
    {
        $hariIni = date('Y-m-d');
        $this->Database->query("SELECT COUNT(*)
        AS jmlterlambat
        FROM {$this->TabelPeminjaman}
        WHERE status_peminjaman = 'Peminjaman Aktif'
        AND tgl_rencana_pengembalian <=:hariIni
        AND karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $this->Database->bind('hariIni', $hariIni);
        $result = $this->Database->single();
        return $result['jmlterlambat'];
    }

    public function panggilJmlPeminjamanUsers($id_karyawan){
        $this->Database->query("SELECT COUNT(*) AS totalpeminjamanusers
        FROM {$this->TabelPeminjaman}
        WHERE karyawan_peminjaman =:id_karyawan");
        $this->Database->bind('id_karyawan', $id_karyawan);
        $result = $this->Database->single();
        return $result['totalpeminjamanusers'];
    }
}