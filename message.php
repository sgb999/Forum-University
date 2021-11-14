<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Messages';
$con_id=implode($_GET); //gets the messageID
require_once ('Views/messages.phtml');