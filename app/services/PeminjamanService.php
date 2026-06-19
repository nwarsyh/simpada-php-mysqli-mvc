<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/06/2026
 * Time: 22.26
 */
class PeminjamanService
{
    protected $PeminjamanModel;
    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
    }
    public function createPeminjamanService($post)
    {
        $createPeminjamanService = $this->PeminjamanModel->tambahDataPeminjaman($post);
        if (!$createPeminjamanService) {
            return [
                'status' => false,
                'kategori' => 'Data Peminjaman',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Peminjaman',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updatePeminjamanService($update)
    {

    }
    public function deletePeminjamanService($delete)
    {
        $deletePeminjamanService = $this->PeminjamanModel->hapusDataPeminjaman($delete);
        if (!$deletePeminjamanService) {

            return [
                'status' => false,
                'kategori' => 'Data Peminjaman',
                'message' => 'Gagal Dihapus',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Peminjaman',
            'message' => 'Berhasil Dihapus',
            'type' => 'success'
        ];
    }
}