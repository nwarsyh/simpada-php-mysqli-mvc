<?php
class KategoriRequest
{
    public static function createRequestKategori()
    {
        return [
            'nama_kategori' => 'required',
            'kode_kategori' => 'required'];
    }
    public static function updateRequestKategori()
    {
        return [
            'nama_kategori' => '',
            'kode_departemen' => ''];
    }
    public static function attributesRequestKategori()
    {
        return [
            'nama_kategori' => 'Nama Kategori',
            'kode_kategori' => 'Kode Kategori'];
    }
}