<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
require_once 'vendor/autoload.php';

define('ID', '586393172492425');
define('SECRET', 'a50840f11cb1f409cdb50516185fd14b');
define('URL', 'https://authdev.herokuapp.com/fb.php');


// local 82478093931-fu006kfgm3fck92q3f5blgmrko3u44j1.apps.googleusercontent.com
//       PVWh0Y0R7oPvWYj-EQATGRRL

$google_client = new Google_Client();
$google_client->setClientId('963788022481-lvothob8d4v2vcecqv2e5a04e0u43vjf.apps.googleusercontent.com');
$google_client->setClientSecret('DMFji0G2pR9cFlBPGpJMDzch');
$google_client->setRedirectUri('https://authdev.herokuapp.com/google.php');


$google_client->addScope('email');
$google_client->addScope('profile');

/* //Connect using localhost
$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'user';

$link = mysqli_connect($host, $user, $password, $dbName);
mysqli_query($link, "SET NAMES 'utf8'");*/

//$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = "eu-cdbr-west-01.cleardb.com";
$cleardb_username = "b72ed04a7b9946";
$cleardb_password = "8b51b605";
$cleardb_db = substr("/heroku_8141e4d26c8623a", 1);
$active_group = 'default';
$query_builder = true;
// Connect to DB
$link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
mysqli_query($link, "SET NAMES 'utf8'");
