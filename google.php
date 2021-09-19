<?php
include 'config.php';
include 'db.php';
$SocialNetwork = 'Google';

if (!empty($_GET['code'])) {
    $ch = curl_init('https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);
 
    if (!empty($data['access_token'])) {
        $params = array(
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        );

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));
        $info = json_decode($info, true);
        print_r($info);
    }
}

$_SESSION['id'] = $info['id'];
$_SESSION['user_first_name'] = $info['given_name'];

$id = $_SESSION['id'];
$add = mysqli_query($link, "SELECT social_id FROM users WHERE social_id = '$id'");
if (!(mysqli_num_rows($add) > 0)) {
    addData($link, $SocialNetwork);
}

//checkData($link);

showData($link);
