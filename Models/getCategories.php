<?php
session_start();
$token = $_REQUEST["q"];
header('Content-Type: text/plain');
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $token){
    require_once ('../Models/Categories.php');
    $categories = new Categories();
    echo json_encode($result = $categories->getCat());
}
else{
    $data = new stdClass();
    $data->error = "No data for you sir";
    echo json_encode($data);
}
?>