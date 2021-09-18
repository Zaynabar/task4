<?php

function showData($link) {
    $lastTime = date("Y-m-d");
    $id = $_SESSION['id'];
    $query = "UPDATE users SET lastTime = '$lastTime' WHERE social_id = '$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    $content = '    <div class="filters">
      <select name="socialNetwork" class="filterSocialNetwork">
        <option selected disabled>Выберите социальную сеть</option>
        <option value="Facebook">Facebook</option>
        <option value="Google">Google</option>
      </select>
      <select name="status" class="filterStatus">
        <option selected disabled>Выберите статус</option>
        <option value="active">Active</option>
        <option value="blocked">Blocked</option>
      </select>
      <button class="resetFilters">Скинуть фильтры</button>
    </div><table class="table" id="Table">
    <thead>
    <tr>
        <th><input type="checkbox" class="checkBoxPickAllFiltered"></th>
        <th class="id" >Id<img src="./down-arrow.svg" /></th>
        <th class="name" >Name<img src="./down-arrow.svg" /></th>
        <th class="social-network">Social Network<img src="./down-arrow.svg" /></th>
        <th class="first-date">First Data<img src="./down-arrow.svg" /></th>
        <th class="last-date">Last Data<img src="./down-arrow.svg" /></th>
        <th class="status">Status<img src="./down-arrow.svg" /></th>
    </tr></thead><tbody class="tableBody">';

    foreach ($data as $page) {
        $content .= "<tr>
          <td><input type='checkbox' name='check' class='userCheckbox' /></td>
          <td class='userId'>{$page['social_id']}</td>
          <td class='userName'>{$page['name']}</td>
          <td>{$page['socialNet']}</td>
          <td>{$page['firstTime']}</td>
          <td class='lastDate'>{$page['lastTime']}</td>
          <td>{$page['status']}</td>
        </tr>";
    }
    $content .= '</tbody></table>';

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
        if ($file['status'] == 'blocked') {
            $_SESSION['alert'] = 'alert';
            header('location:index.php');
            die();
        }
    }
}
