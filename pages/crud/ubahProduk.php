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
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

// Ambil data kategori dari database
$kategoriData = query("SELECT * FROM kategori");

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // Cek apakah data berhasil diubah atau tidak
  if (ubahProduk($_POST) > 0) {
    echo "<script>
              alert('data berhasil diubah');
              document.location.href = '../dashboard/produk.php';
            </script>";
  } else {
    echo "<script>
              alert('data gagal diubah');
              document.location.href = 'ubahProduk.php';
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
  <div class="container d-flex justify-content-center mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="shadow p-5 col-md-5 center mt-1">
      <h2>Ubah Kategori</h2>
      <hr>
      <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
      <input type="hidden" name="gambarLama" value="<?= $produk["gambar"]; ?>">
      <div class="mb-3 shadow-sm">
        <label for="nama" class="form-label fw-medium">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $produk["nama"]; ?>">
      </div>

      <div class="mb-2 shadow-sm">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select class="form-select" id="kategori_id" name="kategori_id" required>
          <option value="">Pilih Kategori</option>
          <?php foreach ($kategoriData as $kat) : ?>
            <option value="<?= $kat['id']; ?>" <?= $kat['id'] == $produk['kategori_id'] ? 'selected' : '' ?>><?= $kat['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3 shadow-sm">
        <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="<?= $produk["deskripsi"]; ?>">
      </div>

      <div class="mb-2 shadow-sm">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" required value="<?= $produk["harga"]; ?>">
      </div>

      <div class="mb-3 shadow-sm">
        <label for="gambar" class="form-label fw-medium">Gambar</label>
        <img src="img/<?= $produk['gambar']; ?>" width="200" alt="">
        <input type="file" class="form-control" id="gambar" name="gambar">
      </div>

      <button type="submit" name="submit" class="btn btn-warning shadow-sm fw-medium">Ubah</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>