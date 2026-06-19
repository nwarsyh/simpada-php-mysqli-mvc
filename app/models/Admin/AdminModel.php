<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.16
 */
class AdminModel extends BaseModel
{
    private $JudulAdmin = 'Dashboard Admin';
    public function GetJudulAdmin()
    {
        return $this->JudulAdmin;
    }
}