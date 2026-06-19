<?php
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
        $dataSimpanPinjam['totalPeminjaman'] = self::model('Global/GlobalModel')->panggilTotalPeminjaman();
        $dataSimpanPinjam['totalMenungguKonfirmasi'] = self::model('Global/GlobalModel')->panggilTotalMenungguKonfirmasi();
        $dataSimpanPinjam['totalPeminjamanAktif'] = self::model('Global/GlobalModel')->panggilTotalPeminjamanAktif();
        $dataSimpanPinjam['totalPeminjamanSelesai'] = self::model('Global/GlobalModel')->panggilTotalPeminjamanSelesai();
        $dataSimpanPinjam['totalDokumen'] = self::model('Global/GlobalModel')->panggilTotalDokumen();
        $dataSimpanPinjam['totalDepartemen'] = self::model('Global/GlobalModel')->panggilTotalDepartemen();
        $dataSimpanPinjam['totalKategori'] = self::model('Global/GlobalModel')->panggilTotalKategori();
        $dataSimpanPinjam['totalLokasi'] = self::model('Global/GlobalModel')->panggilTotalLokasi();
        $dataSimpanPinjam['totalKaryawan'] = self::model('Global/GlobalModel')->panggilTotalKaryawan();
        $dataSimpanPinjam['totalAccount'] = self::model('Global/GlobalModel')->panggilTotalAccount();
        $dataSimpanPinjam['dataGrafik'] = self::model('Global/GlobalModel')->panggilDataUntukGrafik();
        return $dataSimpanPinjam;
    }
}