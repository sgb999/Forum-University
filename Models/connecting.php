<?php
header('Content-Type: text/plain');
require_once('../Models/Connect.php');
$con = new Connect();
$string = $_REQUEST["q"];
$array = explode("/", $string);
$user1 = $array[0];
$user2 = $array[1];
$result = $con->checkConnect($user1, $user2);
if(!$result) {
    $result = $con->connect($user1, $user2);
    echo json_encode($result = $con->checkConnect($user1, $user2));
}
else{
    echo json_encode($result);
}
?>