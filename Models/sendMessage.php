<?php
header('Content-Type: text/plain');
$view = new stdClass();
require_once ('../Models/Messages.php');
$messages = new Messages();
$string = $_REQUEST["q"];
$array = explode("ʌ",$string);
$message = null;
$message = $array[0];
$fromUser = $array[1];
$conID = $array[2];
$result = $messages->sendMessage($message, $fromUser, $conID);
?>