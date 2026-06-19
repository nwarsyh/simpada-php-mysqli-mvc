<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 16.56
 */
class SignInRequest
{
    public static function createRequestRegister()
    {
        return [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'username' => 'required',
            'password_awal' => 'required',
            'password_ulang' => 'required'];
    }
    public static function attributesRequestRegister()
    {
        return [
            'nama_depan' => 'Nama Depan',
            'nama_belakang' => 'Nama Belakang',
            'username' => 'Username',
            'password_awal' => 'Password',
            'password_ulang' => 'Konfirmasi Passowrd'];
    }
    public static function createRequestSignIn()
    {
        return [
            'username' => 'required',
            'password_awal' => 'required'];
    }
    public static function attributesRequestSignIn()
    {
        return [
            'username' => 'Username',
            'password_awal' => 'Password'];
    }
}