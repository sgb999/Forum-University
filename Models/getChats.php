<?php
header('Content-Type: text/plain');
require_once ('../Models/chats.php');
$MySQL = new chats();
$query = $_REQUEST["q"];
$array = explode("/",$query);
$userId = $array[0];
$chatID = $array[1];
//$result = $MySQL->getChat1($user_id, $chatID);
$result1 = $MySQL->getChat2($userId, $chatID);
$result2 = $MySQL->getChat3($userId, $chatID);
echo json_encode(array_merge($result1, $result2));
?>