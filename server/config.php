<?php
ini_set('display_errors', 1);
error_reporting(1);
header('Access-Control-Allow-Origin: *');

$host = "mysql.hostinger.co.uk";
$dbname = "u947120400_db";

$user = "u947120400_usr";
$pass = "Integer7_";

$table_city = "city";
$table_state = "state";

$q = isset($_GET["q"]) ? $_GET["q"] : "";