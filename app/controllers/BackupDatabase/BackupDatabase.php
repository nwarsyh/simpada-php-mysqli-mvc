<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.19
 */
class BackupDatabase extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Admin | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulBackupDatabase'] = $this->model('BackupDatabase/BackupDatabaseModel')->GetJudulBackupDatabase();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('backupdatabase/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    // Backup ini juga bisa lewat tombol tanpa punay laman sendiri
    // kedepannya cukup pakei tombol backup
    public function startBackupDatabse()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "simpada";

        $tanggal = date('Y-m-d_His');
        $fileBackup = APPROOT . "/../public/database/simpada-{$tanggal}.sql";
        $fileBackupForAlert = addslashes($fileBackup);
        $fileBackupName = "simpada.sql";
        // pastikan folder ada
        if (!is_dir("public/database")) {
            mkdir("public/database", 0777, true);
        }

        $mysqldump = "C:/xampp/mysql/bin/mysqldump.exe";
        $command = "\"{$mysqldump}\" -h {$host} -u {$user} " .
            (!empty($pass) ? "-p{$pass}" : "") .
            " {$db} > {$fileBackup}";
        system($command, $output);
        if ($output === 0) {
            Flasher::setFlasherToast('Database : ' .$fileBackupName, 'Berhasil', 'DiBackup.', 'success');
        } else {
            Flasher::setFlasherToast('Database : ' .$fileBackupName, 'Gagal', 'DiBackup.', 'error');
        }

        header("Location: " . BASEURL . "/BackupDatabase");
        exit;
    }
}