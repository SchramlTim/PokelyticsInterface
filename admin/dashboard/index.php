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

        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="../src/js/main.js"></script>

        <style>
            .ad {
                position: absolute;
                width: 300px;
                height: 250px;
                border: 1px solid #ddd;
                left: 50%;
                transform: translateX(-50%);
                top: 250px;
                z-index: 10;
            }
            .ad .close {
                position: absolute;
                font-family: 'ionicons';
                width: 20px;
                height: 20px;
                color: #fff;
                background-color: #999;
                font-size: 20px;
                left: -20px;
                top: -1px;
                display: table-cell;
                vertical-align: middle;
                cursor: pointer;
                text-align: center;
            }
        </style>
        <script type="text/javascript">
            $(function() {
                $('.close').click(function() {
                    $('.ad').css('display', 'none');
                })
            })
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
        <div class="main-content">
            <div class="title">
                Analytics
            </div>
            <div class="main">
                <div class="widget">
                    <?php
                        $con=mysqli_connect(DB_ADDRESS,DB_USER_NAME,DB_PASSWORD,DB_TABLE_NAME);
                        // Check connection
                        if (mysqli_connect_errno())
                        {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
    
                        $sql = "SELECT 
                                    table_name AS `Table`, 
                                    ROUND(((data_length + index_length) / 1024 / 1024), 2) `Size`
                                    FROM information_schema.TABLES 
                                    WHERE table_schema = \"MessageBot\"
                                    AND table_name = \"SpawnedPokemon\"
                                    ORDER BY (data_length + index_length) DESC";
                        $result=mysqli_query($con,$sql);
    
                        $tableRow = mysqli_fetch_assoc($result); 
                    ?>
                    <div class="title"><?php  echo 'Table: '.$tableRow['Table'] ?></div>
                    <div class="chart">
                        <?php
                            echo '<span class="big">'.$tableRow['Size'].' MB</span>';
                        ?>
                    </div>
                    <?php
                        // Free result set
                        mysqli_free_result($result);
                        mysqli_close($con);                        
                    ?>
                </div>
                <div class="widget">
                    <div class="title">Running Location Factorys</div>
                    <div class="chart">
                        <?php
                            $command = 'ps -ef| tee log | grep "LocationFactory.php"|grep -v "grep" | wc -l';
                            $pLocCount = shell_exec($command);
                            echo '<span class="big">LocationFactory Prozesse: ' . $pLocCount.'</span>';
                        ?>
                    </div>
                </div>
                <div class="widget">
                    <div class="title">Running Worker</div>
                    <div class="chart">
                        <?php
                            $command = 'ps -ef| tee log | grep "ConsumWorker.php"|grep -v "grep" | wc -l';
                            $pConCount = shell_exec($command);
                            echo '<span class="big">ConsumWorker Prozesse: ' . $pConCount.'</span>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>