<?php
session_start();
$view = new stdClass();
$user_id=implode($_GET); //gets the userid
require_once ('Models/MySQL.php');
$MySQL = new MySQL();
$username = $MySQL->getUserName($user_id);
$name = null;
foreach ($username as $user){
    $name = $user['userName'];
}
$view->MySQL = $name;
$view->pageTitle = $name;
require_once ("Views/profile.phtml");