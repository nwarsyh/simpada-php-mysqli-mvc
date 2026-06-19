<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.16
 */
class BackupDatabaseModel extends BaseModel
{
    private $JudulBackupDatabase = 'Backup Database';
    public function GetJudulBackupDatabase()
    {
        return $this->JudulBackupDatabase;
    }
}