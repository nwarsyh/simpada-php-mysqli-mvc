<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/06/2026
 * Time: 02.25
 */
class IdentitasService
{
    protected $IdentitasModel;

    public function __construct()
    {
        $this->IdentitasModel = new IdentitasModel();
    }
    public function updateIdentitasService($update)
    {
        $profilIdentitasLama = $_POST['logo_company_lama'];
        $profilIdentitasBaru =
            UpdateMedia('logo_company',
                'public/media/profilaplikasi',
                $profilIdentitasLama);
        if (!$profilIdentitasBaru['status']) {
            /**return $profilIdentitas;*/
            return [
                'status' => false,
                'kategori' => 'Data Identitas',
                'message' => $profilIdentitasBaru['message'],
                'type' => 'error'

            ];
        }
        $update['logo_company'] = $profilIdentitasBaru['dokumen'];
        $updateIdentitasService = $this->IdentitasModel->ubahDataIdentitas($update);
        if ($updateIdentitasService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Identitas',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }

        if ($updateIdentitasService === 0) {

            return [
                'status' => false,
                'kategori' => 'Data Identitas',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Identitas',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
}