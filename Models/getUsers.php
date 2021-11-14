<?php
header('Content-Type: text/plain');
require_once('MySQL.php');
$MySQL = new MySQL();
$userID = $_REQUEST["q"];
echo json_encode($result = $MySQL->getUserName($userID));