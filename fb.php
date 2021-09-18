<?php
include 'config.php';
include 'db.php';

$token = json_decode(file_get_contents('https://graph.facebook.com/v11.0/oauth/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code'], true));

if (!$token) {
    exit('error token');
}

$data = json_decode(file_get_contents('https://graph.facebook.com/v11.0/me?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code'].'&access_token='.$token->access_token.'&fields=id,name,email', true));

$_SESSION['id'] = $data->id;
$_SESSION['user_first_name'] = $data->name;
$SocialNetwork = 'Facebook';

$id = $_SESSION['id'];
$add = mysqli_query($link, "SELECT social_id FROM users WHERE social_id = '$id'");
if (!(mysqli_num_rows($add) > 0)) {
    addData($link, $SocialNetwork);
}

checkData($link);

showData($link);
