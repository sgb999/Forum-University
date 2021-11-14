<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Posts';
require_once ('Models/MySQL.php');
$topic_id = implode($_GET); //gets the topic_id
require_once('Views/posts.phtml');