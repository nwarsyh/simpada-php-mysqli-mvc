<?php
class KaryawanService
{
    protected $KaryawanModel;
    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }
    public function createKaryawanService($post)
    {
        $profilKaryawan = UploadMedia('profil_karyawan', 'public/media/profil');
        if (!$profilKaryawan['status']) {
            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => $profilKaryawan['message'],
                'type' => 'error'
            ];
        }
        $post['profil_karyawan'] = $profilKaryawan['dokumen'];
        $createKaryawanService = $this->KaryawanModel->tambahDataKaryawan($post);
        if (!$createKaryawanService) {

            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Karyawan',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updateKaryawanService($Update)
    {
        $profilKaryawanLama = $_POST['profil_karyawan_lama'];
        $profilKaryawanBaru = UpdateMedia('profil_karyawan', 'public/media/profil', $profilKaryawanLama);
        if (!$profilKaryawanBaru['status']) {
            /**return $profilKaryawan;*/
            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => $profilKaryawanBaru['message'],
                'type' => 'error'
            ];
        }
        $Update['profil_karyawan'] = $profilKaryawanBaru['dokumen'];
        $updateKaryawanService = $this->KaryawanModel->ubahDataKaryawan($Update);
        if ($updateKaryawanService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateKaryawanService === 0) {

            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Karyawan',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function deleteKaryawanService($delete)
    {
        $profilKaryawan = $this->KaryawanModel->panggilProfilKaryawan($delete);
        DeleteMedia($profilKaryawan['foto_profil_karyawan'], 'public/media/profil');
        $deleteKaryawanService = $this->KaryawanModel->hapusDataKaryawan($delete);
        if (!$deleteKaryawanService) {
            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => 'Gagal Dihapus',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Karyawan',
            'message' => 'Berhasil Dihapus',
            'type' => 'success'
        ];
    }
}