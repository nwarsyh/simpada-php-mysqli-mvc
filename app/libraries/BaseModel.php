<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 06/06/2026
 * Time: 15.55
 */
class BaseModel
{
    protected $Database;
    public function __construct()
    {
        $this->Database = new Database();
    }
}