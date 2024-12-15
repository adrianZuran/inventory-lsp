<?php 
session_start();
session_destroy();
header('location: http://localhost/lastdrill/login.php');
exit();