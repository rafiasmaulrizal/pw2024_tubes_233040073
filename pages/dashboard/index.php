<?php

require '../../includes/functions.php';

$kategori = query("SELECT * FROM kategori");

if (isset($_POST["cari"])) {
  $kategori = cari($_POST["keyword"]);
}
include '../../templates/navbardash.php';

?>

<div class="container  my-5 py-5 ">
  <h2>Daftar List</h2>
  <a href="../tambah.php" class="btn btn-warning mt-3 mb-3"><i class="bi bi-folder-plus"></i> Tambah Kategori</a>
  <br><br>
  <form action="" method="post">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Cari Kategori" aria-autocomplete="off" name="keyword" autocomplete="off">
      <button class="btn btn-warning" type="submit" name="cari">Cari</button>
    </div>
  </form>

  <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mx-3 mb-5">
    <?php $i = 1; ?>

    <?php foreach ($kategori as $kategori) : ?>
      <div class="col" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
        <div class="card h-100 shadow p-3">
          <?php
          $imgPath = "../../assets/img/" . $kategori['gambar'];
          if (file_exists($imgPath)) {
            echo "<img src='$imgPath' class='card-img-top' width='390' alt='Gambar Paket'>";
          } else {
            echo "<div class='card-img-top' style='height: 390px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;'>Gambar tidak ditemukan</div>";
          }
          ?>

          <div class="card-body">
            <h5 class="card-title fw-semibold"><?= $kategori['nama']; ?></h5>
            <p class="card-text"><?= $kategori['deskripsi']; ?></p>
          </div>

          <div class="card-footer">
            <a href="../ubah.php?id=<?= $kategori['id']; ?>" class="badge text-bg-warning text-decoration-none"><i class="bi bi-eyedropper"></i> Ubah </a>
            <a href="../hapus.php?id=<?= $kategori['id']; ?>" onclick="return confirm('yakin?');" class="badge text-bg-danger text-decoration-none"><i class="bi bi-trash"></i> Hapus</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- bootsrap bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>