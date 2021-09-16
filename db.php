<?php

function showData($link) {
    $lastTime = date("Y-m-d");
    $id = $_SESSION['id'];
    $query = "UPDATE users SET lastTime = '$lastTime' WHERE social_id = '$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    $content = '<table id="Table">
    <tr>
        <th><input type="checkbox"></th>
        <th onclick="sortTable(0)" >Id</th>
        <th onclick="sortTable(1)" >Name</th>
        <th onclick="sortTable(2)" >Social Network</th>
        <th onclick="sortTable(3)" >First Data</th>
        <th onclick="sortTable(4)" >Last Data</th>
        <th onclick="sortTable(5)" >Status</th>
    </tr>';

    foreach ($data as $page) {
        $content .= "<tr>
            <td><input type=\"checkbox\" name=\"check[]\" value=\"123\"></td>
            <td>{$page['social_id']}</td>
            <td>{$page['name']}</td>
            <td>{$page['socialNet']}</td>
            <td>{$page['firstTime']}</td>
            <td>{$page['lastTime']}</td>
            <td>{$page['status']}</td>
        </tr>";
    }
    $content .= '</table></form>';

    include 'layout.php';
}

function addData($link, $net) {
    $id = $_SESSION['id'];
    $name = $_SESSION['user_first_name'];
    $socialNetwork = $net;
    $firstTime = date("Y-m-d");
    $LastTime = date("Y-m-d");
    $status = 'active';

    $query = "INSERT INTO users (social_id, name, socialNet, firstTime, lastTime, status) 
            VALUES ('$id', '$name', '$socialNetwork', '$firstTime', '$LastTime', '$status')";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

function checkData($link) {
    $id = $_SESSION['id'];
    $check = mysqli_query($link, "SELECT status FROM users WHERE social_id = '$id'");
    for ($data = []; $row = mysqli_fetch_assoc($check); $data[] = $row);
    foreach ($data as $file) {
        if ($file['status'] == 'locked') {
            $_SESSION['alert'] = 'alert';
            header('location:index.php');
            die();
        }
    }
}
