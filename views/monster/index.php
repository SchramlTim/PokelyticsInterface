<?php require 'views/header.php'; ?>



<?php
    $aHeatmapData = $this->getViewParameter('headmapData');
    $aLocationData = $this->getViewParameter('locationData');
    $aMonsterData = $this->getViewParameter('monsterData');
?>
<div id="content" class="row">
    <h1 class="col-md-12"><?php echo $aMonsterData['pokemon_name'].' - '.$aLocationData['name'] ?></h1>
    <div class="col-xs-12 monster-detail pokemon-img no-padding">
        <img src="/img/pokemon/svg/<?php echo $aMonsterData['pokedex_id']?>.svg"/>
    </div>
    <hr class="col-xs-12">
    <div class="col-md-8 col-md-offset-2">
        <h2 class="col-xs-12">Allgemeine Informationen</h2>
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <canvas id="attack-chart" ></canvas>
            </div>
            <div class="col-xs-6 col-md-3">
                <canvas id="defense-chart" ></canvas>
            </div>
            <div class="col-xs-6 col-md-3">
                <canvas id="stamina-chart" ></canvas>
            </div>
            <div class="col-xs-6 col-md-3">
                <canvas id="points-chart" ></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-6 monster-detail">
                <div class="col-xs-12 headline">Fangrate:</div>
                <div class="col-xs-12 value"><?php echo ($aMonsterData['base_capture_rate']*100).'%' ?></div>
            </div>
            <div class="col-xs-6 col-md-6 monster-detail">
                <div class="col-xs-12 headline">Fluchtrate:</div>
                <div class="col-xs-12 value"><?php echo ($aMonsterData['base_flee_rate']*100).'%' ?></div>
            </div>
            <div class="col-xs-6 col-md-6 monster-detail">
                <div class="col-xs-12 headline">Kumpeldistanz:</div>
                <div class="col-xs-12 value"><?php echo ($aMonsterData['km_buddy_distance']).' Kilometer' ?></div>
            </div>
            <div class="col-xs-6 col-md-6 monster-detail">
                <div class="col-xs-12 headline">Nächste Entwicklung:</div>
                <div class="col-xs-12 value"><?php echo $aMonsterData['candy_to_evolve'] != 0 ?($aMonsterData['candy_to_evolve']).' Bonbons' : 'Keine Entwicklung' ?></div>
            </div>
        </div>
    </div>
    <hr class="col-xs-12">
    <div class="col-md-8 col-md-offset-2">
        <h2 class="col-xs-12">Heatmap</h2>
        <div class="col-xs-12" id="map"></div>
    </div>

</div>

<script>

    var map;
    var heatmap;

    function initMap() {

        <?php
        echo 'var locations = ' . json_encode($aHeatmapData) . ';';
        echo 'var id = ' . $aMonsterData['pokedex_id'] . ';';
        echo 'var lat = ' . ((floatval($aLocationData['northLat'])+floatval($aLocationData['southLat']))/2) . ';';
        echo 'var lng = ' . ((floatval($aLocationData['westLng'])+floatval($aLocationData['eastLng']))/2) . ';';
        ?>

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {lat: lat, lng: lng}
        });

        var heatMapLocs = [];

        for(var i = 0; i < locations.length; i++){
            heatMapLocs.push(new google.maps.LatLng(Number(locations[i].lat), Number(locations[i].lng)));
        }

        heatmap = new google.maps.visualization.HeatmapLayer({
            data: heatMapLocs,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCVOLZlId2O2rqZTcjy2XX57DPnVasK7s&callback=initMap&libraries=visualization">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
    var attackConfig = {
        type: 'doughnut',
        data: {
            labels: [
                "Angriff",
                "Rest bis zum Max."
            ],
            datasets: [{
                data: [
                    <?php echo $aMonsterData['base_attack'] ?>,
                    <?php echo 330 - $aMonsterData['base_attack'] ?>
                ],
                backgroundColor: [
                    '#8845c6',
                    '#DDD'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Angriff'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    var defenseConfig = {
        type: 'doughnut',
        data: {
            labels: [
                "Verteidigung",
                "Rest bis zum Max."
            ],
            datasets: [{
                data: [
                    <?php echo $aMonsterData['base_defense'] ?>,
                    <?php echo 396 - $aMonsterData['base_defense'] ?>
                ],
                backgroundColor: [
                    '#91a7be',
                    '#DDD'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Verteidigung'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    var staminaConfig = {
        type: 'doughnut',
        data: {
            labels: [
                "Ausdauer",
                "Rest bis zum Max."
            ],
            datasets: [{
                data: [
                    <?php echo $aMonsterData['base_stamina'] ?>,
                    <?php echo 510 - $aMonsterData['base_stamina'] ?>
                ],
                backgroundColor: [
                    '#deb19c',
                    '#DDD'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Ausdauer'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    var pointsConfig = {
        type: 'doughnut',
        data: {
            labels: [
                "Wettkampfpunkte",
                "Rest bis zum Max."
            ],
            datasets: [{
                data: [
                    <?php echo $aMonsterData['max_cp'] ?>,
                    <?php echo 4760 - $aMonsterData['max_cp'] ?>
                ],
                backgroundColor: [
                    '#2ecc71',
                    '#DDD'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Max. Wettkampfpunkte'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("attack-chart").getContext("2d");
        window.myDoughnut = new Chart(ctx, attackConfig);
        var ctx = document.getElementById("defense-chart").getContext("2d");
        window.myDoughnut = new Chart(ctx, defenseConfig);
        var ctx = document.getElementById("stamina-chart").getContext("2d");
        window.myDoughnut = new Chart(ctx, staminaConfig);
        var ctx = document.getElementById("points-chart").getContext("2d");
        window.myDoughnut = new Chart(ctx, pointsConfig);
    };
</script>

<?php require 'views/footer.php'; ?>
