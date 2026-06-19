<?php
class DokumenModel extends BaseModel
{
    private $JudulDokumen = 'Master Dokumen';
    private $JudulTambahDokumen = 'Tambah Dokumen';
    private $JudulDetailDokumen = 'Detail Dokumen';
    private $JudulUbahDokumen = 'Ubah Dokumen';
    private $TabelDepartemen = 'tabel_departemen';
    private $TabelDokumen = 'tabel_dokumen';
    private $TabelKategori = 'tabel_kategori';
    private $TabelLokasi = 'tabel_lokasi';
    private $TabelWilayah = 'tabel_wilayah';
    public function GetJudulDokumen()
    {
        return $this->JudulDokumen;
    }
    public function GetJudulTambahDokumen()
    {
        return $this->JudulTambahDokumen;
    }
    public function GetJudulUbahDokumen()
    {
        return $this->JudulUbahDokumen;
    }
    public function GetJudulDetailDokumen()
    {
        return $this->JudulDetailDokumen;
    }
    public function panggilDataDokumen()
    {
        $this->Database->query("SELECT * FROM {$this->TabelDokumen}");
        return $this->Database->resultSet();
    }
    public function panggilDataDokumenbackup($panggilDataDokumenbackup)
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
        WHERE d.id_dokumen =:id_dokumen");
        $this->Database->bind('id_dokumen', $panggilDataDokumenbackup);
        return $this->Database->single();
    }
    public function panggilDataDokumenByID($panggilDataDokumenByID)
    {
        $this->Database->query("SELECT d.*,
        dep.nama_departemen, dep.kode_departemen,
        kat.nama_kategori, kat.kode_kategori,
        lok.nomor_lemari, lok.nomor_rak, lok.nomor_box, lok.warna_map
        FROM {$this->TabelDokumen} d
        LEFT JOIN {$this->TabelDepartemen} dep
        ON dep.id_departemen = d.unitpengelola_dokumen
        LEFT JOIN {$this->TabelKategori} kat
        ON kat.id_kategori = d.kategori_dokumen
        LEFT JOIN {$this->TabelLokasi} lok
        ON lok.id_lokasi = d.lokasi_dokumen
        WHERE d.id_dokumen =:id_dokumen");
        $this->Database->bind('id_dokumen', $panggilDataDokumenByID);
        return $this->Database->single();
    }
    public function panggilDataWilayah ($level, $idParent = null)
    {
        if ($idParent === null) {
            $this->Database->query("SELECT kode, nama
            FROM {$this->TabelWilayah}
            WHERE CHAR_LENGTH(kode) =:jmlKarakter
            ORDER BY nama");
            $this->Database->bind('jmlKarakter', (int)$level);
        }else{
            $ambilAwalanKode = strlen($idParent);
            $this->Database->query("SELECT kode, nama
            FROM {$this->TabelWilayah} WHERE LEFT(kode, :ambilAwalanKode) =:idParent
            AND CHAR_LENGTH(kode) =:jmlKarakter ORDER BY nama");
            $this->Database->bind('ambilAwalanKode', (int)$ambilAwalanKode);
            $this->Database->bind('idParent', $idParent);
            $this->Database->bind('jmlKarakter', (int)$level);
        }
        $this->Database->execute();
        return $this->Database->resultSet();
    }
    public function panggilNamaWilayahSesuaiKode($panggilNamaWilayahSesuaiKode)
    {
        $this->Database->query("SELECT nama FROM {$this->TabelWilayah} WHERE kode = :kode");
        $this->Database->bind(':kode', $panggilNamaWilayahSesuaiKode);
        $row = $this->Database->single(); // ambil 1 baris
        return $row ? $row['nama'] : '-';
    }
    public function tambahDataDokumen($tambahDataDokumen)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelDokumen}
        VALUES ('', :kode_dokumen, :nomor_dokumen, :nama_dokumen,
        :lokasi_dokumen, :kategori_dokumen, :pengelola_dokumen,
        :jumlah_dokumen, 
        :tanggal_awal_dokumen, :tanggal_retensi_dokumen, :status_dokumen,
        :prov_dokumen, :kabkota_dokumen, :kec_dokumen, :kel_dokumen,
        :deskripsi_dokumen, :lampiran_dokumen,
        :create_at_dokumen, :update_at_dokumen)");
        $this->Database->bind('kode_dokumen', $tambahDataDokumen['kode_dokumen']);
        $this->Database->bind('nomor_dokumen', $tambahDataDokumen['nomor_dokumen']);
        $this->Database->bind('nama_dokumen', $tambahDataDokumen['nama_dokumen']);
        $this->Database->bind('lokasi_dokumen', $tambahDataDokumen['lokasi_dokumen']);
        $this->Database->bind('kategori_dokumen', $tambahDataDokumen['kategori_dokumen']);
        $this->Database->bind('pengelola_dokumen', $tambahDataDokumen['pengelola_dokumen']);
        $this->Database->bind('jumlah_dokumen', $tambahDataDokumen['jumlah_dokumen']);
        $this->Database->bind('tanggal_awal_dokumen', $tambahDataDokumen['tanggal_awal_dokumen']);
        $this->Database->bind('tanggal_retensi_dokumen', $tambahDataDokumen['tanggal_retensi_dokumen']);
        $this->Database->bind('status_dokumen', $tambahDataDokumen['status_dokumen']);
        $this->Database->bind('prov_dokumen', $tambahDataDokumen['prov_dokumen']);
        $this->Database->bind('kabkota_dokumen', $tambahDataDokumen['kabkota_dokumen']);
        $this->Database->bind('kec_dokumen', $tambahDataDokumen['kec_dokumen']);
        $this->Database->bind('kel_dokumen', $tambahDataDokumen['kel_dokumen']);
        $this->Database->bind('deskripsi_dokumen', $tambahDataDokumen['deskripsi_dokumen']);
        $this->Database->bind('lampiran_dokumen', $tambahDataDokumen['lampiran_dokumen']);
        $this->Database->bind('create_at_dokumen', $DateTime);
        $this->Database->bind('update_at_dokumen', $DateTime);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataDokumen($ubahDataDokumen)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelDokumen} SET
        kode_dokumen =:kode_dokumen, 
        nomor_dokumen =:nomor_dokumen, 
        nama_dokumen =:nama_dokumen,
        lokasi_dokumen =:lokasi_dokumen, 
        kategori_dokumen =:kategori_dokumen,
        unitpengelola_dokumen =:pengelola_dokumen,
        jumlah_dokumen =:jumlah_dokumen, 
        tgl_awal_dokumen =:tanggal_awal_dokumen,
        tgl_retensi_dokumen =:tanggal_retensi_dokumen,
        status_dokumen =:status_dokumen,
        provinsi_dokumen =:prov_dokumen,
        kabkota_dokumen =:kabkota_dokumen,
        kec_dokumen =:kec_dokumen,
        kel_dokumen =:kel_dokumen,
        deksripsi_dokumen =:deskripsi_dokumen,
        file_dokumen =:lampiran_dokumen,
        update_at_dokumen =:update_at_dokumen
        WHERE id_dokumen =:id_dokumen");
        $this->Database->bind('kode_dokumen', $ubahDataDokumen['kode_dokumen']);
        $this->Database->bind('nomor_dokumen', $ubahDataDokumen['nomor_dokumen']);
        $this->Database->bind('nama_dokumen', $ubahDataDokumen['nama_dokumen']);
        $this->Database->bind('lokasi_dokumen', $ubahDataDokumen['lokasi_dokumen']);
        $this->Database->bind('kategori_dokumen', $ubahDataDokumen['kategori_dokumen']);
        $this->Database->bind('pengelola_dokumen', $ubahDataDokumen['pengelola_dokumen']);
        $this->Database->bind('jumlah_dokumen', $ubahDataDokumen['jumlah_dokumen']);
        $this->Database->bind('tanggal_awal_dokumen', $ubahDataDokumen['tanggal_awal_dokumen']);
        $this->Database->bind('tanggal_retensi_dokumen', $ubahDataDokumen['tanggal_retensi_dokumen']);
        $this->Database->bind('status_dokumen', $ubahDataDokumen['status_dokumen']);
        $this->Database->bind('prov_dokumen', $ubahDataDokumen['prov_dokumen']);
        $this->Database->bind('kabkota_dokumen', $ubahDataDokumen['kabkota_dokumen']);
        $this->Database->bind('kec_dokumen', $ubahDataDokumen['kec_dokumen']);
        $this->Database->bind('kel_dokumen', $ubahDataDokumen['kel_dokumen']);
        $this->Database->bind('deskripsi_dokumen', $ubahDataDokumen['deskripsi_dokumen']);
        $this->Database->bind('lampiran_dokumen', $ubahDataDokumen['lampiran_dokumen']);
        $this->Database->bind('update_at_dokumen', $DateTime);
        $this->Database->bind('id_dokumen', $ubahDataDokumen['id_dokumen']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}