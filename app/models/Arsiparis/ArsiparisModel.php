<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/06/2026
 * Time: 16.08
 */
class ArsiparisModel extends BaseModel
{
    private $JudulArsiparis = 'Dashboard Arsiparis';
    public function GetJudulArsiparis()
    {
        return $this->JudulArsiparis;
    }
}