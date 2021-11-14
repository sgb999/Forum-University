<?php
session_start();
header('Content-Type: text/plain');
$string = $_REQUEST["q"];
$array = explode("/", $string);
$string = $array[0];
$token = $array[1];
$cat_id = $array[2];
if(isset($_SESSION['ajaxToken']) && $_SESSION['ajaxToken'] == $token){
    require_once ('Topics.php');
    $topics = new Topics();
    if($string == "initial"){
        echo json_encode($result = $topics->getSelectedTopics($cat_id));
    }
    if($string == "more") {
        $date = $array[3];
        echo json_encode($result = $topics->getMoreTopics($cat_id, $date));
    }
}
else{
$data = new stdClass();
$data->error = "No data for you sir";
echo json_encode($data);
}
?>