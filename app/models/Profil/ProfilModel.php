<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.16
 */
class ProfilModel extends BaseModel
{
    private $JudulProfil = 'Laman Profil';
    private $TabelAccounts = 'tabel_accounts';
    private $TabelKaryawan = 'tabel_karyawan';
    public function GetJudulProfil()
    {
        return $this->JudulProfil;
    }
    public function ubahDataProfil($ubahDataProfik)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelKaryawan} SET
        nama_depan_karyawan =:namadepan,
        nama_belakang_karyawan =:namabelakang,
        jenis_kelamin_karyawan =:jeniskelamin,
        nomor_hp_karyawan =:nohp,
        email_karyawan =:email,
        foto_profil_karyawan =:profil,
        create_at_karyawan =:create_at_karyawan
        WHERE id_karyawan =:id_accounts");
        $this->Database->bind('namadepan', $ubahDataProfik['namadepan']);
        $this->Database->bind('namabelakang', $ubahDataProfik['namabelakang']);
        $this->Database->bind('jeniskelamin', $ubahDataProfik['jeniskelamin']);
        $this->Database->bind('nohp', $ubahDataProfik['nohp']);
        $this->Database->bind('email', $ubahDataProfik['email']);
        $this->Database->bind('profil', $ubahDataProfik['profil']);
        $this->Database->bind('create_at_karyawan', $DateTime);
        $this->Database->bind('id_accounts', $ubahDataProfik['id_accounts']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataPassword($ubahDataPassword)
    {
        $this->Database->query("UPDATE {$this->TabelAccounts} SET
        user_accounts =:username,
        pass_accounts =:password
        WHERE id_accounts =:id_accounts");
        $passwordHash = password_hash($ubahDataPassword['password'], PASSWORD_DEFAULT);
        $this->Database->bind('username', $ubahDataPassword['username']);
        $this->Database->bind('password', $passwordHash);
        $this->Database->bind('id_accounts', $ubahDataPassword['id_accounts']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}