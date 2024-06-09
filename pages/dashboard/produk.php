<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../../includes/functions.php';

$conn = koneksi();
$queryProduk = mysqli_query($conn, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
$kategoriData = [];
while ($row = mysqli_fetch_assoc($queryKategori)) {
  $kategoriData[] = $row;
}
$produk = [];

// Fungsi pencarian
if (isset($_POST["cari"])) {
  $keyword = $_POST["keyword"];
  $kategoriId = $_POST["kategori_id"];

  $query = "SELECT * FROM produk WHERE nama LIKE '%$keyword%'";
  if (!empty($kategoriId)) {
    $query .= " AND kategori_id = $kategoriId";
  }

  $produk = query($query);
} else {
  $produk = query("SELECT * FROM produk");
}

include '../../templates/navbardash.php';
?>
<div class="col py-5 my-5 mx-5 px-5">
  <h2>Daftar List Produk</h2>
  <a href="../../pages/crud/tambahProduk.php" class="btn btn-warning mt-5 mb-3"><i class="bi bi-folder-plus"></i> Tambah Produk</a>

  <form method="POST" class="input-group">
      <input type="text" class="form-control" placeholder="Cari Produk" aria-autocomplete="off" name="keyword" autocomplete="off" id="keyword">
      <select class="form-select" id="kategori_id" name="kategori_id">
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategoriData as $kat) : ?>
          <option value="<?= $kat['id']; ?>"><?= $kat['nama']; ?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-warning " type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>

  <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mx-3" id="container">

    <?php if (!empty($produk)) : ?>
      <?php foreach ($produk as $item) : ?>
        <div class="col">
          <div class="card h-100 shadow p-3">
            <?php
            $imgPath = "../crud/img/" . $item['gambar'];
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
              <a href="halProduk.php?id=<?= $item['id']; ?>" class="badge text-bg-success text-decoration-none"><i class="bi bi-eye-fill"></i> Lihat </a>
              <a href="../../pages/crud/ubahProduk.php?id=<?= $item['id']; ?>" class="badge text-bg-warning text-decoration-none"><i class="bi bi-eyedropper"></i> Ubah </a>
              <a href="../../pages/crud/hapusProduk.php?id=<?= $item['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="badge text-bg-danger text-decoration-none"><i class="bi bi-trash"></i> Hapus</a>
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
</div>
</body>
</html>
