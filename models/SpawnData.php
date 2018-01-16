<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class SpawnData extends Model
{
    function __construct($location)
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
        $this->location = $location;
    }

    public function getSpawnedPokemon()
    {
        //$oResult = mysqli_query($this->conn, 'SELECT p.pokemon_name, sp.pokedex_id, count(sp.pokedex_id) as pokemon_count FROM User u, SpawnedPokemon sp, Pokemon p WHERE u.user_name = "'.ucfirst($this->location).'" and u.chat_id = sp.chat_id and p.pokedex_id = sp.pokedex_id GROUP BY sp.pokedex_id, p.pokemon_name ORDER BY count(sp.pokedex_id) DESC');
        //$oResult = mysqli_query($this->conn, 'Select Pokemon.pokemon_name, SpawnedPokemon.pokedex_id, count(SpawnedPokemon.pokedex_id) as pokemon_count from User INNER JOIN SpawnedPokemon ON User.chat_id = SpawnedPokemon.chat_id INNER JOIN Pokemon ON SpawnedPokemon.pokedex_id = Pokemon.pokedex_id WHERE User.user_name = "'.ucfirst($this->location).'" GROUP BY SpawnedPokemon.pokedex_id, Pokemon.pokemon_name ORDER BY count(SpawnedPokemon.pokedex_id) DESC');
        $aPokemon = [];

        $iChatId = mysqli_fetch_assoc(mysqli_query($this->conn, 'Select * FROM User where User.user_name = "'.ucfirst($this->location).'"'))['chat_id'];
        $aPokemonNames = [];
        $oResult = mysqli_query($this->conn, 'Select pokedex_id,pokemon_name from Pokemon');
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aPokemonNames[$aRow['pokedex_id']] = $aRow['pokemon_name'];
        }
        print_r($iChatId);

        $oResult = mysqli_query($this->conn, 'SELECT pokedex_id, count(pokedex_id) as pokemon_count FROM SpawnedPokemon WHERE chat_id = '.$iChatId.' GROUP BY pokedex_id ORDER BY count(pokedex_id) DESC');
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aPokemon[] = [
                'pokedex_id' => $aRow['pokedex_id'],
                'pokemon_name' => $aPokemonNames[$aRow['pokedex_id']],
                'pokemon_count' => $aRow['pokemon_count']
            ];
        }
        return $aPokemon;
    }
}