<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.16
 */
class SignInModel extends BaseModel
{
    private $JudulSignIn = 'Laman SignIn';
    private $TabelAccount = 'tabel_accounts';
    private $TabelKaryawan = 'tabel_karyawan';
    private $TabelDepartemen = 'tabel_departemen';

    public function GetJudulSignIn()
    {
        return $this->JudulSignIn;
    }
    public function tambahRegistrasiUsers($registrasiUsers)
    {
        /**input dulu tabel user*/
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelKaryawan}
        (id_karyawan, nama_depan_karyawan, nama_belakang_karyawan,
        create_at_karyawan, update_at_karyawan) VALUES ('',
        :nama_depan, :nama_belakang, :create_at_karyawan, :update_at_karyawan)");
        $this->Database->bind('nama_depan', $registrasiUsers['nama_depan']);
        $this->Database->bind('nama_belakang', $registrasiUsers['nama_belakang']);
        $this->Database->bind('create_at_karyawan', $DateTime);
        $this->Database->bind('update_at_karyawan', $DateTime);
        $this->Database->execute();
        /**ambil id yang diinsert di tabel user*/
        $idKaryawan = $this->Database->lastInsertId();
        /**lalau input dulu tabel sigin*/
        $this->Database->query("INSERT INTO {$this->TabelAccount}
        (id_accounts, user_accounts, pass_accounts, role_accounts,
        create_at_accounts, update_at_accounts) VALUES ('',
        :username, :password_awal, :role_user, :create_at_accounts, :update_at_accounts)");
        $passwordHash = password_hash($registrasiUsers['password_awal'], PASSWORD_DEFAULT);
        $this->Database->bind('username', $registrasiUsers['username']);
        $this->Database->bind('password_awal', $passwordHash);
        $this->Database->bind('role_user', 'Admin');
        $this->Database->bind('create_at_accounts', $DateTime);
        $this->Database->bind('update_at_accounts', $DateTime);
        $this->Database->execute();
        /**ambil id yang diinsert di tabel signin*/
        $idAccount = $this->Database->lastInsertId();

        /**Update tabel kolom id signin di tabel user sesuia id tebaru dari tabel signin*/
        $this->Database->query("UPDATE {$this->TabelKaryawan} SET
        id_accounts =:id_accounts
        WHERE id_karyawan =:id_karyawan");
        $this->Database->bind(':id_accounts', $idAccount);
        $this->Database->bind(':id_karyawan', $idKaryawan);
        $this->Database->execute();
        /**Update tabel kolom id users di tabel signin sesuia id tebaru dari tabel user*/
        $this->Database->query("UPDATE {$this->TabelAccount} SET
        id_karyawan =:id_karyawan
        WHERE id_accounts =:id_accounts");
        $this->Database->bind(':id_karyawan', $idKaryawan);
        $this->Database->bind(':id_accounts', $idAccount);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function getSignInKaryawan($getSignInKaryawan)
    {
        $this->Database->query("SELECT a.*,
        k.nama_depan_karyawan, k.nama_belakang_karyawan, k.id_karyawan
        FROM {$this->TabelAccount} a
        LEFT JOIN {$this->TabelKaryawan} k
        ON k.id_accounts = a.id_accounts
        WHERE a.user_accounts =:getSignInKaryawan");
        $this->Database->bind('getSignInKaryawan', $getSignInKaryawan);
        return $this->Database->single();
    }
    public function panggilUserAktif($panggilUserAktif)
    {
        $this->Database->query("SELECT acc.*,
        kar.nip_karyawan,
        kar.nama_depan_karyawan,
        kar.nama_belakang_karyawan,
        kar.jenis_kelamin_karyawan,
        kar.nomor_hp_karyawan,
        kar.email_karyawan,
        kar.status_karyawan,
        kar.tanggal_masuk_karyawan,
        kar.create_at_karyawan,
        kar.update_at_karyawan,
        kar.foto_profil_karyawan,
        dep.nama_departemen, dep.kode_departemen
        FROM {$this->TabelAccount} acc
        LEFT JOIN {$this->TabelKaryawan} kar
        ON kar.id_karyawan = acc.id_karyawan
        LEFT JOIN {$this->TabelDepartemen} dep
        ON  dep.id_departemen = kar.id_departemen
        WHERE acc.id_accounts =:id_accounts");
        $this->Database->bind('id_accounts', $panggilUserAktif);
        return $this->Database->single();
    }
}