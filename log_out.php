<?php
session_start();
unset($_SESSION['user_id']); //ends user_id session
unset($_SESSION['user_name']); //ends user_name session
unset($_SESSION['user_level']); //ends user_Level session
header("Location: index.php"); //redirects to index page
exit;