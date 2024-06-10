<?php
require '../../includes/functions.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $users = query("SELECT * FROM users WHERE id = $id")[0];
}
if (isset($_POST['ubah'])) {
  $id = $_POST['id'];
  $username = $_POST['nama'];

  if (ubahProfile($id, $username, $role) > 0) {
    echo "<script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'cabin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diubah!');
            document.location.href = 'ubah-detail.php';
          </script>";
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ubah Profil</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container d-flex justify-content-center mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="shadow p-5 col-md-5 center mt-1">
      <h2>Ubah Profil</h2>
      <hr>
      <input type="hidden" name="id" value="<?= $users["id"]; ?>">
      <input type="hidden" name="gambarLama" value="<?= $users["gambar"]; ?>">
      <div class="mb-3 shadow-sm">
        <label for="gambar" class="form-label fw-medium">Gambar</label>
        <img src="img/<?= $produk['gambar']; ?>" width="200" alt="">
        <input type="file" class="form-control" id="gambar" name="gambar">
      </div>

      <div class="mb-3 shadow-sm">
        <label for="nama" class="form-label fw-medium"> Username</label>
        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $users["username"]; ?>">
      </div>
      
      <div class="mb-3 shadow-sm">
        <label for="nama" class="form-label fw-medium"> Password</label>
        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $users["password"]; ?>">
      </div>
      
      <button type="submit" name="submit" class="btn btn-warning shadow-sm fw-medium">Ubah</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
