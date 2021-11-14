<?php
session_start();
header('Content-Type: text/plain');
$string = $_REQUEST["q"];
$array = explode("/", $string);
$token = $array[0];
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $token){
    require_once ('Topics.php');
    $topic = new Topics();
    $topicID = $array[1];
    echo json_encode($result = $topic->getTopicHeader($topicID));
}
else{
    $data = new stdClass();
    $data->error = "No data for you sir";
    echo json_encode($data);
}
?>