<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */
class BaseController
{
    protected $GlobalData = [];
    public function __construct() {
        require_once GLOBAL_PATH . '/AccountGlobal.php';
        require_once GLOBAL_PATH . '/CardGlobal.php';
        require_once GLOBAL_PATH . '/NotifikasiGlobal.php';
        $this->GlobalData = array_merge(
            AccountGlobal::load(),
            CardGlobal::load(),
            NotifikasiGlobal::load()
        );
        /*ini buat js yang dipanggil diunit tertentur*/
        $this->GlobalData['customJs'] = [];
    }
}