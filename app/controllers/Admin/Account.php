<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 18.51
 */
class Account extends Controller
{
    protected $AccountService; /**ini manggil service karyawan*/
    public function __construct()
    {
        /*parent::__construct(); dipakai jika __construct(); lebih dari satu
        untuk kasus ini karena controlller parent dari BaseContoller
        dan BaseController Punya __construct(); Global Data*/
        parent::__construct();
        $this->AccountService = new AccountService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Account | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulAccount'] = $this->model('Admin/AccountModel')->GetJudulMasterAccount();
        $dataSimpanPinjam['dataAccount'] = $this->model('Admin/AccountModel')->panggilDataAccount();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/account/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function createAccount()
    {
        $AccountValidasi = new Validasi();
        $AccountValidasi->validasi($_POST,
            AccountRequest::createRequestAccount(),
            AccountRequest::attributesRequestAccount());
        if ($AccountValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $AccountValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Account');
            exit;

        }
        $createAccount = $this->AccountService->createAccountService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createAccount['type'])  . ' !!!',
            $createAccount['kategori'],
            $createAccount['message'],
            $createAccount['type']);
        header('Location: ' . BASEURL . '/Admin/Account');
        exit;
    }
    public function updateAccount()
    {
        $AccountValidasi = new Validasi();
        $AccountValidasi->validasi($_POST,
            AccountRequest::updateRequestAccount(),
            AccountRequest::attributesRequestAccount());
        if ($AccountValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $AccountValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Account');
            exit;

        }
        $createAccount = $this->AccountService->updateAccountService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createAccount['type'])  . ' !!!',
            $createAccount['kategori'],
            $createAccount['message'],
            $createAccount['type']);
        header('Location: ' . BASEURL . '/Admin/Account');
        exit;
    }
    public function deleteAccount($id_account)
    {
        $deleteAccount = $this->AccountService->deleteAccountService($id_account);
        Flasher::setFlasherToast(strtoupper(
                $deleteAccount['type'])  . ' !!!',
            $deleteAccount['kategori'],
            $deleteAccount['message'],
            $deleteAccount['type']);
        header('Location: ' . BASEURL . '/Admin/Account');
        exit;
    }
}