<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 23.12
 */
class LokasiService
{
    protected $LokasiModel;
    public function __construct()
    {
        $this->LokasiModel = new LokasiModel();
    }
    public function createLokasiService($post)
    {
        $createLokasiService = $this->LokasiModel->tambahDataLokasi($post);
        if (!$createLokasiService) {
            return [
                'status' => false,
                'kategori' => 'Data Lokasi',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Lokasi',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updateLokasiService($update)
    {
        $updateLokasiService = $this->LokasiModel->ubahDataLokasi($update);
        if ($updateLokasiService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Lokasi',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateLokasiService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Lokasi',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Lokasi',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function deleteLokasiService($delete)
    {
        $deleteLokasiService = $this->LokasiModel->hapusDataLokasi($delete);
        if (!$deleteLokasiService) {

            return [
                'status' => false,
                'kategori' => 'Data Lokasi',
                'message' => 'Gagal Dihapus',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Lokasi',
            'message' => 'Berhasil Dihapus',
            'type' => 'success'
        ];
    }

}