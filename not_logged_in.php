<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Page1';
require_once('Views/not_logged_in.phtml');