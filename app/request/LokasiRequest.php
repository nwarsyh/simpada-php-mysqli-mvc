<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 22.57
 */
class LokasiRequest
{
    public static function createRequestLokasi()
    {
        return [
            'nomor_lemari' => 'required|number',
            'nomor_rak' => 'required|number',
            'nomor_box' => 'required|number',
            'warna_map' => 'required'];
    }
    public static function updateRequestLokasi()
    {
        return [
            'nomor_lemari' => '',
            'nomor_rak' => '',
            'nomor_box' => '',
            'warna_map' => ''];
    }
    public static function attributesRequestLokasi()
    {
        return [
            'nomor_lemari' => 'Nomor Lemari',
            'nomor_rak' => 'Nomor Rak',
            'nomor_box' => 'Nomor Box',
            'warna_map' => 'Warna Map'];
    }
}