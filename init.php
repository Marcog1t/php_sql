<?php
//show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SESSION["user"] == ""){
header("location: log.php");}
else{echo 'sessione attiva';}

