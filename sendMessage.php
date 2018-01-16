<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 02.09.2017
 * Time: 11:21
 */

$bla = "*@ A L L E*%20Am *Sonntag* den 03.09 wird eine planmäßige *Serverumstellung* erfolgen.%20Dafür werden Bot und Webseite auf *unbestimmte Zeit* deaktiviert und sind nicht erreichbar. Der Raidbot ist *NICHT* betroffen!%20Durchgeführt wird: Betriebsystem-Umstellung, Neu Konfiguration des Setups, Test und wieder aktivieren der Webseite und des Bots";


$mysqli = new mysqli("localhost", "root", "_cheruB17", "MessageBot");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM User";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo $row['chat_id'];


        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.telegram.org/bot321375264:AAGXcl9GZ9Tw3BYdfe-DcWk88pY_dX1HeGk/sendMessage?chat_id='.$row['chat_id'].'&parse_mode=Markdown&text='.$bla,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0
        ));
        // Send the request & save response to $resp
        if(curl_exec($curl) === false)
        {
            echo 'Curl-Fehler: ' . curl_error($curl);
        }
        // Close request to clear up some resources
        curl_close($curl);

    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>