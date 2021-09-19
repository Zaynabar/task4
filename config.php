<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
require_once 'vendor/autoload.php';

define('ID', '586393172492425');
define('SECRET', 'a50840f11cb1f409cdb50516185fd14b');
define('URL', 'https://authdev.herokuapp.com/fb.php');

//Google auth
/*
$google_client = new Google_Client();
$google_client->setClientId('963788022481-elled9r3fgmbcnu90ttg9du69jnufv32.apps.googleusercontent.com');
$google_client->setClientSecret('gFjjCaQDyCzJzn2DYulz7RDk');
$google_client->setRedirectUri('https://authdev.herokuapp.com/google.php');

$google_client->addScope('email');
$google_client->addScope('profile');*/

$params = array(
    'client_id'     => '963788022481-lvothob8d4v2vcecqv2e5a04e0u43vjf.apps.googleusercontent.com',
    'client_secret' => 'gFjjCaQDyCzJzn2DYulz7RDk',
    'redirect_uri'  => 'https://authdev.herokuapp.com/google.php',
    'grant_type'    => 'authorization_code',
    'code'          => $_GET['code']
);

//Github auth
define('GITID', '44bba7d3add65d4185b4');
define('GSECRET', '6d9f121700f938597e8df3d0175fa3b95778d1c2');
define('GITURL', 'https://authdev.herokuapp.com/github.php');

//$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = "eu-cdbr-west-01.cleardb.com";
$cleardb_username = "b72ed04a7b9946";
$cleardb_password = "8b51b605";
$cleardb_db = substr("/heroku_8141e4d26c8623a", 1);
$active_group = 'default';
$query_builder = true;

$link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
mysqli_query($link, "SET NAMES 'utf8'");
