<?php
require "../../includes/functions.php";
$keyword = $_GET['keyword'];
$query = "SELECT * FROM produk
          WHERE
          nama LIKE '%$keyword%' OR
          harga LIKE '%$keyword%' OR
          deskripsi LIKE '%$keyword%' OR
          gambar LIKE '%$keyword%'";
$produk = query($query);
?>

<?php foreach ($produk as $item): ?>
<div class="user">
<div class="card h-100 shadow p-3">
  <?php
  $imgPath = "../../pages/crud/img/" . $item['gambar'];
  if (file_exists($imgPath)) {
    echo "<img src='$imgPath' class='card-img-top' width='390' alt='Gambar Paket'>";
  } else {
    echo "<div class='card-img-top' style='height: 390px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;'>Gambar tidak ditemukan</div>";
  }
  ?>
  <div class="card-body">
    <h5 class="card-title fw-semibold"><?= $item['nama']; ?></h5>
    <p class="card-text fw-medium" style="color: green;">Rp. <?= $item['harga']; ?>K/Malam</p>
    <p class="card-text"><?= $item['deskripsi']; ?></p>
  </div>
  <div class="card-footer">
    <a class="btn btn-success" href="hal-detail.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Selengkapnya</a>
  </div>
</div>
</div>



<?php endforeach; ?>
