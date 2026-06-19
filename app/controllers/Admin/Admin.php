<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.19
 */
class Admin extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Admin | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulAdmin'] = $this->model('Admin/AdminModel')->GetJudulAdmin();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
}