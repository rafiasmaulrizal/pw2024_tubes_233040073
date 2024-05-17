<?php
require '../includes/functions.php';

$kategori = query("SELECT * FROM kategori");

if (isset($_POST["cari"])) {
  $kategori = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- Bootstrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!-- icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="container mt-4">
    <h2>Daftar List</h2>
    <a href="tambah.php" class="btn btn-warning mt-3 mb-3">Tambah Kategori</a>

    <br>
    <br>
    <form action="" method="post">


      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Kategori" aria-autocomplete="off" name="keyword" autocomplete="off" autofocus>
        <button class="btn btn-warning" type="submit" name="cari">Cari</button>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Aksi</th>
          <th scope="col">Nama</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Gambar</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1; ?>
        <?php foreach ($kategori as $kategori) : ?>

          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td>
              <a href="ubah.php?id=<?= $kategori['id']; ?>" class="badge text-bg-warning text-decoration-none">Ubah </a><a href="hapus.php?id=<?= $kategori['id']; ?>" onclick="return confirm('yakin?');" class="badge text-bg-danger text-decoration-none">Hapus</a>
            </td>
            <td><?= $kategori['nama']; ?></td>
            <td><?= $kategori['deskripsi']; ?></td>
            <td><?= $kategori['lokasi']; ?></td>
            <td><?= $kategori['gambar']; ?></td>
          </tr>

        <?php endforeach; ?>

      </tbody>
    </table>
  </div>

  <!-- bootsrap bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>