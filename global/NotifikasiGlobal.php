<?php
class NotifikasiGlobal
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
        $dataSimpanPinjam['dataMelewatiRetensi'] = self::model('Global/GlobalModel')->panggilDokumenLewatRetensi();
        $dataSimpanPinjam['dataJmlMelewatiRetensi'] = self::model('Global/GlobalModel')->panggilJmlDokumenLewatRetensi();
        $dataSimpanPinjam['dataMemasukiRetensi'] = self::model('Global/GlobalModel')->panggilDokumenMemasukiRetensi();
        $dataSimpanPinjam['dataJmlMemasukiRetensi'] = self::model('Global/GlobalModel')->panggilJmlDokumenMemasukiRetensi();
        $dataSimpanPinjam['dataTelambat'] = self::model('Global/GlobalModel')->panggilPeminjamanTerlambat();
        $dataSimpanPinjam['dataJmldataTelambat'] = self::model('Global/GlobalModel')->panggilJmlPeminjamanTerlambat();
        return $dataSimpanPinjam;
    }
}