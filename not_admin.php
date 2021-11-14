<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Not Admin';
require_once('Views/not_admin.phtml');