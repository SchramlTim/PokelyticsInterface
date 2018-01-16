<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class MenuData extends Model
{
    function __construct()
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
        $this->aMenuStructur = [
            'Location' => 'website_locations_active',
            'Raids' => 'website_raids_active',
            'Gyms' => 'website_gyms_active',
            'Spawns' => 'website_spawns_active'
        ];
    }

    public function getMenuStructur()
    {
        $oResult = mysqli_query($this->conn, 'SELECT * FROM User WHERE active > 0 ORDER BY user_name ASC');
        $aPoints = [];
        $aLocations = [];
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aLocations[] = [
                'name' => $aRow['user_name'],
                'bot_pokemon_active' => $aRow['bot_pokemon_active'],
                'bot_raid_active' => $aRow['bot_raid_active'],
                'website_raids_active' => $aRow['website_raids_active'],
                'website_locations_active' => $aRow['website_locations_active'],
                'website_spawns_active' => $aRow['website_spawns_active'],
                'website_gyms_active' => $aRow['website_gyms_active']
            ];
        }
        foreach($this->aMenuStructur as $sMenuPoint => $sCheckValue){
            foreach($aLocations as $aLoc){
                if(isset($aLoc[$sCheckValue]) && $aLoc[$sCheckValue]){
                    $aPoints[$sMenuPoint][] = $aLoc;
                }
            }
        }
        return $aPoints;
    }
}