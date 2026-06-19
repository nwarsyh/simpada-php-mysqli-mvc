<?php
// saat ini upload project ke gituhub via web, jadi saya tidak mengupload library TCPDF karena ukuran lumayan besar
// untuk cetak dokumen mohon download dulu library TCPDF : https://tcpdf.org/
// setelah itu sesuaikan requirenya dnegan direktory tempat simpan library TCPDF
require_once ASSET_PATH . '/vendor/TCPDF-main/tcpdf.php';
$KopSurat =  $dataSimpanPinjam['JudulWeb'] ;
$pdf = new TCPDF();
$pdf->AddPage('L', 'A4');
$pdf->SetMargins(5, 5, 5);
$pdf->Image(BASEURL . '/public/media/profilaplikasi/' . $dataSimpanPinjam['dataIdentitas']['logo_perusahaan'], 15, 15, 25, 25, '', '', '',false);
$pdf->SetFont('DejaVu Sans', 'B', 18);
$pdf->SetXY(20, 12);
$pdf->Cell(0, 8, strtoupper($dataSimpanPinjam['dataIdentitas']['nama_perusahaan']), 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Cell(0, 5, $dataSimpanPinjam['dataIdentitas']['alamat_perusahaan']. ', ' . $dataSimpanPinjam['dataIdentitas']['nama_kelurahan'], 0, 1, 'C');
$pdf->Cell(0, 5, $dataSimpanPinjam['dataIdentitas']['nama_kecamatan'] . ', ' . $dataSimpanPinjam['dataIdentitas']['nama_kabupaten'] . ', '. $dataSimpanPinjam['dataIdentitas']['nama_provinsi']. ' '. $dataSimpanPinjam['dataIdentitas']['kodepos_identitas'], 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 9);
$pdf->Cell(0, 5, 'Telepon : ' . $dataSimpanPinjam['dataIdentitas']['notelp_perusahaan'], 0, 1, 'C');
$pdf->Cell(0, 5, 'Email : ' . $dataSimpanPinjam['dataIdentitas']['email_perusahaan'] . ' | Fax : ' . $dataSimpanPinjam['dataIdentitas']['fax_perusahaan'], 0, 1, 'C');
$pdf->Line(10, 45, 290, 45);
$TanggalCetak = FormatDate(date('Y-m-d'));
$TglAwal = $_GET['tgl_awal_laptransaksi'] ?? null;
$TglAkhir = $_GET['tgl_akhir_laptransaksi'] ?? null;
$Lampiran = 'Laporan Transaksi Pinjama Dokumen : ';
$Batas = ' s/d ';
$Koma = ', ';
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Ln(10);
$pdf->Cell(0, 0, $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']. $Koma .$TanggalCetak, 0, 1, 'R');
$pdf->SetFont('DejaVu Sans', 'BU', 14);
$pdf->Ln(5);
$pdf->Cell(0, 10, 'LAPORAN TRANSAKSI PINJAMAN ARSIP', 0, 1, 'C');
$pdf->SetFont('DejaVu Sans', '', 10);
$pdf->Ln(5);
$pdf->MultiCell(0, 5, $Lampiran .FormatDate($TglAwal) .$Batas .FormatDate($TglAkhir), 0, 'L');
$pdf->Ln(2);
$pdf->SetFont('DejaVu Sans', '', 8);
$IsiLaporanTransaksi = '';
$No = 1;
foreach ($dataSimpanPinjam['dataTransaksi'] as $dataTransaksi){
    $IsiLaporanTransaksi .= '
    <tr>
    <td>'. $No++ .'</td>
        <td>'. $dataTransaksi['nip_karyawan'] .'</td>
        <td>'. $dataTransaksi['nama_depan_karyawan'] .''. $dataTransaksi['nama_belakang_karyawan'] .'</td>
        <td>'. $dataTransaksi['nomor_dokumen'] .'</td>
        <td>('. $dataTransaksi['kode_dokumen'] .')'. $dataTransaksi['nama_dokumen'] .'</td>
        <td>'. $dataTransaksi['nama_departemen'] .'</td>
        <td>'. $dataTransaksi['nama_kategori'] .'</td>
        <td>'. FormatDate($dataTransaksi['tgl_peminjaman']) .'</td>
        <td>'. FormatDate($dataTransaksi['tgl_rencana_pengembalian']) .'</td>
        <td>'. FormatDate($dataTransaksi['tgl_pengembalian']) .'</td>
        <td>'. $dataTransaksi['status_peminjaman'] .'</td>
</tr>';
}
$JudulLaporanTransaski = '
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th width="3%">No</th>
        <th width="10%">Nip <br>Karyawan</th>
        <th width="10%">Nama <br>Karyawan</th>
        <th width="10%">Nomor <br>Dokumen</th>
        <th width="10%">Nama <br>Dokumen</th>
        <th width="10%">Pengelola <br>Dokumen</th>
        <th width="10%">Kategori <br>Dokumen</th>
        <th width="10%">Tanggal<br>Peminjaman</th>
        <th width="10%">Tanggal<br>Rencana<br>Kembali</th>
        <th width="10%">Tangga<br>Pengembalian</th>
        <th width="7%">Status<br>Pinjamam</th>
    </tr>
    ' . $IsiLaporanTransaksi . '
</table>';
$pdf->writeHTML($JudulLaporanTransaski, true, false, false, false, '');
$pdf->Ln(20); // kasih jarak ke bawah
$pdf->SetFont('DejaVu Sans', '', 11);
$pdf->Cell(0, 6, $dataSimpanPinjam['dataIdentitas']['nama_kabupaten']. $Koma . $TanggalCetak, 0, 1, 'R');
$pdf->Ln(25);
$pdf->SetFont('DejaVu Sans', 'BU', 11); // B=Bold, U=Underline
$pdf->Cell(0, 6, $this->GlobalData['userAktifNow']['nama_depan_karyawan'] .$this->GlobalData['userAktifNow']['nama_belakang_karyawan'] , 0, 1, 'R');
$pdf->SetFont('DejaVu Sans', '', 11);
$pdf->Cell(0, 6, $this->GlobalData['userAktifNow']['nip_karyawan'], 0, 1, 'R');
$pdf->Output('Laporan_Transaksi' . $TanggalCetak . '.pdf', 'I');