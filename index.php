<?php
include 'config.php';

/*<a href="https://accounts.google.com/o/oauth2/auth?client_id=<?=$params['client_id']?>&redirect_uri=<?=$params['redirect_uri']?>&response_type=code&scope=profile" target="_blank">Login with Google</a>
*/
$params = array(
  'client_id'     => '963788022481-elled9r3fgmbcnu90ttg9du69jnufv32.apps.googleusercontent.com',
  'redirect_uri'  => 'https://authdev.herokuapp.com/google.php',
  'response_type' => 'code',
  'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
  'state'         => '123'
);

$url = 'https://accounts.google.com/o/oauth2/auth?' . urldecode(http_build_query($params));
echo '<a href="' . $url . '">Авторизация через Google</a>';
?>

<br />
<a href="https://www.facebook.com/v12.0/dialog/oauth?client_id=<?=ID?>&redirect_uri=<?=URL?>&response_type=code&scope=public_profile,email" target="_blank">Login with Facebook</a>
<br />
<a href="https://github.com/login/oauth/authorize?client_id=<?=GITID?>&redirect_uri=<?=GITURL?>&scope=user" target="_blank">Login with Github</a>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./styles.css" />
    <script src="./app.js" defer></script>
  </head>
  <body>
    <section class="first-section">
      <div class="container">
        <div class="left">
          
          <h1 class="left__title">Statistic</h1>
          <p class="left__desription">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos
            ex voluptatum expedita! Voluptates repudiandae rerum iusto
            laboriosam animi veritatis quas porro officia architecto tempora,
            dicta quidem consequatur, aut laborum cupiditate saepe ullam
            explicabo hic? Commodi, eligendi quis debitis sit provident ut,
            labore expedita qui voluptatibus vero eaque, molestias cumque enim!
          </p>
          <ul class="social-list">
            <li class="social-list-item">Facebook</li>
            <li class="social-list-item">Google</li>
            <li class="social-list-item">Github</li>
          </ul>
        </div>
        <div class="right">
          <canvas id="myChart" width="400" height="400"></canvas>
        </div>
      </div>
    </section>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
      integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </body>
</html>