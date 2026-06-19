<?php
class KaryawanModel extends BaseModel
{
    private $JudulMasterKaryawan = 'Master Karyawan';
    private $JudulMasterTambahKaryawan = 'Tambah Karyawan';
    private $JudulMasterUbahKaryawan = 'Ubah Karyawan';
    private $JudulMasterDetailKaryawan = 'Detail Karyawan';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelDepartemen = 'tabel_departemen';
    public function GetJudulMasterKaryawan()
    {
        return $this->JudulMasterKaryawan;
    }
    public function GetJudulMasterTambahKaryawan()
    {
        return $this->JudulMasterTambahKaryawan;
    }
    public function GetJudulMasterUbahKaryawan()
    {
        return $this->JudulMasterUbahKaryawan;
    }
    public function GetJudulMasterDetailKaryawan()
    {
        return $this->JudulMasterDetailKaryawan;
    }
    public function panggilDataKaryawan()
    {
        $this->Database->query("SELECT k.*,
        d.nama_departemen
        FROM {$this->TabelKaryawan} k
        LEFT JOIN {$this->TabelDepartemen} d
        ON d.id_departemen = k.id_departemen 
        ORDER BY k.id_karyawan ASC");
        return $this->Database->resultSet();
    }
    public function panggilDataKaryawanByID($panggilDataKaryawanByID)
    {
        $this->Database->query("SELECT k.*,
        d.nama_departemen
        FROM {$this->TabelKaryawan} k
        LEFT JOIN {$this->TabelDepartemen} d
        ON d.id_departemen = k.id_departemen 
        WHERE k.id_karyawan =:idkaryawan");
        $this->Database->bind('idkaryawan', $panggilDataKaryawanByID);
        return $this->Database->single();
    }
    public function tambahDataKaryawan($tambahDataKaryawan)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelKaryawan}
        VALUES ('', 
        :id_accounts, 
        :id_departemen,
        :nip_karyawan,
        :nama_depan,
        :nama_belakang,
        :jk_karyawan,
        :nomor_hp,
        :email_karyawan,
        :profil_karyawan,
        :status_karyawan,
        :tgl_masuk,
        :create_at_karyawan,
        :update_at_karyawan)");
        $this->Database->bind('id_accounts', '0');
        $this->Database->bind('id_departemen', $tambahDataKaryawan['id_departemen']);
        $this->Database->bind('nip_karyawan', $tambahDataKaryawan['nip_karyawan']);
        $this->Database->bind('nama_depan', $tambahDataKaryawan['nama_depan']);
        $this->Database->bind('nama_belakang', $tambahDataKaryawan['nama_belakang']);
        $this->Database->bind('jk_karyawan', $tambahDataKaryawan['jk_karyawan']);
        $this->Database->bind('nomor_hp', $tambahDataKaryawan['nomor_hp']);
        $this->Database->bind('email_karyawan', $tambahDataKaryawan['email_karyawan']);
        $this->Database->bind('profil_karyawan', $tambahDataKaryawan['profil_karyawan']);
        $this->Database->bind('status_karyawan', $tambahDataKaryawan['status_karyawan']);
        $this->Database->bind('tgl_masuk', $tambahDataKaryawan['tgl_masuk']);
        $this->Database->bind('create_at_karyawan', $DateTime);
        $this->Database->bind('update_at_karyawan', $DateTime);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataKaryawan($ubahDataKaryawan)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelKaryawan} SET 
        id_departemen =:id_departemen,
        nip_karyawan =:nip_karyawan,
        nama_depan_karyawan =:nama_depan,
        nama_belakang_karyawan =:nama_belakang,
        jenis_kelamin_karyawan =:jk_karyawan,
        nomor_hp_karyawan =:nomor_hp,
        email_karyawan =:email_karyawan,
        foto_profil_karyawan =:profil_karyawan,
        status_karyawan =:status_karyawan,
        tanggal_masuk_karyawan =:tgl_masuk,
        update_at_karyawan =:update_at_karyawan
        WHERE id_karyawan =:id_karyawan");
        $this->Database->bind('id_departemen', $ubahDataKaryawan['id_departemen']);
        $this->Database->bind('nip_karyawan', $ubahDataKaryawan['nip_karyawan']);
        $this->Database->bind('nama_depan', $ubahDataKaryawan['nama_depan']);
        $this->Database->bind('nama_belakang', $ubahDataKaryawan['nama_belakang']);
        $this->Database->bind('jk_karyawan', $ubahDataKaryawan['jk_karyawan']);
        $this->Database->bind('nomor_hp', $ubahDataKaryawan['nomor_hp']);
        $this->Database->bind('email_karyawan', $ubahDataKaryawan['email_karyawan']);
        $this->Database->bind('profil_karyawan', $ubahDataKaryawan['profil_karyawan']);
        $this->Database->bind('status_karyawan', $ubahDataKaryawan['status_karyawan']);
        $this->Database->bind('tgl_masuk', $ubahDataKaryawan['tgl_masuk']);
        $this->Database->bind('update_at_karyawan', $DateTime);
        $this->Database->bind('id_karyawan', $ubahDataKaryawan['id_karyawan']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function panggilProfilKaryawan($panggilProfilKaryawan)
    {
        $this->Database->query("SELECT foto_profil_karyawan FROM {$this->TabelKaryawan} WHERE id_karyawan =:id_karyawan");
        $this->Database->bind(':id_karyawan', $panggilProfilKaryawan);
        return $this->Database->single();
    }
    public function hapusDataKaryawan($hapusDataKaryawan)
    {
        $this->Database->query("DELETE FROM {$this->TabelKaryawan} WHERE id_karyawan =:id_karyawan");
        $this->Database->bind('id_karyawan', $hapusDataKaryawan);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}