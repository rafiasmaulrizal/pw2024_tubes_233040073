<?php
session_start();
require '../../includes/functions.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $users = query("SELECT * FROM users WHERE id = $id")[0];
}
if (isset($_POST['ubah'])) {
  $id = $_POST['id'];
  $new_username = $_POST['new_username']; // Mengambil username baru dari formulir

  if (ubahProfil($id, $new_username) > 0) { // Menghapus parameter $role
    echo "<script>
            alert('Data Berhasil Diubah!');
            document.location.href = '../dashboard/users.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diubah!');
            document.location.href = 'ubahUsers.php';
          </script>";
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ubah Data Users</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <form action="" method="POST" enctype="multipart/form-data" class="shadow p-5 col-md-5 center mt-1">
      <input type="hidden" name="id" value="<?= $users["id"]; ?>">
      <h2>Hallo, <?php echo $username; ?></h2>
      <hr>

      <div class="mb-3">
        <label for="new_username" class="form-label fw-bold">Username Baru</label>
        <input type="text" class="form-control" id="new_username" name="new_username" required autocomplete="off" value="<?= $username; ?>">
      </div>
      <button type="submit" class="btn btn-warning fw-bold" name="ubah">Ubah</button>
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
