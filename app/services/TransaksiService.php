<?php
class TransaksiService
{
    protected $TransasksiModel;
    public function __construct()
    {
        $this->TransasksiModel = new TransaksiModel();
    }
    public function updateKonfirmasiTransaksiService($updateKOnfirmasi)
    {
        $updateKonfirmasiTransaksiService = $this->TransasksiModel->ubahKonfirmasiTransaksi($updateKOnfirmasi);
        if ($updateKonfirmasiTransaksiService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Transaksi',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateKonfirmasiTransaksiService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Transaksi',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Transaksi',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function updateAktifTransaksiService($updateAktif)
    {
        $updateAktifTransaksiService = $this->TransasksiModel->ubahAktifTransaksi($updateAktif);
        if ($updateAktifTransaksiService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Transaksi',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateAktifTransaksiService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Transaksi',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Transaksi',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
}