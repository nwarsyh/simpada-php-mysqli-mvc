<?php
class DokumenRequest
{
    public static function createRequestDokumen()
    {
        return [
            'kode_dokumen' => 'required',
            'nomor_dokumen' => 'required',
            'nama_dokumen' => 'required',
            'kategori_dokumen' => 'required',
            'pengelola_dokumen' => 'required',
            'lokasi_dokumen' => 'required',
            'tanggal_retensi_dokumen' => 'required|date',
            'tanggal_awal_dokumen' => 'required|date',
            'status_dokumen' => 'required',
            'prov_dokumen' => 'required',
            'kabkota_dokumen' => 'required',
            'kec_dokumen' => 'required',
            'kel_dokumen' => 'required',
            'jumlah_dokumen' => 'required|number',
            'lampiran_dokumen' => '',
            'deskripsi_dokumen' => ''];
    }
    public static function updateRequestDokumen()
    {
        return [
            'kode_dokumen' => '',
            'nomor_dokumen' => '',
            'nama_dokumen' => '',
            'kategori_dokumen' => '',
            'pengelola_dokumen' => '',
            'lokasi_dokumen' => '',
            'tanggal_retensi_dokumen' => '',
            'tanggal_awal_dokumen' => '',
            'status_dokumen' => '',
            'prov_dokumen' => '',
            'kabkota_dokumen' => '',
            'kec_dokumen' => '',
            'kel_dokumen' => '',
            'jumlah_dokumen' => '',
            'lampiran_dokumen' => '',
            'deskripsi_dokumen' => ''];
    }
    public static function attributesRequestDokumen()
    {
        return [
            'kode_dokumen' => 'Kode Dokumen',
            'nomor_dokumen' => 'Nomor Dokumen',
            'nama_dokumen' => 'Nama Dokumen',
            'kategori_dokumen' => 'Kategori Dokumen',
            'pengelola_dokumen' => 'Unit Pengelola',
            'lokasi_dokumen' => 'Lokasi Dokumen',
            'tanggal_retensi_dokumen' => 'Tanggal Retensi',
            'tanggal_awal_dokumen' => 'Tanggal Masuk Dokumen',
            'status_dokumen' => 'Status Dokumen',
            'prov_dokumen' => 'Provinsi',
            'kabkota_dokumen' => 'Kabupaten/Kota',
            'kec_dokumen' => 'Kecamatan',
            'kel_dokumen' => 'Kelurahan',
            'jumlah_dokumen' => 'Jumlah Dokumen',
            'lampiran_dokumen' => 'Lampiran Dokumen',
            'deskripsi_dokumen' => 'Deksripsi Dkumen'];
    }
}