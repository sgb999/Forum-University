<?php
$view = new stdClass();
$view->pageTitle = 'Sign-up';
session_start();
require_once('Views/sign-up.phtml');