<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
require_once 'vendor/autoload.php';

define('ID', '586393172492425');
define('SECRET', 'a50840f11cb1f409cdb50516185fd14b');
define('URL', 'https://authdev.herokuapp.com/fb.php');

//Google auth
define('GOOGLE_ID', '963788022481-elled9r3fgmbcnu90ttg9du69jnufv32.apps.googleusercontent.com');
define('GOOGLE_SECRET', 'gFjjCaQDyCzJzn2DYulz7RDk');
define('GOOGLE_URL', 'https://authdev.herokuapp.com/google.php');

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
