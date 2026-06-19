<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/06/2026
 * Time: 01.14
 */
class AccountService
{
    protected $AccountModel;
    public function __construct()
    {
        $this->AccountModel = new AccountModel();
    }
    public function createAccountService($post)
    {
        $Password = $_POST['pass_accounts'];
        $PasswordKonfirmasi  = $_POST['ulangi_pass_accounts'];
        if ($Password !== $PasswordKonfirmasi) {
            return [
                'status' => false,
                'kategori' => 'Password Baru',
                'message' => 'Tidak Sesuai',
                'type' => 'error'
            ];
        }
        $createAccountService = $this->AccountModel->tambahDataAccount($post);
        if (!$createAccountService) {
            return [
                'status' => false,
                'kategori' => 'Data Account',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Account',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updateAccountService($update)
    {
        $Password = $_POST['pass_accounts'];
        $PasswordKonfirmasi  = $_POST['ulangi_pass_accounts'];
        if ($Password !== $PasswordKonfirmasi) {
            return [
                'status' => false,
                'kategori' => 'Password Baru',
                'message' => 'Tidak Sesuai',
                'type' => 'error'
            ];
        }
        $updateAccountService = $this->AccountModel->ubahDataAccount($update);
        if ($updateAccountService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Account',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateAccountService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Account',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Account',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function deleteAccountService($delete)
    {
        $deleteAccountService = $this->AccountModel->hapusDataAccount($delete);
        if (!$deleteAccountService) {

            return [
                'status' => false,
                'kategori' => 'Data Account',
                'message' => 'Gagal Dihapus',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Account',
            'message' => 'Berhasil Dihapus',
            'type' => 'success'
        ];
    }
}