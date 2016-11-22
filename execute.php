<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

//$text = trim($text);
//$text = strtolower($text);
$text = "";
if (strcmp ( $text , "/trump" )==0){
  $text = "http://www.lastampa.it/rf/image_lowres/Pub/p4/2016/11/21/Esteri/Foto/RitagliWeb/TrumpHealthCareLawJPEG-701cf_1479755911-kLIC-U1090184008278543C-1024x576@LaStampa.it.jpg";
}
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "photo" => $text);
$parameters["method"] = "sendPhoto";
echo json_encode($parameters);
