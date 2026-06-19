<?php
class ProfileRequest
{
    public static function updateteRequestProfil()
    {
        return [
            'namadepan' => '',
            'namabelakang' => '',
            'jeniskelamin' => '',
            'nohp' => '',
            'email' => ''];
    }
    public static function attributesRequestProfil()
    {
        return [
            'namadepan' => 'Nama Depan',
            'namabelakang' => 'Nama Belakang',
            'jeniskelamin' => 'Jenis Kelamin',
            'nohp' => 'Nomor HP',
            'email' => 'Email'];
    }
    public static function updateRequestPassword()
    {
        return [
            'username' => '',
            'password_lama' => 'required',
            'password' => 'required',
            'password_confirm' => 'required'];
    }
    public static function attributesRequestPassword()
    {
        return [
            'username' => 'Username',
            'password_lama' => 'Password Lama',
            'password' => 'Password Baru',
            'password_confirm' => 'Konfirmasi Password'];
    }
}