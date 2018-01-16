<?php
include_once '../../config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Responsive vertical menu navigation</title>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../src/css/main.css">
        <link rel="stylesheet" href="/css/bootstrap.css">

        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="../src/js/main.js"></script>
        
        <style>
            .pokemon-img{
                width:100%;
                text-align: center;
            }
            .pokemon-img img{
                height:7rem;
                max-width:100%;
            }
            .monster-detail.pokemon-img img{
                height:15rem;
                max-width:100%;
            }
            .monster-detail.pokemon-img{
                margin-top: 0;
            }
            .pokemon-name{
                text-align: center;
                width:100%;
                padding: 1rem;
                font-weight: bold;
                font-size: 1rem;
            }
            .pokemon-count{
                text-align: center;
                width:100%;
                font-size: 1rem;
            }
            .notify-active {
                background: black;
            }
        </style>

        <script>
            window.onload = function(){
                Array.from(document.getElementsByClassName('notable-pokemon')).forEach(
                    function(element) {
                        element.addEventListener("click", toggleNotify);
                    }
                );                
            };

            function toggleNotify() {
                if(this)
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("demo").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "/webhook.php", true);
                xhttp.send();
            }
        </script>


    </head>
    <body>
        <div class="header">
            <div class="logo">
                <i class="fa fa-code"></i>
                <span>Pokelytics</span>
            </div>
            <a href="#" class="nav-trigger"><span></span></a>
        </div>
        <div class="side-nav">
            <div class="logo">
                <i class="fa fa-code"></i>
                <span>Pokelytics</span>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#">
                            <span><i class="fa fa-user"></i></span>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">

                            <span><i class="fa fa-envelope"></i></span>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <span><i class="fa fa-bar-chart"></i></span>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fa fa-credit-card-alt"></i></span>
                            <span>Payments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main-content" style="height:auto;max-height:100vh;">
            <div class="title">
                Notify Pokemon
            </div>
            <div class="main">
                <div class="widget" style="height:auto;max-height:100vh;">
                    <?php
                        $con = mysqli_connect(DB_ADDRESS,DB_USER_NAME,DB_PASSWORD,DB_TABLE_NAME);
                        // Check connection
                        if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $oResult = mysqli_query($con,'SELECT * FROM User u, NotifyPokemon np where u.user_name = "'.ucfirst($_SERVER['REMOTE_USER']).'" and u.chat_id = np.chat_id ORDER BY pokedex_id');
                        $aNotifyData = [];
                        while ($aRow = mysqli_fetch_assoc($oResult)) {
                            $aNotifyData[] = $aRow['pokedex_id'];
                        }

                        $oResult = mysqli_query($con,'SELECT * FROM Pokemon order by pokedex_id');
                        $aPokemons = [];
                        while ($aRow = mysqli_fetch_assoc($oResult)) {
                            $aPokemons[] = [
                                'pokedex_id' => $aRow['pokedex_id'],
                                'pokemon_name' => $aRow['pokemon_name']
                            ];
                        }

                        $iLine = 0;
                        for($i = 0; $i < count($aPokemons); $i++){
                            $sPokemonBlock = '';
                            if(($iLine % 4) == 0){
                                $sPokemonBlock .= '<div class="col-xs-12 no-padding">';
                            }
                            $sPokemonBlock .= '<a class="col-xs-6 col-md-3 no-padding notable-pokemon '.(in_array($aPokemons[$i]['pokedex_id'],$aNotifyData) ? 'notify-active' : '').'"><div class="col-xs-12 pokemon">';
                            $sPokemonBlock .= '<div class="col-xs-12 pokemon-img no-padding"><img src="/img/pokemon/svg/'.$aPokemons[$i]['pokedex_id'].'.svg"/></div>';
                            $sPokemonBlock .= '<div class="col-xs-12 pokemon-name no-padding">'.$aPokemons[$i]['pokemon_name'].'</div>';
                            $sPokemonBlock .= '</div></a>';
                            if(($iLine > 0 | ($i == count($aPokemons) - 1)) & ($iLine % 3) == 0){
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
    </body>
</html>