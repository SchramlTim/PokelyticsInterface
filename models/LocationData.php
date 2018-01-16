<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class LocationData extends Model
{
    function __construct($location)
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
        $this->location = $location;
    }

    public function getLocationData()
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

    public function getLastLocationPokemon(){
        $oResult = mysqli_query($this->conn, 'SELECT * FROM User u, NotifiedPokemon np, Pokemon p where u.user_name = "'.ucfirst($this->location).'" and u.chat_id = np.chat_id and p.pokedex_id = np.pokedex_id ORDER BY np.spawntime DESC, pokemon_id DESC LIMIT 8');
        $aLocationPokemonInformation = [];

        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aLocationPokemonInformation[] = [
                'pokedex_id' => $aRow['pokedex_id'],
                'pokemon_name' => $aRow['pokemon_name'],
                'spawntime' => $aRow['spawntime'],
                'disappear_time' => $aRow['disappear_time'],
                'lat' => $aRow['lat'],
                'lng' => $aRow['lng']
            ];
        }
        return $aLocationPokemonInformation;
    }

    public function getNotifyPokemon(){
        $oResult = mysqli_query($this->conn, 'SELECT * FROM User u, NotifyPokemon np where u.user_name = "'.ucfirst($this->location).'" and u.chat_id = np.chat_id ORDER BY pokedex_id');
        $aNotifyPokemon = [];
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aNotifyPokemon[] = [
                'pokedex_id' => $aRow['pokedex_id'],
                'pokemon_name' => $aRow['pokemon_name']
            ];
        }
        return $aNotifyPokemon;
    }
}