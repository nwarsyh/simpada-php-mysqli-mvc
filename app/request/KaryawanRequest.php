<?php
class KaryawanRequest
{
    public static function createRequestKaryawan()
    {
        return [
            'nip_karyawan' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jk_karyawan' => 'required',
            'nomor_hp' => 'required',
            'email_karyawan' => 'required|email',
            'id_departemen' => 'required',
            'status_karyawan' => 'required',
            'tgl_masuk' => 'required|date',
            'profil_karyawan' => ''];
    }
    public static function updateRequestKaryawan()
    {
        return [
            'nip_karyawan' => '',
            'nama_depan' => '',
            'nama_belakang' => '',
            'jk_karyawan' => '',
            'nomor_hp' => '',
            'email_karyawan' => '',
            'id_departemen' => '',
            'status_karyawan' => '',
            'tgl_masuk' => '',
            'profil_karyawan' => ''];
    }
    public static function attributesRequestKaryawan()
    {
        return [
            'nip_karyawan' => 'NIP Karyawan',
            'nama_depan' => 'Nama Depan',
            'nama_belakang' => 'Nama Belakang',
            'jk_karyawan' => 'Jenis Kelamin',
            'nomor_hp' => 'Nomor HP',
            'email_karyawan' => 'Email Karyawan',
            'id_departemen' => 'Departemen',
            'status_karyawan' => 'Status Karyawan',
            'tgl_masuk' => 'Tanggal Masuk',
            'profil_karyawan' => 'Profil Karyawan'];
    }
}