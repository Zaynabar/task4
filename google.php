<?php
include 'config.php';
include 'db.php';
$SocialNetwork = 'Google';


if (isset($_GET["code"])) {
    //$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $google_client->authenticate($_GET['code']);
    $token = $google_client->getAccessToken();

    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['id'])) {
            $_SESSION['id'] = $data['id'];
        }
    }
}

$id = $_SESSION['id'];
$add = mysqli_query($link, "SELECT social_id FROM users WHERE social_id = '$id'");
if (!(mysqli_num_rows($add) > 0)) {
    addData($link, $SocialNetwork);
}

checkData($link);

showData($link);
