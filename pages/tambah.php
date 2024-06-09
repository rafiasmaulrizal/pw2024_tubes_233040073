<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require "../includes/functions.php";
// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // Cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "<script>
              alert('data berhasil ditambahkan');
              document.location.href = 'dashboard/kategori.php';
            </script>";
  } else {
    echo "<script>
              alert('data gagal ditambahkan');
              document.location.href = 'tambah.php';
            </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Kategori</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class=" container d-flex justify-content-center mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="shadow p-5 col-md-5 center mt-5">
      <h2>Tambah Kategori</h2>
      <hr>
      <div class="mb-3 shadow-sm">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>

      <div class="mb-2 shadow-sm">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
      </div>
      <div class="mb-3 shadow-sm">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" required>
      </div>
      <button type="submit" name="submit" class="btn btn-warning shadow-sm"><i class="bi bi-upload"></i> Tambah</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>