<?php
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