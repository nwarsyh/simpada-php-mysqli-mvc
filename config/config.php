<?php
if (session_status() === PHP_SESSION_NONE) {
    session_name("SIMPADA");
    session_start();
}
date_default_timezone_set('Asia/Jakarta');
define('BASEURL', 'http://localhost/githubanwar/simpada'); //hapus saat digithubgithubanwar
define('BASE_PATH', dirname(__DIR__, 2));
define('ASSET_PATH', BASE_PATH . '/assets');
define('ASSET_URL', BASEURL . '/assets');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'simpada');