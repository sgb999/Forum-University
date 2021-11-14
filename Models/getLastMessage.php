<?php
header('Content-Type: text/plain');
require_once ('MySQL.php');
$MySQL = new MySQL();
$query = $_REQUEST["q"];
echo json_encode ($result = $MySQL->getLastMessageID($query));
?>