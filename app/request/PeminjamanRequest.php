<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/06/2026
 * Time: 22.14
 */
class PeminjamanRequest
{
    public static function createRequestLokasi()
    {
        return [
            'dokumenInput' => '',
            'tanggal_rencana_kembali' => 'required|date',
            'catatan_peminjaman' => ''];
    }
    public static function updateRequestLokasi()
    {
        return [
            'dokumenInput' => '',
            'tanggal_rencana_kembali' => '',
            'catatan_peminjaman' => ''];
    }
    public static function attributesRequestLokasi()
    {
        return [
            'dokumenInput' => 'Nomor Dokumen',
            'tanggal_rencana_kembali' => 'Tanggal Rencana Pengembalian',
            'catatan_peminjaman' => 'Catatan Peminjaman'];
    }
}