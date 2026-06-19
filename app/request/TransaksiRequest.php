<?php

/**
 * Created by PhpStorm.
 * User: Anwarsyah
 * Date: 11/06/2026
 * Time: 15:25
 */
class TransaksiRequest
{
    public static function updateRequestKonfirmasiTransaksi()
    {
        return [
            'status_peminjaman' => 'required',
            'catatan_konfirmasi' => 'required'];
    }
    public static function attributesRequestKonfirmasiTransaksi()
    {
        return [
            'status_peminjaman' => 'Status',
            'catatan_konfirmasi' => 'Catatan Konfirmasi'];
    }
    public static function updateRequestAktifTransaksi()
    {
        return [
            'status_peminjaman' => 'required',
            'tgl_kembali' => 'required|date',
            'catatan_konfirmasi' => ''];
    }
    public static function attributesRequestAktifTransaksi()
    {
        return [
            'status_peminjaman' => 'Status',
            'tgl_kembali' => 'Tanggal Kembali',
            'catatan_konfirmasi' => 'Catatan Konfirmasi'];
    }
}