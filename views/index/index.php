<?php require 'views/header.php'; ?>
<?php
    $iLastMigration = $this->getViewParameter('mData');
?>
<div id="content" class="row">
    <h1 class="col-md-12"></h1>
    <!--<hr class="col-xs-12">-->
    <div class="col-md-8 col-md-offset-2">
        <div class="col-xs-12 countdown">
            <?php
            $total = ($iLastMigration+1209600)-time();
            $days_round = floor($total/(24*60*60));
            $hours_left = ($total - ($days_round*24*60*60));
            $hours_round = floor($hours_left/(60*60));
            $minutes_left = ($hours_left - $hours_round*3600)/60;
            $minutes_round = floor($minutes_left);

            $sCountdown = '';
            $sCountdown .= '<span>Zeit bis zum Nestanalyse-Reset:</span><br/>';
            $sCountdown .= '<span class="big-countdown">'.$days_round.'</span> Tage <span class="big-countdown">'.$hours_round.'</span> Stunden <span class="big-countdown">'.$minutes_round.'</span> Minuten';
            echo $sCountdown;
            ?>
        </div>
    </div>
    <hr class="col-xs-12">
    <div class="col-md-8 col-md-offset-2" style="padding:4rem">
        <h2>Wichtige Informationen!</h2>
        <p>Hallo Trainer, da in letzter Zeit durch Niantics &Auml;nderungen einige Maps in der Umgebung down gegangen sind, haben wir eine kleine Initiative gegr&uuml;ndet um wieder etwas Leben in der Community wecken.</p>
        <h3>Linkliste</h3>
        <p><span>Facebook-Gruppe: </span><a href="https://www.facebook.com/groups/427825034251506/">Facebook Gruppe (RT)</a></p>
        <h3>WhatsApp</h3>
        <p><span>WhatsApp Gruppe: </span><a href="https://chat.whatsapp.com/GGcb5tkXaY5IfbCKLe1rY8">WhatApp (RT)</a></p>
        
            <h3 class="col-xs-12 no-padding"><span>Spawn Channel:</span></h3>
            <p>Reutlingen: <a href="https://t.me/PokelyticsGesamt">Telegram</a></p>
            <p>Nürtingen: <a href="https://t.me/PokelyticsNuertingen">Telegram</a></p>
            <p>Tübingen: <a href="https://t.me/PokelyticsTuebingen">Telegram</a></p>
            <p>Albstadt: <a href="https://t.me/PokelyticsAlbstadt">Telegram</a></p>
            <p>Schwäbisch Gmünd: <a href="https://t.me/PokelytiksGmuend">Telegram</a></p>
            <p>Hechingen: <a href="https://t.me/PokelyticsHechingen">Telegram</a></p>
            <p>Tuttlingen: <a href="https://t.me/PokelyticsTuttlingen">Telegram</a></p>
            <p>Bad-Rappenau: <a href="https://t.me/PokelyticsBadRappenau">Telegram</a></p>
            <p>Heilbronn: <a href="https://t.me/PokelyticsHN">Telegram</a></p>
            <p>Neckarsulm: <a href="https://t.me/PokelyticsNSU">Telegram</a></p>
            <p><strong><span>Spawn- und Nestanalyse: Work in Progress</span></strong></p>
            <p>Du brauchst Candys um deine Pokemon zu entwickeln oder zu pushen? Du willst deine Sammlung mit Entwicklungen erweitern? Dann legen wir dir nahe dem Analysetool einen Besuch abzustatten! Mit ihm lassen sich einfach Nester in deiner Umgebung erkennen. Jede Pokemon welches auf der Karte auftaucht wird von uns registriert und in unserer Pokemon-Datenbank aufgenommen. Die &ldquo;Heat Map&rdquo; zeigt die H&auml;ufung der Pokemon in einem Gebiet an.</p>
            <p><span>Silph Road Nest Atlas: </span><a href="https://thesilphroad.com/atlas#13/48.5287/9.2864">The Silph Road Nest Atlas</a> Der Nestatlas zeigt Nester in euer N&auml;he an. Es ist ein Communitytool und wird von dieser auch gespeist. Solltet ihr ein Nest finden, tragt es doch bitte dort ein, um es mit anderen Spielern zuteilen!</p>
    </div>
</div>





<?php require 'views/footer.php'; ?>
