<?php
session_start();
header('Content-Type: text/plain');
$string = $_REQUEST["q"];
$array = explode("/", $string);
$token = $array[0];
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $token){
    require_once ('../Models/Posts.php');
    $posts = new Posts();
    $date =  date("Y-m-d") . date("h:m:s");
    $topic_id = $array[1];
    echo json_encode($result = $posts->getPosts($topic_id, $date));
}
else{
    $data = new stdClass();
    $data->error = "No data for you sir";
    echo json_encode($data);
}
?>