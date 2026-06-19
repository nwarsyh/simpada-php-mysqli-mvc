<?php
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
        $this->GlobalData['customJs'] = [];
    }
}