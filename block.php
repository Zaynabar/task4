<?php
require_once 'config.php';

if (isset($_POST['check'])) {
    print_r($_POST['check']);
    echo "Work";
} else {
    echo "Not work";
}
/*
$id = $_SESSION['id'];
$query = "UPDATE users SET status = 'locked' WHERE social_id = '$id'";
mysqli_query($link, $query) or die(mysqli_error($link));

header('location:index.php');
die();
*/
