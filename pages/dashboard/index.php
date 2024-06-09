<?php

require '../../includes/functions.php';

$conn = koneksi();
$queryProduk = mysqli_query($conn, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
$kategoriData = [];
while ($row = mysqli_fetch_assoc($queryKategori)) {
  $kategoriData[] = $row;
}
$kategori = [];

// Fungsi pencarian
if (isset($_POST["cari"])) {
  $keyword = $_POST["keyword"];
  $kategori = cariProduk($keyword);
} else {
  // Mengambil semua data produk sebagai default
  $kategori = query("SELECT * FROM produk");
}

include '../../templates/navbardash.php';
?>
<div class="col py-5 my-5 mx-5 px-5">
  <h2>Daftar List Produk</h2>
  <a href="../../pages/crud/tambahProduk.php" class="btn btn-warning mt-5 mb-3"><i class="bi bi-folder-plus"></i> Tambah Produk</a>

  <form action="" method="post">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Cari Produk" aria-autocomplete="off" name="keyword" autocomplete="off" id="keyword">
      <button class="btn btn-warning" type="submit" name="cari" id="tombol-cari">Cari</button>
    </div>
  </form>

  <div class="row row-cols-1 row-cols-md-5 g-4 mt-3 mx-3" id="container">

    <?php if (!empty($kategori)) : ?>
      <?php foreach ($kategori as $produk) : ?>
        <div class="col">
          <div class="card h-100 shadow p-3">
            <?php
            $imgPath = "../crud/img/" . $produk['gambar'];
            if (file_exists($imgPath)) {
              echo "<img src='$imgPath' class='card-img-top' width='390' alt='Gambar Paket'>";
            } else {
              echo "<div class='card-img-top' style='height: 390px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;'>Gambar tidak ditemukan</div>";
            }
            ?>
            <div class="card-body">
              <h5 class="card-title fw-semibold"><?= $produk['nama']; ?></h5>
            </div>


          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center">Tidak ada produk yang ditemukan</p>
    <?php endif; ?>
  </div>

  <script src="../../assets/js/script.js"></script>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95PMTr5tHTo05ONWeZ7qvSpZSmOcn6jR9e7Tw9OKM" crossorigin="anonymous"></script>
  </body>

  </html>