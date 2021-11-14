<?php
session_start();
$json = file_get_contents("php://input");
$array = json_decode($json, true);
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $array['token']){
    require_once ('../Models/Comment.php');
    $comment = new Comment();
    echo json_encode($result = $comment->setComment($array['comment'], $array['postId'], $_SESSION['user_id']));
}
else{
    $data = new stdClass();
    $data->error = "No data for you sir";
    echo json_encode($data);
}