<?php
require_once 'config.php';

$id = $_SESSION['id'];
$query = "UPDATE users SET status = 'active' WHERE social_id = '$id'";
mysqli_query($link, $query) or die(mysqli_error($link));
