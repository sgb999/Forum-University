<?php
$view = new stdClass();
$view->pageTitle = 'sign-in';
session_start();
require_once ('Views/sign-in.phtml');