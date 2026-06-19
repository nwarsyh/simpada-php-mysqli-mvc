<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 19.38
 */
class DepartemenRequest
{
    public static function createRequestDepartemen()
    {
        return [
            'nama_departemen' => 'required',
            'kode_departemen' => 'required'];
    }
    public static function updateRequestDepartemen()
    {
        return [
            'nama_departemen' => '',
            'kode_departemen' => ''];
    }
    public static function attributesRequestDepartemen()
    {
        return [
            'nama_departemen' => 'Nama Departemen',
            'kode_departemen' => 'Kode Departemen'];
    }
}