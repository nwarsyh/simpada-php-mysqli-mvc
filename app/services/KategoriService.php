<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 22.25
 */
class KategoriService
{
    protected $KategoriModel;
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();
    }
    public function createKategoriService($post)
    {
        $createKategoriService = $this->KategoriModel->tambahDataKategori($post);
        if (!$createKategoriService) {
            return [
                'status' => false,
                'kategori' => 'Data Kategori',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Kategori',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updateKategoriService($update)
    {
        $updateKategoriService = $this->KategoriModel->ubahDataKategori($update);
        if ($updateKategoriService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Kategori',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateKategoriService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Kategori',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Kategori',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function deleteKategoriService($delete)
    {
        $deleteKategoriService = $this->KategoriModel->hapusDataKategori($delete);
        if (!$deleteKategoriService) {

            return [
                'status' => false,
                'kategori' => 'Data Kategori',
                'message' => 'Gagal Dihapus',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Kategori',
            'message' => 'Berhasil Dihapus',
            'type' => 'success'
        ];
    }
}