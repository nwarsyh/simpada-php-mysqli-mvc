<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.54
 */
class Authentication
{
    /**
     * class AuthMiddleware jangan static,
     * contoh : public static function handle()
     * karena di PHP tertentu bisa jalan, tapi konsepnya jadi campur.
     *
     * Pilih salah satu.
     * Kalau semua middleware mau dipanggil dengan object:
     * lebih konsisten.*/
    public function handle()
    {
        if (!isset($_SESSION['loginsistem'])) {
            header("Location: " . BASEURL . "/SignIn");
            exit;
        }
    }
}