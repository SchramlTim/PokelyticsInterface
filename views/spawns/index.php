<?php require 'views/header.php'; ?>
<?php
     $aLocationData = $this->getViewParameter('locationData');
     $aPokemon = $this->getViewParameter('pData');
?>
<div id="content" class="row">
    <h1 class="col-md-12">Monster für <?php echo $aLocationData['name'] ?></h1>

    <!--<hr class="col-xs-12">-->
    <div class="col-md-8 col-md-offset-2">
        <?php
            $iLine = 0;
            for($i = 0; $i < count($aPokemon); $i++){
                $sPokemonBlock = '';
                if(($iLine % 4) == 0){
                    $sPokemonBlock .= '<div class="col-xs-12 no-padding">';
                }
                $sPokemonBlock .= '<a href="/monster/'.strtolower($aLocationData['name']).'/'.strtolower($aPokemon[$i]['pokemon_name']).'" class="col-xs-6 col-md-3" href=""><div class="col-xs-12 pokemon">';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/pokemon/svg/'.$aPokemon[$i]['pokedex_id'].'.svg"/></div>';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-name no-padding">'.$aPokemon[$i]['pokemon_name'].'</div>';
                $sPokemonBlock .= '<div class="col-xs-12 pokemon-count no-padding">Anzahl: '.$aPokemon[$i]['pokemon_count'].'</div>';
                $sPokemonBlock .= '</div></a>';
                if(($iLine > 0 | ($i == count($aPokemon) - 1)) & ($iLine % 3) == 0){
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





<?php require 'views/footer.php'; ?>
