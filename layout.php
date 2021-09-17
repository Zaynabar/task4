<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="tableStyle.css?v=2">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <title>Task4</title>
  <script src='./main.js' defer></script>
</head>

<body>
  <div id="sidebar">
    <a href="block.php" role="button"><i class='bx bxs-lock-alt'></i></a>
    <a href="#"><i class='bx bx-lock-open-alt'></i></a>
    <a href="logout.php"><i class='bx bxs-minus-circle'></i></a>
  </div>
  <main>
    <?= $content ?>
  </main>
</body>

</html>