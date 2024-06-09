<?php
session_start();


require '../includes/functions.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query(koneksi(), "SELECT * FROM users WHERE username = '$username'");
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      // Cek apakah pengguna adalah admin
      if ($row['role'] === 'admin') {
        // Jika pengguna adalah admin, arahkan ke halaman dashboard admin
        header("Location: dashboard/kategori.php");
        exit;
      } else {
        // Jika pengguna adalah user biasa, arahkan ke halaman detail pengguna
        header("Location: user/detail.php");
        exit;
      }
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oleo+Script" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">

  <title>Login</title>

<body>

  <div class="container d-flex justify-content-center mt-5">
    <form action="" method="post" class="shadow p-5 col-md-5 center mt-5 bg-success p-2 text-dark bg-opacity-10 rounded-4">
      <h2 class="text-center">Login <img src="../assets/img/logogc.png" width="90" alt=""></h2>
      <hr>

      <?php if (isset($error)) : ?>
        <p style="color: red;">Username atau Password salah</p>
      <?php endif; ?>
      <div class="mb-3">
        <label for="username" class="form-label fw-medium" >Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-medium">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <a href="register.php" class="text float-end mt-3 text-decoration-none text-success">
          <p class="text-secondary">Belum punya akun?</p>Register
        </a>
      </div>
      <button type="submit" name="submit" class="btn btn-success mt-4">Login</button>
    </form>

  </div>

  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>