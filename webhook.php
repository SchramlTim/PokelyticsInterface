<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10.04.2017
 * Time: 21:44
 */

$test = 0;

//$message = json_decode(file_get_contents('php://input'),true)['callback_query'];

$message = json_decode(file_get_contents('php://input'),true);


$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot321375264:AAGXcl9GZ9Tw3BYdfe-DcWk88pY_dX1HeGk/editMessageText?text=".urlencode($message['message']['text'].PHP_EOL.$message['from']['first_name'])."&chat_id=".$message['message']['chat']['id']."&message_id=".$message['message']['message_id']);

curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot321375264:AAGXcl9GZ9Tw3BYdfe-DcWk88pY_dX1HeGk/sendMessage?text=".$message['message']['chat']['id']."&chat_id=".$message['message']['chat']['id']);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);
