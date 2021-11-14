<?php
require_once ('../Models/User.php');
session_start();
$json = file_get_contents("php://input");
$array = json_decode($json, true);
$user = new User();
$outcome = null;
$logUserIn = $user->login($array['username'], $array['userPass']);
if(!$logUserIn)
{
    $outcome = "incorrect";
}
else
{
    $_SESSION['user_id']   = $logUserIn['id']; //sets a session to user_id
    $_SESSION['user_name'] = $logUserIn['userName']; //sets a session to user_name
    $outcome = "correct";
}
echo $outcome;