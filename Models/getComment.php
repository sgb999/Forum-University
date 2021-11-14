<?php
session_start();
header('Content-Type: text/plain');
$string = $_REQUEST["q"];
$array = explode("/", $string);
$token = $array[0];
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $token){
    require_once ('../Models/Comment.php');
    $comment = new Comment();
    $postId = $array[1];
    if($array[2] = 0){
        $date = $array[2];
    } else {
        $date = date("Y-m-d h:i:s");
    }
    echo json_encode($result = $comment->getComment($postId, $date));
}
else{
    $data = new stdClass();
    $data->error = "No data for you sir";
    echo json_encode($data);
}
?>