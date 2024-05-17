<?php
require "../includes/functions.php";

// Ambil data di URL
$id = $_GET["id"];
// Query data berdasarkan id
$kategori = query("SELECT * FROM kategori WHERE id = $id")[0];

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // Cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    echo "<script>
              alert('data berhasil diubah');
              document.location.href = 'index.php';
            </script>";
  } else {
    echo "<script>
              alert('data gagal diubah');
              document.location.href = 'index.php';
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
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container col-5 mt-4">
    <h2>Ubah Kategori</h2>
    <hr>
    <br>

    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $kategori["id"]; ?>">

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $kategori["nama"]; ?>">
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="<?= $kategori["deskripsi"]; ?>">
      </div>

      <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" required value="<?= $kategori["lokasi"]; ?>">
      </div>

      <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="text" class="form-control" id="gambar" name="gambar" required value="<?= $kategori["gambar"]; ?>">
      </div>

      <button type="submit" name="submit" class="btn btn-warning">Ubah</button>
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>