<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Topics';
$cat_id=implode($_GET); //gets the cat_id
require_once('Views/Topics.phtml');