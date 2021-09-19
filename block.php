<?php
require_once 'config.php';

$query = "SELECT * FROM users";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

foreach ($data as $page) {
    if ($page['status'] == 'blocked') {
        $_SESSION['alert'] = 'alert';
        header('location:index.php');
        die();
    } else {
        $_SESSION['alert'] = '';
        $id = $_SESSION['id'];
        $query = "UPDATE users SET status = 'blocked' WHERE social_id = '$id'";
        mysqli_query($link, $query) or die(mysqli_error($link));

        header('location:index.php');
        die();
    }
}
