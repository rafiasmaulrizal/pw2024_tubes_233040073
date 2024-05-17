<?php
require '../includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oleo+Script" rel="stylesheet">
  <title>Login</title>

  <!-- Bootstrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- icon bootstrap -->

<body>
  <div class="container">
    <h1>Login Admin</h1>
    <img src="img/logo.png" alt="">
    <?php
    if (isset($error)) : ?>
      <p> Username / Password salah</p>
    <?php endif; ?>
    <ul>

      <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit" name="submit">Login</button>
      </form>
    </ul>
  </div>

  <!-- bootsrap bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>