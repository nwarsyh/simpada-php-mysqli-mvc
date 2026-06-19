<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/06/2026
 * Time: 14.51
 */
class DokumenService
{
    protected $DokumenModel;

    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
    }
    public function createDokumenService($post)
    {
        $lampiranDokumen = UploadMedia('lampiran_dokumen', 'public/media/dokumen',
            MAX_DOCUMENT_SIZE,
            ALLOW_DOCUMENT);
        if (!$lampiranDokumen['status']) {
            return [
                'status' => false,
                'kategori' => 'Data Karyawan',
                'message' => $lampiranDokumen['message'],
                'type' => 'error'
            ];
        }
        $post['lampiran_dokumen'] = $lampiranDokumen['dokumen'];
        $createDokumenService = $this->DokumenModel->tambahDataDokumen($post);
        if (!$createDokumenService) {

            return [
                'status' => false,
                'kategori' => 'Data Dokumen',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Dokumen',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
    public function updateDokumenService($update)
    {
        $lampiranDokumenLama = $_POST['lampiran_dokumen_lama'];
        $lampiranDokumenbaru = UpdateMedia('lampiran_dokumen', 'public/media/dokumen', $lampiranDokumenLama,
            MAX_DOCUMENT_SIZE, ALLOW_DOCUMENT);
        if (!$lampiranDokumenbaru['status']) {
            /**return $profilKaryawan;*/
            return [
                'status' => false,
                'kategori' => 'Data Dokumen',
                'message' => $lampiranDokumenbaru['message'],
                'type' => 'error'

            ];
        }
        $update['lampiran_dokumen'] = $lampiranDokumenbaru['dokumen'];
        $updateDokumenService = $this->DokumenModel->ubahDataDokumen($update);
        if ($updateDokumenService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Dokumen',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($updateDokumenService === 0) {

            return [
                'status' => false,
                'kategori' => 'Data Dokumen',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Dokumen',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function deleteDokumenService($delete)
    {

    }
}