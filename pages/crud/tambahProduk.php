<?php
require '../../includes/functions.php';

// Ambil data kategori
$kategoriData = query("SELECT * FROM kategori");

// Fungsi untuk menambah produk
if (isset($_POST["submit"])) {
  if (tambahProduk($_POST) > 0) {
    echo "<script>alert('Data berhasil ditambahkan!');</script>";
    header("Location:../dashboard/produk.php");
    exit;
  } else {
    echo "<script>alert('Data gagal ditambahkan!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Produk</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <div class="container mt-5">
    <!-- Form Tambah Produk -->
    <div class="row">
      <div class="col-md-6">
        <h2>Tambah Produk</h2>
        <hr>
        <form action="" method="post" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-body rounded">
          <div class="mb-2 shadow-sm">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="mb-2 shadow-sm">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-select" id="kategori_id" name="kategori_id" required>
              <option value="">Pilih Kategori</option>
              <?php foreach ($kategoriData as $kat) : ?>
                <option value="<?= $kat['id']; ?>"><?= $kat['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-2 shadow-sm">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
          </div>

          <div class="mb-2 shadow-sm">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>

          <div class="mb-3 shadow-sm">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
          </div>

          <button type="submit" name="submit" class="btn btn-warning shadow-sm"><i class="bi bi-upload"></i> Tambah</button>
        </form>
      </div>
</body>

</html>