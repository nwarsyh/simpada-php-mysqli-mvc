<?php
class AccountGlobal
{
    public static function model($modelpath)
    {
        $path = MODEL_PATH . $modelpath . '.php';
        require_once $path;
        $parts = explode('/', $modelpath);
        $clasName = end($parts);
        return new $clasName;
    }
    public static function load()
    {
        $dataSimpanPinjam = [];
        if (isset($_SESSION['id_accounts'])) {
            $dataSimpanPinjam['userAktifNow'] = self::model('SignIn/SignInModel')->panggilUserAktif($_SESSION['id_accounts']);
        }
        return $dataSimpanPinjam;
    }
}