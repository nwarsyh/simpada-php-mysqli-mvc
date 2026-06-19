<?php
class DepartemenService
{
    protected $DepartemenModel;
    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
    }
    public function createDepartemenService($post)
    {
        $createDepartemenService = $this->DepartemenModel->tambahDataDepartemen($post);
        if (!$createDepartemenService) {
            return [
                'status' => false,
                'kategori' => 'Data Departemen',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Departemen',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updateDepartemenService($update)
    {
        $updateDepartemenService = $this->DepartemenModel->ubahDataDepartemen($update);
        if ($updateDepartemenService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Departemen',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateDepartemenService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Departemen',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Departemen',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function deleteDepartemenService($delete)
    {
        $deleteDepartemenService = $this->DepartemenModel->hapusDataDepartemen($delete);
        if (!$deleteDepartemenService) {

            return [
                'status' => false,
                'kategori' => 'Data Departemen',
                'message' => 'Gagal Dihapus',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Departemen',
            'message' => 'Berhasil Dihapus',
            'type' => 'success'
        ];
    }
}