<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Chats';
require_once ('Views/chats.phtml');