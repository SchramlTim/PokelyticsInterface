<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class NextMigrationData extends Model
{
    function __construct()
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
    }

    public function getNextMigrationUnixtime()
    {
        $oResult = mysqli_query($this->conn, 'SELECT last_nest_migration FROM NestCountdown');
        $aRow = mysqli_fetch_assoc($oResult);
        $iNestMigrationTime = $aRow['last_nest_migration'];
        return $iNestMigrationTime;
    }
}