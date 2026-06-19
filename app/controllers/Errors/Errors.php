<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.19
 */
class Errors extends Controller
{
    public function errors()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Admin | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulBackupDatabase'] = $this->model('BackupDatabase/BackupDatabaseModel')->GetJudulBackupDatabase();
        $this->view('errors/error404', $dataSimpanPinjam);
    }
}