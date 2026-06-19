<?php
class AccountModel extends BaseModel
{
    private $JudulMasterAccount = 'Master Account';
    private $TabelAccount = 'tabel_accounts';
    private $TabelKaryawan = 'tabel_karyawan';
    public function GetJudulMasterAccount()
    {
        return $this->JudulMasterAccount;
    }
    public function panggilDataAccount()
    {
        $this->Database->query("SELECT k.*,
        a.user_accounts, a.pass_accounts, a.role_accounts
        FROM {$this->TabelKaryawan} k
        LEFT JOIN {$this->TabelAccount} a
        ON k.id_accounts = a.id_accounts 
        WHERE status_karyawan = 'Aktif'
        ORDER BY k.id_karyawan ASC");
        return $this->Database->resultSet();
    }
    public function tambahDataAccount($tambahDataAccount)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelAccount} VALUE ('',
        :id_karyawan,
        :user_accounts,
        :pass_accounts,
        :role_accounts,
        :create_at_accounts,
        :update_at_accounts)");
        $passwordAccount = password_hash($tambahDataAccount['pass_accounts'], PASSWORD_DEFAULT);
        $this->Database->bind('id_karyawan', $tambahDataAccount['id_karyawan']);
        $this->Database->bind('user_accounts', $tambahDataAccount['user_accounts']);
        $this->Database->bind('pass_accounts', $passwordAccount);
        $this->Database->bind('role_accounts', $tambahDataAccount['role_accounts']);
        $this->Database->bind('create_at_accounts', $DateTime);
        $this->Database->bind('update_at_accounts', $DateTime);
        $this->Database->execute();
        $idKaryawan = $this->Database->lastInsertId();
        $this->Database->query("UPDATE {$this->TabelKaryawan} SET
        id_accounts =:id_accounts WHERE id_karyawan =:id_karyawan");
        $this->Database->bind(':id_accounts', $idKaryawan);
        $this->Database->bind(':id_karyawan', $tambahDataAccount['id_karyawan']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataAccount($ubahDataAccount)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelAccount} SET
        user_accounts =:user_accounts,
        pass_accounts =:pass_accounts,
        role_accounts =:role_accounts,
        update_at_accounts =:update_at_accounts
        WHERE id_accounts =:id_accounts");
        $passwordAccount = password_hash($ubahDataAccount['pass_accounts'], PASSWORD_DEFAULT);
        $this->Database->bind('user_accounts', $ubahDataAccount['user_accounts']);
        $this->Database->bind('pass_accounts', $passwordAccount);
        $this->Database->bind('role_accounts', $ubahDataAccount['role_accounts']);
        $this->Database->bind('update_at_accounts', $DateTime);
        $this->Database->bind('id_accounts', $ubahDataAccount['id_accounts']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function hapusDataAccount($hapusDataAccount)
    {
        // Cek dulu: user ini refer ke tabel Karyawan
        $this->Database->query("SELECT * FROM {$this->TabelAccount} WHERE id_accounts = :id_accounts");
        $this->Database->bind('id_accounts', $hapusDataAccount);
        $AccountYangDihapus = $this->Database->single();
        if (!$AccountYangDihapus){
            return false;
        }
        $refUser = $AccountYangDihapus['id_karyawan'];
        $this->Database->query("UPDATE {$this->TabelKaryawan} SET id_accounts = NULL WHERE id_karyawan =:id_karyawan");
        $this->Database->bind('id_karyawan', $refUser);
        $this->Database->execute();
        $this->Database->query("DELETE FROM {$this->TabelAccount} WHERE id_accounts =:id_accounts");
        $this->Database->bind('id_accounts', $hapusDataAccount);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}