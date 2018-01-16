<?php require 'views/header.php'; ?>
<?php
    $aLocationData = $this->getViewParameter('lData');
    $aLocationPokemonData = $this->getViewParameter('lpData');
    $aNotifyData = $this->getViewParameter('nData');
?>
<div id="content" class="row">
    <h1 class="col-md-12">Gebiet <?php echo $aLocationData['name'] ?></h1>
    <!--<hr class="col-xs-12">-->
    <div class="col-md-8 col-md-offset-2">
        <img class="col-xs-12 col-mid-8 col-mid-offset-2" src="<?php echo 'http://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCCVOLZlId2O2rqZTcjy2XX57DPnVasK7s&size=600x300&maptype=roadmap&sensor=false&path=color:0xff0000ff|weight:5|'.$aLocationData['northLat'].','.$aLocationData['eastLng'].'|'.$aLocationData['southLat'].','.$aLocationData['eastLng'].'|'.$aLocationData['southLat'].','.$aLocationData['westLng'].'|'.$aLocationData['northLat'].','.$aLocationData['westLng'].'|'.$aLocationData['northLat'].','.$aLocationData['eastLng']; ?>"/>
    </div>

    <!--<hr class="col-xs-12">-->
    <div class="col-md-8 col-md-offset-2">
        <h2 class="col-xs-12">Letzte Monster</h2>
        <?php
            $iLine = 0;
            for($i = 0; $i < count($aLocationPokemonData); $i++){
                $sPokemonBlock = '';
                if(($iLine % 4) == 0){
                    $sPokemonBlock .= '<div class="col-xs-12">';
                }
                $sPokemonBlock .= '<a class="col-xs-6 col-md-3 no-padding" href="https://www.google.com/maps/?daddr='.$aLocationPokemonData[$i]['lat'].','.$aLocationPokemonData[$i]['lng'].'"><div class="col-xs-12 pokemon">';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/pokemon/svg/'.$aLocationPokemonData[$i]['pokedex_id'].'.svg"/></div>';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-count no-padding">'.$aLocationPokemonData[$i]['pokemon_name'].'</div>';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-count no-padding">Registiert: '.date("H:i:s",$aLocationPokemonData[$i]['spawntime']).'</div>';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-count no-padding">Verschwindet: '.date("H:i:s",$aLocationPokemonData[$i]['disappear_time']).'</div>';
                $sPokemonBlock .= '</div></a>';
                if(($iLine > 0 | ($i == count($aLocationPokemonData) - 1)) & ($iLine % 3) == 0){
                    $sPokemonBlock .= '</div>';
                    $iLine = 0;
                }else{
                    $iLine++;
                }
                echo $sPokemonBlock;
            }

        ?>
    </div>

    <!--<hr class="col-xs-12">-->
    <div class="col-md-8 col-md-offset-2">
        <h2 class="col-xs-12">Benachrichtigte Monster</h2>
        <?php
        $iLine = 0;
        for($i = 0; $i < count($aNotifyData); $i++){
            $sPokemonBlock = '';
            if(($iLine % 4) == 0){
                $sPokemonBlock .= '<div class="col-xs-12 no-padding">';
            }
            $sPokemonBlock .= '<a href="/monster/'.strtolower($aLocationData['name']).'/'.strtolower($aNotifyData[$i]['pokemon_name']).'" class="col-xs-6 col-md-3 no-padding" href=""><div class="col-xs-12 pokemon">';
            $sPokemonBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/pokemon/svg/'.$aNotifyData[$i]['pokedex_id'].'.svg"/></div>';
            $sPokemonBlock .= '<div class="col-xs-12 pokemon-name no-padding">'.$aNotifyData[$i]['pokemon_name'].'</div>';
            $sPokemonBlock .= '</div></a>';
            if(($iLine > 0 | ($i == count($aNotifyData) - 1)) & ($iLine % 3) == 0){
                $sPokemonBlock .= '</div>';
                $iLine = 0;
            }else{
                $iLine++;
            }
            echo $sPokemonBlock;
        }
        ?>
    </div>
</div>
</div>





<?php require 'views/footer.php'; ?>
