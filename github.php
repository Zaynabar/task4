<?php
require_once 'config.php';
require_once 'db.php';

$code = $_GET['code'];
/*
$response = json_decode(file_get_contents('https://github.com/login/oauth/access_token?client_id='.GITID.'&client_secret='.GSECRET.'&code='.$_GET['code'], true));

if (!$response) {
    exit('error token');
}

$data = json_decode(file_get_contents('https://api.github.com/user?access_token='.$response->access_token, true));
*/

if (!empty($_GET['code'])) {
    $params = array(
        'client_id'     => GITID,
        'client_secret' => GSECRET,
        'redirect_uri'  => GITURL,
        'code'          => $_GET['code']
    );

    $ch = curl_init('https://github.com/login/oauth/access_token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    parse_str($data, $data);

    if (!empty($data['access_token'])) {
        $ch = curl_init('https://api.github.com/user');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: token ' . $data['access_token']));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $info = curl_exec($ch);
        curl_close($ch);
        $info = json_decode($info, true);
    }
}

$_SESSION['id'] = $info['id'];
$_SESSION['user_first_name'] = $info['login'];
$SocialNetwork = 'Github';

$id = $_SESSION['id'];
$add = mysqli_query($link, "SELECT social_id FROM users WHERE social_id = '$id'");
if (!(mysqli_num_rows($add) > 0)) {
    addData($link, $SocialNetwork);
}

checkData($link);

showData($link);
