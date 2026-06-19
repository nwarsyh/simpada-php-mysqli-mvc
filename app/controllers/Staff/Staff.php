<?php
class Staff extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Laman Staff';
        $dataSimpanPinjam['SubJudulStaff'] = $this->model('Staff/StaffModel')->GetJudulStaff();
        $karyawanInLogin = $_SESSION['id_karyawan'];
        $dataSimpanPinjam['dataMenungguKonfirmasiUsers'] = self::model('Global/GlobalModel')->panggildataMenungguKonfirmasiUsers($karyawanInLogin);
        $dataSimpanPinjam['ttlMenungguKonfirmasiUsers'] = self::model('Global/GlobalModel')->panggilJmlMenungguKonfirmasiUsers($karyawanInLogin);
        $dataSimpanPinjam['dataPinjamanAktifUsers'] = self::model('Global/GlobalModel')->panggildataPeminjamanAktifUsers($karyawanInLogin);
        $dataSimpanPinjam['ttlPinjamanAktifUsers'] = self::model('Global/GlobalModel')->panggilJmldataPeminjamanAktifUsers($karyawanInLogin);
        $dataSimpanPinjam['dataPinjamanSelesaiUsers'] = self::model('Global/GlobalModel')->panggildataPinjamanSelesaiUsers($karyawanInLogin);
        $dataSimpanPinjam['ttlPinjamanSelesaiUsers'] = self::model('Global/GlobalModel')->panggilJmldataPinjamanSelesaiUsers($karyawanInLogin);
        $dataSimpanPinjam['dataPinjamanDitolakUsers'] = self::model('Global/GlobalModel')->panggildataPinjamanDitolakUsers($karyawanInLogin);
        $dataSimpanPinjam['ttlPinjamanDitolakUsers'] = self::model('Global/GlobalModel')->panggilJmldataPinjamanDitolakUsers($karyawanInLogin);
        $dataSimpanPinjam['dataPinjamanTerlambatUsers'] = self::model('Global/GlobalModel')->panggilPeminjamanTerlambatUsers($karyawanInLogin);
        $dataSimpanPinjam['ttlPinjamanTerlambatUsers'] = self::model('Global/GlobalModel')->panggilJmlPeminjamanTerlambatUsers($karyawanInLogin);
        $dataSimpanPinjam['ttlPinjamanUsers'] = self::model('Global/GlobalModel')->panggilJmlPeminjamanUsers($karyawanInLogin);
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('staff/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
}