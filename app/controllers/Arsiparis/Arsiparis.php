<?php
class Arsiparis extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Laman Arsiparis';
        $dataSimpanPinjam['SubJudulArsiparis'] = $this->model('Arsiparis/ArsiparisModel')->GetJudulArsiparis();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('arsiparis/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
}