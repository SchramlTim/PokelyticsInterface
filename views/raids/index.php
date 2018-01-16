<?php require 'views/header.php'; ?>
    <div id="content" class="row">
        <h1 class="col-md-12">Aktive Raids</h1>
            <?php

            $aRaidData = $this->getViewParameter('rData');
            $iLine = 0;
            for($i = 0; $i < count($aRaidData); $i++){
                $sRaidBlock = '';
                if($i == 0 || ($aRaidData[($i-1)]['raid_level'] != $aRaidData[$i]['raid_level'])){
                    $sRaidBlock .= '<hr class="col-xs-12 no-padding">';
                    $sRaidBlock .= '<div class="col-md-8 col-md-offset-2">';
                }

                if($iLine == 0){
                    $sRaidBlock .= '<div class="col-xs-12 no-padding">';
                }
                if($iLine % 2 == 0){
                    $sRaidBlock .= '<div class="col-xs-12 col-md-6 no-padding">';
                }
                $sRaidBlock .= '<div class="col-xs-6 no-padding">';
                $sRaidBlock .= '<a class="col-xs-12" href="https://maps.google.com/?daddr='.$aRaidData[$i]['lat'].','.$aRaidData[$i]['lng'].'"><div class="col-xs-12 pokemon">';
                if(($aRaidData[$i]['raid_pokemon_id'] > 0) & ($aRaidData[$i]['raid_pokemon_cp'] > 0)){
                    $sRaidBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/pokemon/svg/'.$aRaidData[$i]['raid_pokemon_id'].'.svg"/></div>';
                }else{
                    
                    if($aRaidData[$i]['raid_level'] > 4){
                        if(($aRaidData[$i]['raid_begin'] - time()) <= 600) {
                            $sRaidBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/eggs/breaking-legendary-egg.svg"/></div>';
                        } else {
                            $sRaidBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/eggs/legendary-raid-egg.svg"/></div>';
                        }
                    } else {
                        if(($aRaidData[$i]['raid_begin'] - time()) <= 600) {
                            $sRaidBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/eggs/breaking-egg.svg"/></div>';
                        } else {
                            $sRaidBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/eggs/raid-egg.svg"/></div>';
                        }
                        
                    }
                    
                }
                $sRaidBlock .= '<div class="col-xs-12 pokemon-name no-padding">'.$aRaidData[$i]['name'].'</div>';
                if(($aRaidData[$i]['raid_pokemon_id'] > 0) & ($aRaidData[$i]['raid_pokemon_cp'] > 0)){
                    //$sRaidBlock .= '<div class="col-xs-12 pokemon-count no-padding">ID: '.$aRaidData[$i]['raid_pokemon_id'].'</div>';
                    $sRaidBlock .= '<div class="col-xs-12 pokemon-count no-padding"><b>'.$aRaidData[$i]['pokemon_name'].'</b></div>';
                    $sRaidBlock .= '<div class="col-xs-12 pokemon-count no-padding">WP: '.$aRaidData[$i]['raid_pokemon_cp'].'</div>';
                }
                $sRaidBlock .= '<div class="col-xs-12 pokemon-count no-padding">Erscheinen: '.date("H:i:s",$aRaidData[$i]['raid_start']).'</div>';
                $sRaidBlock .= '<div class="col-xs-12 pokemon-count no-padding">Beginn: '.date("H:i:s",$aRaidData[$i]['raid_begin']).'</div>';
                $sRaidBlock .= '<div class="col-xs-12 pokemon-count no-padding">Ende: '.date("H:i:s",$aRaidData[$i]['raid_end']).'</div>';
                $sRaidBlock .= '</div></a>';
                $sRaidBlock .= '<a class="col-xs-12 col-md-0" style="text-align:center; font-size:2rem; color:#64dd17;" target="_blank" href="whatsapp://send?text=*'.$aRaidData[$i]['pokemon_name'].'*%0A%0AGym: _'.$aRaidData[$i]['name'].'_%0A%0AErschienen: _'.date("H:i",$aRaidData[$i]['raid_start']).'_%0ABeginn: _'.date("H:i",$aRaidData[$i]['raid_begin']).'_%0AEnde: _'.date("H:i",$aRaidData[$i]['raid_end']).'_%0Ahttps://maps.google.com/?daddr='.$aRaidData[$i]['lat'].','.$aRaidData[$i]['lng'].'" data-action="share/whatsapp/share">Share via WhatsApp</a>';
                //$sRaidBlock .= '<a class="col-xs-0 col-md-12" style="text-align:center; font-size:2rem; color:#64dd17;" target="_blank" href="https://web.whatsapp.com/send?text=*'.$aRaidData[$i]['pokemon_name'].'*%0AErschienen: _'.date("H:i",$aRaidData[$i]['raid_start']).'_%0ABeginn: _'.date("H:i",$aRaidData[$i]['raid_begin']).'_%0AEnde: _'.date("H:i",$aRaidData[$i]['raid_end']).'_%0Ahttps://www.google.com/maps/?daddr='.$aRaidData[$i]['lat'].','.$aRaidData[$i]['lng'].'" data-action="share/whatsapp/share">Share via WhatsApp</a>';
                $sRaidBlock .= '</div>';

                /*echo "iLine:".$iLine."<br/>";
                echo "i:".$i."<br/>";
                echo "curRaidlvl:".$aRaidData[$i]['raid_level']."<br/>";
                echo "nextRaidlvl:".$aRaidData[$i+1]['raid_level']."<br/>";*/

                if((($aRaidData[$i]['raid_level'] == $aRaidData[($i+1)]['raid_level']) & ($iLine == 1 | $iLine == 3)) | ($aRaidData[$i]['raid_level'] != $aRaidData[($i+1)]['raid_level'])){
                    $sRaidBlock .= '</div>';
                }

                if((($aRaidData[$i]['raid_level'] == $aRaidData[($i+1)]['raid_level']) & ($iLine == 3)) | ($aRaidData[$i]['raid_level'] != $aRaidData[($i+1)]['raid_level'])){
                    $sRaidBlock .= '</div>';
                    $iLine = 0;
                }
                else{
                    $iLine++;
                }
                if(($aRaidData[$i]['raid_level'] != $aRaidData[($i+1)]['raid_level']) | ($i == count($aRaidData) - 1)){
                    $sRaidBlock .= '</div>';
                    $iLine = 0;
                }

                echo $sRaidBlock;
            }

            ?>

    </div>

<?php require 'views/footer.php'; ?>