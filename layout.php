<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./tableStyle.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <title>Task4</title>
</head>

<body>
  <div id="sidebar">
    <a href="block.php"><i class='bx bxs-lock-alt'></i></a>
    <a href="unblock.php"><i class='bx bx-lock-open-alt'></i></a>
    <a href="logout.php"><i class='bx bxs-minus-circle'></i></a>
  </div>
  <main>
    <?= $content ?>
  </main>
  <script src='./main.js' defer></script>
</body>

</html>