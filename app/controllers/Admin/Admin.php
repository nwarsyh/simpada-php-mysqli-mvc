<?php
class Admin extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Lama Admin';
        $dataSimpanPinjam['SubJudulAdmin'] = $this->model('Admin/AdminModel')->GetJudulAdmin();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
}