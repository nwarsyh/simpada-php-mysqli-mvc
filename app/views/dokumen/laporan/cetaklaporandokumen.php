<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/06/2026
 * Time: 21.54
 */
require_once ASSET_PATH . '/vendor/TCPDF-main/tcpdf.php';
$KopSurat =  $dataSimpanPinjam['JudulWeb'] ;
$pdf = new TCPDF();
// Menggunakan orientasi Landscape ('L') dan ukuran A4
$pdf->AddPage('L', 'A4');
// $pdf->AddPage();
// Mengatur margin kiri, atas, dan kanan (dalam milimeter)
$pdf->SetMargins(5, 5, 5);

// LOGO
$pdf->Image(
    BASEURL . '/public/media/profilaplikasi/' . $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'],
    15, 15, 25, 25, '', '', '',false);
// NAMA PERUSAHAAN
$pdf->SetFont('DejaVu Sans', 'B', 18);

$pdf->SetXY(20, 12);

$pdf->Cell(0, 8,
    strtoupper($dataSimpanPinjam['dataIdentitas']['nama_perusahaan']), 0, 1, 'C');
// ALAMAT
$pdf->SetFont('DejaVu Sans', '', 10);

$pdf->Cell(0, 5,
    $dataSimpanPinjam['dataIdentitas']['alamat_perusahaan'].
    ', ' . $dataSimpanPinjam['dataIdentitas']['nama_kelurahan'], 0, 1, 'C');
$pdf->Cell(0, 5,
    $dataSimpanPinjam['dataIdentitas']['nama_kecamatan'] .
    ', ' . $dataSimpanPinjam['dataIdentitas']['nama_kabupaten'] .
    ', '. $dataSimpanPinjam['dataIdentitas']['nama_provinsi'].
    ' '. $dataSimpanPinjam['dataIdentitas']['kodepos_identitas'],
    0, 1, 'C');
// TELEPON + EMAIL
$pdf->SetFont('DejaVu Sans', '', 9);
$pdf->Cell(0, 5,
    'Telepon : ' . $dataSimpanPinjam['dataIdentitas']['notelp_perusahaan'], 0, 1, 'C');
$pdf->Cell(0, 5,
    'Email : ' . $dataSimpanPinjam['dataIdentitas']['email_perusahaan'] .
    ' | Fax : ' . $dataSimpanPinjam['dataIdentitas']['fax_perusahaan'], 0, 1, 'C');
// GARIS
//itungan garis dari kiri,atas kiri, dari kanan, atas kanan
$pdf->Line(10, 45, 290, 45);
//bagian bawah kop
// Judul Surat
$TanggalCetak = FormatDate(date('Y-m-d'));
$TglAwal = $_GET['tgl_awal_lapdokumen'] ?? null;
$TglAkhir = $_GET['tgl_akhir_lapdokumen'] ?? null;
$Lampiran = 'Laporan Arsip Digital Dari : ';
$Batas = ' s/d ';
$Koma = ', ';
// $pdf->SetFont('DejaVu Sans', '', 10); jenis font dan ukuran
$pdf->SetFont('DejaVu Sans', '', 10);
// $pdf->Ln(50); ini batas dari atas
$pdf->Ln(10);
//angka untuk basas dari kanan, atas, kiri
$pdf->Cell(0, 0, $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']. $Koma .$TanggalCetak, 0, 1, 'R');
//BU berarti bold underline
$pdf->SetFont('DejaVu Sans', 'BU', 14);
$pdf->Ln(5);
$pdf->Cell(0, 10, 'LAPORAN PENGELOAAN ARSIP', 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Ln(5);
$pdf->MultiCell(0, 5, $Lampiran .FormatDate($TglAwal) .$Batas .FormatDate($TglAkhir), 0, 'L');
$pdf->Ln(2);
$pdf->SetFont('DejaVu Sans', '', 8);

//Laporan
$IsiLaporanDataArsip = '';
$No = 1;
// var_dump($dataSimpanPinjam['dataLaporanDokumen']);
foreach ($dataSimpanPinjam['dataLaporanDokumen'] as $dataArsip){
    $IsiLaporanDataArsip .= '
    <tr>
    <td>'. $No++ .'</td>
        <td>'. $dataArsip['nomor_dokumen'] .'</td>
        <td>('. $dataArsip['kode_dokumen'] .')'. $dataArsip['nama_dokumen'] .'</td>
        <td>'. $dataArsip['nama_departemen'] .'</td>
        <td>'. $dataArsip['nama_kategori'] .'</td>
        <td>Lemari No. '. $dataArsip['nomor_lemari'] .' -
            Ral No. '. $dataArsip['nomor_rak'] .' - 
            Box No. '. $dataArsip['nomor_box'] .' - 
            Map Warna. '. $dataArsip['warna_map'] .'</td>
        <td>Provinsi : '. $dataArsip['provinsi_dokumen'] .'<br>
            Kabupaten/Kota : '. $dataArsip['kabkota_dokumen'] .'<br>
            Kecamatan : '. $dataArsip['kecamatan_dokumen'] .'<br>
            Kelurahan/Desa : '. $dataArsip['kelurahan_dokumen'] .'</td>
        
        <td>'. $dataArsip['jumlah_dokumen'] .'</td>
        <td>'. FormatDate($dataArsip['tgl_awal_dokumen']) .'<br> s/d
            '. FormatDate($dataArsip['tgl_retensi_dokumen']) .'</td>
        <td>'. $dataArsip['status_dokumen'] .'</td>
</tr>
    ';
}
$JudulLaporan = '
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th width="3%">No</th>
        <th width="13%">Nomor <br>Dokumen</th>
        <th width="11%">Nama <br>Dokumen</th>
        <th width="10%">Pengelola <br>Dokumen</th>
        <th width="10%">Kategori <br>Dokumen</th>
        <th width="13%">Lokasi <br>Dokumen</th>
        <th width="20%">Wilayah Dokumen</th>
        <th width="3%">Qty</th>
        <th width="10%">Tanggal Retensi</th>
        <th width="7%">Status Dokumen</th>
    </tr>
    ' . $IsiLaporanDataArsip . '

</table>
';
$pdf->writeHTML($JudulLaporan, true, false, false, false, '');
// bagian ttd kanan bawah
// --- Spasi sebelum tanda tangan ---
$pdf->Ln(20); // kasih jarak ke bawah

// --- Tanggal & Tempat (rata kanan) ---
$pdf->SetFont('DejaVu Sans', '', 11);
$pdf->Cell(0, 6, $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']. $Koma . $TanggalCetak, 0, 1, 'R');

// --- Spasi untuk tanda tangan ---
$pdf->Ln(25);

// --- Nama (Bold + Underline) ---
$pdf->SetFont('DejaVu Sans', 'BU', 11); // B=Bold, U=Underline
$pdf->Cell(0, 6, $this->GlobalData['userAktifNow']['nama_depan_karyawan'] .$this->GlobalData['userAktifNow']['nama_belakang_karyawan'] , 0, 1, 'R');

// --- NIP / Kode / Jabatan ---
$pdf->SetFont('DejaVu Sans', '', 11);
$pdf->Cell(0, 6, $this->GlobalData['userAktifNow']['nip_karyawan'], 0, 1, 'R');



// Output PDF
// Pilihan mode:
// "I" → Inline, langsung ditampilkan/preview di browser (default).
// "D" → Force Download (langsung muncul dialog save).
// "F" → Save ke file di server.
// "S" → Return string berisi konten PDF (misalnya untuk attach email).
$pdf->Output('Laporan_Arsip' . $TanggalCetak . '.pdf', 'I');