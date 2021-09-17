<?php

function showData($link) {
    $lastTime = date("Y-m-d");
    $id = $_SESSION['id'];
    $query = "UPDATE users SET lastTime = '$lastTime' WHERE social_id = '$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    $content = '<table class="table" id="Table">
    <thead>
    <tr>
        <th><input type="checkbox" class="checkBoxPickAllFiltered"></th>
        <th onclick="sortTable(0)" >Id<svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 213.333 213.333"
            style="enable-background: new 0 0 213.333 213.333"
            xml:space="preserve"
          >
            <g>
              <g>
                <polygon points="0,53.333 106.667,160 213.333,53.333 		" />
              </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
          </svg></th>
        <th onclick="sortTable(1)" >Name<svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 213.333 213.333"
            style="enable-background: new 0 0 213.333 213.333"
            xml:space="preserve"
          >
            <g>
              <g>
                <polygon points="0,53.333 106.667,160 213.333,53.333 		" />
              </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
          </svg></th>
        <th onclick="sortTable(2)" class="social-network">Social Network<svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 213.333 213.333"
            style="enable-background: new 0 0 213.333 213.333"
            xml:space="preserve"
          >
            <g>
              <g>
                <polygon points="0,53.333 106.667,160 213.333,53.333 		" />
              </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
          </svg></th>
        <th onclick="sortTable(3)" class="first-date">First Data<svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 213.333 213.333"
            style="enable-background: new 0 0 213.333 213.333"
            xml:space="preserve"
          >
            <g>
              <g>
                <polygon points="0,53.333 106.667,160 213.333,53.333 		" />
              </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
          </svg></th>
        <th onclick="sortTable(4)" class="last-date">Last Data<svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 213.333 213.333"
            style="enable-background: new 0 0 213.333 213.333"
            xml:space="preserve"
          >
            <g>
              <g>
                <polygon points="0,53.333 106.667,160 213.333,53.333 		" />
              </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
          </svg></th>
        <th onclick="sortTable(5)" class="status">Status<svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 213.333 213.333"
            style="enable-background: new 0 0 213.333 213.333"
            xml:space="preserve"
          >
            <g>
              <g>
                <polygon points="0,53.333 106.667,160 213.333,53.333 		" />
              </g>
            </g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
            <g></g>
          </svg></th>
    </tr></thead><tbody>';

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
        if ($file['status'] == 'locked') {
            $_SESSION['alert'] = 'alert';
            header('location:index.php');
            die();
        }
    }
}
