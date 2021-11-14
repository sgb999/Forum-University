<?php
require_once ('../Models/User.php');
session_start();
$json = file_get_contents("php://input");
$array = json_decode($json, true);
$user = new User();
$outcome = null;
$userNameFree = $user->getUserNameByName($array['userName']);
$userEmailFree = $user->getUserEmailByEmail($array['email']);
if(!$userNameFree && !$userEmailFree && strlen($array['pass']) >= 8)
{
    $result = $user->addUser($array['firstName'], $array['lastName'], $array['userName'], $array['pass'], $array['email']); // passes data to the addUser method
    if (!$result) {
        $outcome = 'error';
    } else {
        $logUserIn = $user->login($array['userName'], $array['pass']);
        $_SESSION['user_id']   = $logUserIn['id']; //sets a session to user_id
        $_SESSION['user_name'] = $logUserIn['userName']; //sets a session to user_name
        $outcome = "registered";
    }
}
elseif ($userNameFree)
{
    $outcome = 'username';
}
elseif ($userEmailFree || strlen($array['pass'])  < 8)
{
    $outcome = 'email';
}
echo $outcome;