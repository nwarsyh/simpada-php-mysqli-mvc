<?php
class IdentitasRequest
{
    public static function updateRequestIdentitas()
    {
        return [
            'nama_identitas' => '',
            'nama_company' => '',
            'alamat_company' => '',
            'kec_company' => '',
            'kab_kota_company' => '',
            'prov_company' => '',
            'kodepos_company' => '',
            'notelp_company' => '',
            'email_company' => '',
            'fax_company' => '',
            'logo_company' => ''];
    }
    public static function attributeRequestIdentitas()
    {
        return [
            'nama_identitas' => 'Nama Aplikasi',
            'nama_company' => 'Nama Perusahaan',
            'alamat_company' => 'Alamat Perusahaan',
            'kec_company' => 'Kecamatan',
            'kab_kota_company' => 'Kabupaten/Kota',
            'prov_company' => 'Provinsi',
            'kodepos_company' => 'Kode Pos',
            'notelp_company' => 'No Telp',
            'email_company' => 'Email',
            'fax_company' => 'Faximile',
            'logo_company' => 'Logo Perusahaan'];
    }
}