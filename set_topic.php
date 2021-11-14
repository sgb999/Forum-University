<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Topics';
require_once('Models/MySQL.php');
$MySQL = new MySQL(); // creates a MySQL class object
$view->MySQL = $MySQL->getCat();
//if ($has_session = session_status() == PHP_SESSION_ACTIVE) // checks for active session
//{
if ($_SESSION['user_name']) //checks if user has logged in
{

if (isset($_POST['submit'])) {

$result = $MySQL->setTopics($_POST['topic_subject'], $_POST['Category']);
//$result = $MySQL->setTopics();
$result = $MySQL->setPosts($_POST['post_content'], $_POST['topic_subject']);
}
require_once('Views/set_topic.phtml');
} else {
header("Location: not_logged_in.php");
}