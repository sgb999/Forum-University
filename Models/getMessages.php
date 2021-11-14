<?php
header('Content-Type: text/plain');
require_once ('../Models/Messages.php');
$message = new Messages();
$query = $_REQUEST["q"];
$array = explode(" ",$query);
$con_id = $array[0];
$lastMessageID = $array[1];
$result = $message->readMessage($con_id, $lastMessageID);
if($result){
    echo json_encode($result);
}
else{
    echo json_encode(['empty' => 'no updates']);
}
?>