<?php
class StaffModel extends BaseModel
{
    private $JudulStaff = 'Dashboard Staff';
    public function GetJudulStaff()
    {
        return $this->JudulStaff;
    }
}