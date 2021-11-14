<?php
session_start();
header('Content-Type: text/plain');
$json = file_get_contents("php://input");
$array = json_decode($json, true);
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $array['token']){
    require_once ('../Models/Posts.php');
    require_once ('../Models/User.php');
    $post = new Posts();
    $result = $post->setPost($array['header'], $array['content'], $_SESSION['user_id'], $array['catId']);
}