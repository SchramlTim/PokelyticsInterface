<?php require 'views/header.php'; ?>
    <div id="content" class="row">
    <h1 class="col-md-12">Pokemon Spawns</h1>
    <div id="tool-list" class="col-md-12">
        <a href="#mystic">Team Blau</a>
        <a href="#valor">Team Rot</a>
        <a href="#instinct">Team Gelb</a>
    </div>
    <hr class="col-xs-12">;
    <div class="col-md-8 col-md-offset-2">
        <?php

        $aGymData = $this->getViewParameter('gData');
        $iLine = 0;
        for($i = 0; $i < count($aGymData); $i++){
            if($i > 0 &($aGymData[($i-1)]['team_id'] != $aGymData[$i]['team_id'])){
                switch($aGymData[$i]['team_id']){
                    case 1:
                        $sJumpMark = 'mystic';
                        break;
                    case 2:
                        $sJumpMark = 'valor';
                        break;
                    case 3:
                        $sJumpMark = 'instinct';
                        break;
                    default:
                        $sJumpMark = '';
                        break;
                }
                echo '<hr id="'.$sJumpMark.'" class="col-xs-12">';
            }
            $sGymBlock = '';
            if(($iLine % 4) == 0){
                $sGymBlock .= '<div class="row">';
            }
            $sGymBlock .= '<a class="col-xs-6 col-md-3 no-padding" href="'.$row['id'].'">';
            $sGymBlock .= '<div class="col-xs-12 pokemon no-padding">';
            $sGymBlock .= '<div class="col-xs-12 pokemon-img no-padding">';
            $sGymBlock .= '<img src="/img/team/'.$aGymData[$i]['team_id'].'.svg"/>';
            $sGymBlock .= '</div>';
            $sGymBlock .= '<div class="col-xs-12 pokemon-name no-padding">'.$aGymData[$i]['name'].'</div>';
            $sGymBlock .= '<div class="col-xs-12 pokemon-count no-padding">Freie Plätze: '.$aGymData[$i]['gym_points'].'</div>';
            $sGymBlock .= '<div class="col-xs-12 pokemon-count no-padding">Raid aktiv: '.($aGymData[$i]['raid_active'] ? 'Ja' : 'Nein').'</div>';
            $sGymBlock .= '</div>';
            $sGymBlock .= '</a>';
            if(($iLine > 0 | ($i == count($aGymData) - 1)) & (($aGymData[($i)]['team_id'] != $aGymData[$i+1]['team_id']) | ($iLine % 3) == 0)){
                $sGymBlock .= '</div>';
                $iLine = 0;
            }else{
                $iLine++;
            }


            echo $sGymBlock;
        }

        ?>
    </div>
    </div>
    


<?php require 'views/footer.php'; ?>