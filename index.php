<?php
$view = new stdClass();
$view->pageTitle = 'Categories';
session_start();
require_once('Views/getCategories.phtml');