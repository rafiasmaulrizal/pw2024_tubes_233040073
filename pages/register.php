<?php
require '../includes/functions.php';

if (isset($_POST['submit'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('Registrasi Berhasil');
          document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
          alert('Registrasi Gagal');
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!-- icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container d-flex justify-content-center">
    <form action="" method="post" class="shadow p-5 col-md-5 center mt-5 bg-success p-2 text-dark bg-opacity-10 rounded-4">
    <h2 class="text-center">Daftar <img src="../assets/img/logogc.png" width="90" alt=""></h2>
    <div class="mb-3">
        <label for="username" class="form-label fw-medium ">Nama</label>
        <input type="text" class="form-control " id="username" name="username" required >
      </div>
      <div class="mb-3">
        <label for="email" class="form-label fw-medium">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label fw-medium">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-5 ">
        <label for="password2" class="form-label fw-medium">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password2" name="password2" required>
      <button type="submit" name="submit" class="btn btn-success mt-4">Register</button>
    </form>



  <!-- bootsrap bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>