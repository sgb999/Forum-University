<?php
session_start();
header('Content-Type: text/plain');
$string = $_REQUEST["q"];
$array = explode("/",$string);
$token = $array[0];
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $token){
    require_once ('../Models/Posts.php');
    $post = new Posts();
    $string = $array[1];
    $userID = $array[2];
    if($string == "initial") {
        echo json_encode($result = $post->getUserPosts($userID));
    }
    elseif($string == "more"){
        $date = $array[3];
        echo json_encode ($result = $post->getMoreUserPosts($userID, $date));
    }
}
else{
    $data = new stdClass();
    $data->error = "No data for you sir";
    echo json_encode($data);
}
?>