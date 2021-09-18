<?php
require_once 'config.php';
require_once 'db.php';

$code = $_GET['code'];

if (!$code) {
    exit('error code');
}

$response = json_decode(file_get_contents('https://github.com/login/oauth/access_token?client_id='.GITID.'&client_secret='.GSECRET.'&code='.$_GET['code'], true));

if (!$response) {
    exit('error token');
}

$data = json_decode(file_get_contents('https://api.github.com/user?access_token='.$response->access_token, true));
var_dump($data);
