<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/img/site_img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-63677798-3', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');

    </script>

    <style>
        html {
            font-size: 80%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        @media screen (min-width: 768px){
            html {
                font-size: 100%;
            }
        }
        body{
            width:auto;
            height:auto;
            font-family: 'Lato';
            margin: 0;
            padding: 0;
        }
        h1{
            text-align: center;
            font-size: 3rem;
        }
        h2{
            text-align: center;
            font-size: 2rem;
        }
        .raid-level{
            text-align: center;
            font-size: 5rem;
            font-weight: bold;
        }
        .pokemon{
            height: auto;
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        hr{
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
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
        #tool-list{
            text-align: center;
        }
        #tool-list a{
            padding: 2rem;
        }
        #content{
            padding: 10rem 2rem;
        }

        .no-padding {
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        .monster-detail{
            margin-top:4rem;
        }

        .monster-detail .headline{
            font-size: 1.7rem;
            font-weight: bold;
            text-align: center;
        }
        .monster-detail .value{
            font-size: 1.3rem;
            font-weight: bold;
            text-align: center;
        }

        #map {
            min-height: 30rem;
        }

        .main_h {
            position: fixed;
            z-index: 999;
            width: 100%;
            padding-top: 17px;
            background: none;
            overflow: hidden;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            opacity: 1;
            padding-bottom: 6px;
            font-family: 'Lato', sans-serif;
        }
        @media only screen and (max-width: 766px) {
            .main_h {
                padding-top: 25px;
                max-height: 70px;
            }
        }

        .open-nav {
            max-height: 400px !important;
            overflow-y: scroll;
        }
        .open-nav .mobile-toggle {
            transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
        }

        .sticky {
            background-color: rgba(255, 255, 255, 0.93);
            opacity: 1;
            top: 0px;
            border-bottom: 1px solid gainsboro;
        }

        .logo {
            width: 50px;
            font-size: 25px;
            color: #8f8f8f;
            text-transform: uppercase;
            float: left;
            display: block;
            margin-top: 0;
            line-height: 1;
            margin-bottom: 10px;
        }
        @media only screen and (max-width: 766px) {
            .logo {
                float: none;
            }
        }

        nav {
            float: right;
            width: 80%;
            padding-right: 5%;
            -webkit-transition: all 200ms ease-in;
            -moz-transition: all 200ms ease-in;
            transition: all 200ms ease-in;
        }
        @media only screen and (max-width: 766px) {
            nav {
                width: 100%;
            }
        }
        nav ul {
            list-style: none;
            overflow: hidden;
            text-align: right;
            float: right;
        }
        @media only screen and (max-width: 766px) {
            nav ul {
                padding-top: 10px;
                margin-bottom: 22px;
                float: left;
                text-align: center;
                width: 100%;
            }
        }
        nav ul li {
            display: inline-block;
            margin-left: 1.5rem;
            line-height: 1.5;
        }
        @media only screen and (max-width: 766px) {
            nav ul li {
                width: 100%;
                padding: 7px 0;
                margin: 0;
            }
        }
        nav ul a {
            color: #888888;
            text-transform: uppercase;
            font-size: 1.3rem;
        }

        nav ul.sub{
            display: none;
            margin-top: 1rem;
            -webkit-margin-before: 0 !important;
            -webkit-margin-after: 0 !important;
            -webkit-margin-start: 0 !important;
            -webkit-margin-end: 0 !important;
            -webkit-padding-start: 0 !important;
        }

        ul{
            -webkit-margin-before: 0 !important;
            -webkit-margin-after: 0 !important;
            -webkit-margin-start: 0 !important;
            -webkit-margin-end: 0 !important;
            -webkit-padding-start: 0 !important;
        }

        nav li:hover ul.sub{
            display: block;
        }

        nav a.top-cat{
            display: block;
        }

        ul.sub li{
            display: block;
        }

        ul.sub a{
            font-size: 1rem;
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
            font-size: 20px;
            position: absolute;
            right: 22px;
            top: 0;
            width: 30px;
            -webkit-transition: all 200ms ease-in;
            -moz-transition: all 200ms ease-in;
            transition: all 200ms ease-in;
        }
        @media only screen and (max-width: 766px) {
            .mobile-toggle {
                display: block;
            }
            nav ul.sub{
                display: block;
            }
        }
        .mobile-toggle span {
            width: 30px;
            height: 4px;
            margin-bottom: 6px;
            border-radius: 1000px;
            background: #8f8f8f;
            display: block;
        }

        * {
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        h1 {
            font-size: 30px;
            line-height: 1.8;
            text-transform: uppercase;
            font-family: 'Lato', sans-serif;
        }

        p {
            margin-bottom: 20px;
            font-size: 17px;
            line-height: 2;
        }


        footer{
            text-align: center;
            background-color: #8f8f8f;
            padding:2rem;
        }

        footer p{
            margin:0;
            font-size: 0.8rem;
            line-height: 1.5;
        }

        .big-countdown{
            font-size: 2rem;
        }

        .countdown{
            text-align: center;
        }


        canvas {
            width: 100%;
            height: auto;
        }



    </style>
    <title><?php echo $this->getViewParameter('site_title') ?></title>
</head>
<body>
<header class="col-xs-12 main_h sticky">
    <div class="col-md-8 col-md-offset-2 menu">
        <a class="logo" href="/">Pokelytics</a>

        <div class="mobile-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav>
            <ul>
            <?php
                foreach($this->getViewParameter('menustructur') as $sPoint => $aLocations){
                    $sMenuBlock = '';
                    $sMenuBlock .= '<li>';
                    $sMenuBlock .= '<a class="top-cat">'.$sPoint.'</a>';
                    $sMenuBlock .= '<ul class="sub">';
                    foreach($aLocations as $sLocation){
                        $sMenuBlock .= '<li><a href="/'.strtolower($sPoint).'/'.strtolower($sLocation['name']).'">'.$sLocation['name'].'</a></li>';
                    }
                    $sMenuBlock .= '</ul></li>';
                    $sMenuBlock .= '</li>';
                    echo $sMenuBlock;
                }
            ?>
            </ul>
        </nav>
    </div>
</header>
<div style="
    height: 5rem;
    margin-top: 5rem;
    text-align: center;
">
    <p style="background-color: red;">DER POKELYTICS SERVICE WIRD ZUM 01.02.2018 EINGESTELLT!</p>
</div>
