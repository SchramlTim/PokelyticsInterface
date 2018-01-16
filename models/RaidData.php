<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class RaidData extends Model
{
    function __construct($location)
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
        $this->location = $location;
    }

    public function getRaidData()
    {
        $oResultPokemon = mysqli_query($this->conn, 'SELECT p.pokedex_id, p.pokemon_name FROM Pokemon p ORDER BY pokedex_id ASC');
        
        $aPokemonNamen = [0 => 'Ei'];
        while ($aRow = mysqli_fetch_assoc($oResultPokemon)) {
            $aPokemonNamen[$aRow['pokedex_id']] = $aRow['pokemon_name'];
        }

        $oResult = mysqli_query($this->conn, 'SELECT * FROM Gyms g, User u where u.chat_id = g.chat_id and u.user_name = "'.ucfirst($this->location).'" and g.raid_end > UNIX_TIMESTAMP() ORDER BY raid_level DESC, raid_end ASC');
        
        $aRaids = [];
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aRaids[] = [
                'name' => $aRow['name'],
                'pokemon_name' => $aPokemonNamen[$aRow['raid_pokemon_id']],
                'team_id' => $aRow['team_id'],
                'raid_start' => $aRow['raid_start'],
                'raid_begin' => $aRow['raid_begin'],
                'raid_end' => $aRow['raid_end'],
                'raid_level' => $aRow['raid_level'],
                'raid_pokemon_id' => $aRow['raid_pokemon_id'],
                'raid_pokemon_cp' => $aRow['raid_pokemon_cp'],
                'lat' => $aRow['latitude'],
                'lng' => $aRow['longitude']
            ];
        }
        return $aRaids;
    }
}