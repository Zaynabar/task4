<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
require_once 'vendor/autoload.php';

define('ID', '586393172492425');
define('SECRET', 'a50840f11cb1f409cdb50516185fd14b');
define('URL', 'http://localhost/task4/fb.php');

$google_client = new Google_Client();
$google_client->setClientId('82478093931-fu006kfgm3fck92q3f5blgmrko3u44j1.apps.googleusercontent.com');
$google_client->setClientSecret('PVWh0Y0R7oPvWYj-EQATGRRL');
$google_client->setRedirectUri('http://localhost/task4/google.php');


$google_client->addScope('email');
$google_client->addScope('profile');

/* //Connect using localhost
$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'user';

$link = mysqli_connect($host, $user, $password, $dbName);
mysqli_query($link, "SET NAMES 'utf8'");*/

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
var_dump($cleardb_url);
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = true;
// Connect to DB
//$link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
