<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 08.07.2017
 * Time: 00:13
 */
class GymData extends Model
{
    function __construct($location)
    {
        $this->conn = new mysqli(DB_ADDRESS, DB_USER_NAME, DB_PASSWORD,DB_TABLE_NAME);
        $this->location = $location;
    }

    public function getGymData()
    {
        $oResult = mysqli_query($this->conn, 'SELECT * FROM Gyms g, User u where u.chat_id = g.chat_id and u.user_name = "'.ucfirst($this->location).'" ORDER BY team_id, gym_points DESC');
        $aGyms = [];
        while ($aRow = mysqli_fetch_assoc($oResult)) {
            $aGyms[] = [
                'name' => $aRow['name'],
                'team_id' => $aRow['team_id'],
                'raid_active' => ($aRow['raid_start'] > 0),
                'gym_points' => $aRow['gym_points']
            ];
        }
        return $aGyms;
    }
}