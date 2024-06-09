<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require "../../includes/functions.php";

// Ambil data di URL
$id = $_GET["id"];

// Query data berdasarkan id
$users = query("SELECT * FROM users WHERE id = $id")[0];

// // Ambil data kategori dari database
$role = query("SELECT * FROM users");

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // Cek apakah data berhasil diubah atau tidak
  if (ubahUsers($_POST) > 0) {
    echo "<script>
              alert('data berhasil diubah');
              document.location.href = '../dashboard/users.php';
            </script>";
  } else {
    echo "<script>
              alert('data gagal diubah');
              document.location.href = 'ubahUser.php';
            </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- link css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="shadow p-5 col-md-5 center mt-1">
      <h2>Ubah Users</h2>
      <hr>
      <input type="hidden" name="id" value="<?= $users["id"]; ?>">
      <input type="hidden" name="gambarLama" value="<?= $produk["gambar"]; ?>">
      <div class="mb-3 shadow-sm">
        <label for="nama" class="form-label fw-medium">Username</label>
        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $users["username"]; ?>">
      </div>

      <div class="mb-2 shadow-sm">
        <label for="role" class="form-label">Kategori</label>
        <select class="form-select" id="role" name="role" required>
          <option value="">Pilih Role</option>
          <?php foreach ($role as $role) : ?>
            <option value="<?= $role['id']; ?>" <?= $role['id'] == $users['role'] ? 'selected' : '' ?>><?= $role['role']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      

      <button type="submit" name="submit" class="btn btn-warning shadow-sm fw-medium">Ubah</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>