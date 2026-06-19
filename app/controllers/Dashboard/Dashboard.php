<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.57
 */
class Dashboard extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Dashboard | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulDashboard'] = $this->model('Dashboard/DashboardModel')->GetJudulDashboard();
        $this->view('dashboard/index', $dataSimpanPinjam);
    }
}