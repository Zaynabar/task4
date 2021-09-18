<?php
require_once 'config.php';

$id = $_SESSION['id'];
$query = "DELETE FROM users WHERE social_id = '$id'";
mysqli_query($link, $query) or die(mysqli_error($link));

header('location:index.php');
die();
