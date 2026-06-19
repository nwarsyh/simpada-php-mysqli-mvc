<?php
class BaseModel
{
    protected $Database;
    public function __construct()
    {
        $this->Database = new Database();
    }
}