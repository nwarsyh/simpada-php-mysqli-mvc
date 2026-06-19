<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.51
 */

 /**
  * session start yang di file config.php biar lebih general, dengan skripnya yaitu :
  * session_name("APP_A_SESSID");
  * Kasih nama session unik untuk aplikasi,
  * contoh ubah jadi APP_APLIKASI_RSP_SESSID dll*/

if (session_status() === PHP_SESSION_NONE) {
    session_name("SIMPAN_PINJAM_DOKUMEN_DAN_PENGARSIPAN");
    session_start();
}
date_default_timezone_set('Asia/Jakarta');
define('BASEURL', 'http://localhost/project_mvc/simpada');
/**
 * BASEURL → untuk browser (href, src)
 */

define('BASE_PATH', dirname(__DIR__, 2));
/**
 * BASE_PATH → path folder server
 */
define('ASSET_PATH', BASE_PATH . '/assets');
/**
 * untuk PHP/file system
 * ASSET_PATH → akses file via PHP (include, move_uploaded_file, dll)
 * Dipakai PHP untuk akses file server lokal.
 * Contoh:
 * 1. require_once ASSET_PATH . '/config/data.php'; atau:
 * 2. file_get_contents(ASSET_PATH . '/json/data.json');*/

/**
 * untuk browser
 */
define('ASSET_URL', BASEURL . '/assets');
/**
 * <link rel="stylesheet" href="<?= ASSET_URL/css/style.css">
 * <link rel="stylesheet" href="<?= ASSET_URL/bootstrap/css/bootstrap.min.css">
 * <script src="<?= ASSET_URL/bootstrap/js/bootstrap.bundle.min.js"></script>
 * <img src="<?= ASSET_URL/img/logo.png">
 */

/**
 * server lokal
 */
define('DB_HOST', 'localhost');
/**
 * username default xampp
 */
define('DB_USER', 'root');
/**
 * password default xampp
 */
define('DB_PASS', '');
/**
 * nama database
 */
define('DB_NAME', 'simpada');