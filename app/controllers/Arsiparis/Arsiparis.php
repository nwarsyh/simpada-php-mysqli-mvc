<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/06/2026
 * Time: 16.09
 */
class Arsiparis extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Arsiparis | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulArsiparis'] = $this->model('Arsiparis/ArsiparisModel')->GetJudulArsiparis();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('arsiparis/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
}