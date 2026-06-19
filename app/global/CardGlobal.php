<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/06/2026
 * Time: 13.03
 */
class CardGlobal
{
    public static function model($modelpath)
    {
        $path = MODEL_PATH . $modelpath . '.php';
        require_once $path;
        $parts = explode('/', $modelpath);
        $clasName = end($parts);
        return new $clasName;
    }
    public static function load()
    {

        $dataSimpanPinjam = [];
        /*bagina card atas admin*/
        $dataSimpanPinjam['totalPeminjaman'] = self::model('Global/GlobalModel')->panggilTotalPeminjaman();
        $dataSimpanPinjam['totalMenungguKonfirmasi'] = self::model('Global/GlobalModel')->panggilTotalMenungguKonfirmasi();
        $dataSimpanPinjam['totalPeminjamanAktif'] = self::model('Global/GlobalModel')->panggilTotalPeminjamanAktif();
        $dataSimpanPinjam['totalPeminjamanSelesai'] = self::model('Global/GlobalModel')->panggilTotalPeminjamanSelesai();
        /*bagian card kanan admin*/
        $dataSimpanPinjam['totalDokumen'] = self::model('Global/GlobalModel')->panggilTotalDokumen();
        $dataSimpanPinjam['totalDepartemen'] = self::model('Global/GlobalModel')->panggilTotalDepartemen();
        $dataSimpanPinjam['totalKategori'] = self::model('Global/GlobalModel')->panggilTotalKategori();
        $dataSimpanPinjam['totalLokasi'] = self::model('Global/GlobalModel')->panggilTotalLokasi();
        $dataSimpanPinjam['totalKaryawan'] = self::model('Global/GlobalModel')->panggilTotalKaryawan();
        $dataSimpanPinjam['totalAccount'] = self::model('Global/GlobalModel')->panggilTotalAccount();
        /*bagian grafik*/
        $dataSimpanPinjam['dataGrafik'] = self::model('Global/GlobalModel')->panggilDataUntukGrafik();



        return $dataSimpanPinjam;
    }
}