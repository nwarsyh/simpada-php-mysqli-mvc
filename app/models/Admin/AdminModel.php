<?php
class AdminModel extends BaseModel
{
    private $JudulAdmin = 'Dashboard Admin';
    public function GetJudulAdmin()
    {
        return $this->JudulAdmin;
    }
}