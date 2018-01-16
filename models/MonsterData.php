<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class MonsterData extends Model
{
    function __construct($location,$monsterName)
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
        $this->location = $location;
        $this->monsterName = $monsterName;
    }

    public function getHeatmapInformation()
    {
        $oResult = mysqli_query($this->conn, 'SELECT * FROM User u, SpawnedPokemon sp, Pokemon p where u.user_name = "'.ucfirst($this->location).'" and u.chat_id = sp.chat_id and p.pokedex_id = sp.pokedex_id and p.pokemon_name = "'.ucfirst($this->monsterName).'"');
        $aHeatmapInformation = [];
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aHeatmapInformation[] = [
                'lat' => $aRow['lat'],
                'lng' => $aRow['lng']
            ];
        }
        return $aHeatmapInformation;
    }

    public function getMonsterInformation()
    {
        $oResult = mysqli_query($this->conn, 'SELECT * FROM Pokemon WHERE Pokemon.pokemon_name = "'.ucfirst($this->monsterName).'"');
        $aMonsterInformation = [];

        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aMonsterInformation['pokemon_name'] = $aRow['pokemon_name'];
            $aMonsterInformation['pokedex_id'] = $aRow['pokedex_id'];
            $aMonsterInformation['base_attack'] = $aRow['base_attack'];
            $aMonsterInformation['base_defense'] = $aRow['base_defense'];
            $aMonsterInformation['base_stamina'] = $aRow['base_stamina'];
            $aMonsterInformation['candy_to_evolve'] = $aRow['candy_to_evolve'];
            $aMonsterInformation['km_buddy_distance'] = $aRow['km_buddy_distance'];
            $aMonsterInformation['max_cp'] = $aRow['max_cp'];
            $aMonsterInformation['base_capture_rate'] = $aRow['base_capture_rate'];
            $aMonsterInformation['base_flee_rate'] = $aRow['base_flee_rate'];
            $aMonsterInformation['type1'] = $aRow['type1'];
            $aMonsterInformation['type2'] = $aRow['type2'];
        }
        return $aMonsterInformation;
    }

    public function getLocationInformation()
    {
        $oResult = mysqli_query($this->conn, 'SELECT * FROM User where user_name = "'.ucfirst($this->location).'"');
        $aRow = mysqli_fetch_assoc($oResult);
        $aLocationInformation = [
            'name' => $aRow['user_name'],
            'northLat' => $aRow['northLat'],
            'westLng' => $aRow['westLng'],
            'southLat' => $aRow['southLat'],
            'eastLng' => $aRow['eastLng']
        ];
        return $aLocationInformation;
    }

}
