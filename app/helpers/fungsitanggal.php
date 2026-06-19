<?php
function FormatDate($tanggal) {
    $bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    if ($tanggal && $tanggal != '0000-00-00') {
        $pecah = explode('-', $tanggal);
        return (int)$pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    } else {
        return '-';
    }
}
function FormatDateTime($datetime) {
    $bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    if ($datetime && $datetime != '0000-00-00 00:00:00') {
        [$tgl, $waktu] = explode(' ', $datetime);
        $pecah = explode('-', $tgl);
        return (int)$pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0] . ' ' . $waktu;
    } else {
        return '-';
    }
}
function FormatDateTimeShort($datetime) {
    $bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    if ($datetime && $datetime != '0000-00-00 00:00:00') {
        [$tgl, $waktu] = explode(' ', $datetime);
        [$jam, $menit] = explode(':', $waktu);
        $pecah = explode('-', $tgl);
        return (int)$pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0] . ' ' . $jam . ':' . $menit;
    } else {
        return '-';
    }
}
