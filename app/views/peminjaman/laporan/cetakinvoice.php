<?php
// saat ini upload project ke gituhub via web, jadi saya tidak mengupload library TCPDF karena ukuran lumayan besar
// untuk cetak dokumen mohon download dulu library TCPDF : https://tcpdf.org/
// setelah itu sesuaikan requirenya dnegan direktory tempat simpan library TCPDF
require_once ASSET_PATH . '/vendor/TCPDF-main/tcpdf.php';
$KopSurat =  $dataSimpanPinjam['JudulWeb'] ;
$pdf = new TCPDF();
$pdf->AddPage('P', 'A4');
$pdf->SetMargins(5, 5, 5);
$pdf->Image(BASEURL . '/public/media/profilaplikasi/' . $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'], 15, 15, 25, 25, '', '', '',false);
$pdf->SetFont('DejaVu Sans', 'B', 18);
$pdf->SetXY(20, 12);
$pdf->Cell(0, 8, strtoupper($dataSimpanPinjam['dataIdentitas']['nama_perusahaan']), 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 9);
$pdf->Cell(0, 5, $dataSimpanPinjam['dataIdentitas']['alamat_perusahaan']. ', ' . $dataSimpanPinjam['dataIdentitas']['nama_kelurahan'], 0, 1, 'C');
$pdf->Cell(0, 5, $dataSimpanPinjam['dataIdentitas']['nama_kecamatan'] . ', ' . $dataSimpanPinjam['dataIdentitas']['nama_kabupaten'] . ', '. $dataSimpanPinjam['dataIdentitas']['nama_provinsi']. ' '. $dataSimpanPinjam['dataIdentitas']['kodepos_identitas'], 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 9);
$pdf->Cell(0, 5, 'Telepon : ' . $dataSimpanPinjam['dataIdentitas']['notelp_perusahaan'], 0, 1, 'C');
$pdf->Cell(0, 5, 'Email : ' . $dataSimpanPinjam['dataIdentitas']['email_perusahaan'] . ' | Fax : ' . $dataSimpanPinjam['dataIdentitas']['fax_perusahaan'], 0, 1, 'C');
$pdf->Line(10, 45, 290, 45);
$TanggalCetak = FormatDate(date('Y-m-d'));
$JudulInvoice = 'Berikut Invoice Peminjaman Anda';
$Lampiran = 'Laporan Peminjaman Arsip Dari : ';
$Batas = ' s/d ';
$Koma = ', ';
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Ln(10);
$pdf->Cell(0, 0, $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']. $Koma .$TanggalCetak, 0, 1, 'R');
$pdf->SetFont('DejaVu Sans', 'BU', 14);
$pdf->Ln(5);
$pdf->Cell(0, 10, 'INVOICE PEMINJAMAN DOKUMEN', 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Ln(5);
$pdf->MultiCell(0, 5, $JudulInvoice, 0, 'L');
$pdf->Ln(2);
$pdf->SetFont('DejaVu Sans', '', 10);
$DataPeminjaman = '
<table border="0" cellpadding="4">
    <tr>
        <td width="37%">NIP Karyawan</td>
        <td width="3%">:</td>
        <td width="60%">'.$this->GlobalData['userAktifNow']['nip_karyawan'].'</td>
    </tr>
    <tr>
        <td>nama Karyawan</td>
        <td>:</td>
        <td>'.$this->GlobalData['userAktifNow']['nama_depan_karyawan'].' '.$this->GlobalData['userAktifNow']['nama_belakang_karyawan'].'</td>
    </tr>
    <tr>
        <td>Nomor Dokumen</td>
        <td>:</td>
        <td>'.  $dataSimpanPinjam['dataInvoice']['nomor_dokumen'] .'</td>
    </tr>
    <tr>
        <td>Nama Dan Kode Dokumen</td>
        <td>:</td>
        <td>'.  $dataSimpanPinjam['dataInvoice']['nama_dokumen'] .' ('.  $dataSimpanPinjam['dataInvoice']['kode_dokumen'] .')</td>
    </tr>
    <tr>
        <td>Pengelola Dokumen</td>
        <td>:</td>
        <td>'. $dataSimpanPinjam['dataInvoice']['nama_departemen'] .'</td>
    </tr>
    <tr>
        <td>Kategori Dokumen</td>
        <td>:</td>
        <td>'. $dataSimpanPinjam['dataInvoice']['nama_kategori'] .'</td>
    </tr>
    <tr>
        <td>Lokasi Dokumen</td>
        <td>:</td>
        <td>Lemari No. '. $dataSimpanPinjam['dataInvoice']['nomor_lemari'] .' |
        Lemari No. '. $dataSimpanPinjam['dataInvoice']['nomor_rak'] .' |
        Lemari No. '. $dataSimpanPinjam['dataInvoice']['nomor_box'] .' |
        Rak No. '. $dataSimpanPinjam['dataInvoice']['warna_map'] .'</td>
    </tr>
    <tr>
        <td>Wilayah Dokumen</td>
        <td>:</td>
        <td>'. $dataSimpanPinjam['dataInvoice']['provinsi_dokumen'] .', 
        '. $dataSimpanPinjam['dataInvoice']['kabkota_dokumen'] .', 
        '. $dataSimpanPinjam['dataInvoice']['kecamatan_dokumen'] .', 
        '. $dataSimpanPinjam['dataInvoice']['kelurahan_dokumen'] .'</td>
    </tr>
    <tr>
        <td>Tanggal Peminjaman</td>
        <td>:</td>
        <td>'. FormatDate($dataSimpanPinjam['dataInvoice']['tgl_peminjaman']) .'</td>
    </tr>
    <tr>
        <td>Tanggal Rencana Pengembalian</td>
        <td>:</td>
        <td>'. FormatDate($dataSimpanPinjam['dataInvoice']['tgl_rencana_pengembalian']) .'</td>
    </tr>
    <tr>
        <td>Tanggal Pengembalian</td>
        <td>:</td>
        <td>'. FormatDate($dataSimpanPinjam['dataInvoice']['tgl_pengembalian']) .'</td>
    </tr>
    <tr>
        <td>Catatan Peminjaman</td>
        <td>:</td>
        <td>'. $dataSimpanPinjam['dataInvoice']['catatan_peminjaman'] .'</td>
    </tr>
    <tr>
        <td>Status Peminjaman</td>
        <td>:</td>
        <td>'. $dataSimpanPinjam['dataInvoice']['status_peminjaman'] .'</td>
    </tr>
</table>';
$pdf->writeHTML($DataPeminjaman, true, false, false, false, '');
$pdf->Ln(20); // kasih jarak ke bawah
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Cell(0, 6, $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']. $Koma . $TanggalCetak, 0, 1, 'R');
$pdf->Ln(25);
$pdf->SetFont('DejaVu Sans', 'BU', 10); // B=Bold, U=Underline
$pdf->Cell(0, 6, $this->GlobalData['userAktifNow']['nama_depan_karyawan'] .$this->GlobalData['userAktifNow']['nama_belakang_karyawan'] , 0, 1, 'R');
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Cell(0, 6, $this->GlobalData['userAktifNow']['nip_karyawan'], 0, 1, 'R');
$pdf->Output('Invoice_Peminjaman' . $TanggalCetak . '.pdf', 'I');