<?php
class Errors extends Controller
{
    public function errors()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Error 404';
        $dataSimpanPinjam['SubJudulBackupDatabase'] = $this->model('BackupDatabase/BackupDatabaseModel')->GetJudulBackupDatabase();
        $this->view('errors/error404', $dataSimpanPinjam);
    }
}