<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.16
 */
class StaffModel extends BaseModel
{
    private $JudulStaff = 'Dashboard Staff';
    public function GetJudulStaff()
    {
        return $this->JudulStaff;
    }
}