<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../../includes/functions.php';

$kategoriData = query("SELECT * FROM kategori");

$produk = query("SELECT * FROM produk");
$cariDitemukan = true;

// Cari produk berdasarkan kategori
if (isset($_POST["cari"])) {
  $keyword = $_POST["keyword"];
  $kategoriId = $_POST["kategori_id"];

  $query = "SELECT * FROM produk WHERE nama LIKE '%$keyword%'";

  if (!empty($kategoriId)) {
    $query .= " AND kategori_id = $kategoriId";
  }

  $produk = query($query);
  $cariDitemukan = !empty($produk);
}
include '../../templates/navbar.php';
?>

<section class="cabin" id="cabin">
  <div class="container py-5">
    <div class="row">
      <div class="col-12 px-5 text-center">
        <h2 class="fw-semibold">
          Temukan Paket Menginap dan Outbound di Green Corner
        </h2>
        <br>
        <span class="sub-title fw-medium" style="color: grey;">"Selain menyediakan pengalaman berkemah yang tak terlupakan di Camping Ground Green Corner, kami juga bangga mempersembahkan fasilitas eksklusif kami berupa cabin yang nyaman. Dengan kabin-kabin modern dan berbagai kenyamanan, Cottage yang pemandangannya memanjakan mata. dan juga ada outbound Green Corner menjadi destinasi ideal untuk menikmati alam sambil merasakan kesejukan dan kenyamanan yang tak terhingga." </span>
      </div>
    </div>

    <form method="POST" class="input-group mt-5 shadow">
      <input type="text" class="form-control" placeholder="Cari Produk" aria-autocomplete="off" name="keyword" autocomplete="off" id="keyword">
      <select class="form-select" id="kategori_id" name="kategori_id">
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategoriData as $kat) : ?>
          <option value="<?= $kat['id']; ?>"><?= $kat['nama']; ?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-success " type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mx-3" id="container">
      <?php if ($cariDitemukan) : ?>
        <?php foreach ($produk as $item) : ?>
          <div class="col">
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
                <a class="btn btn-success" href="hal-detail.php?id=<?= $item['id']; ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Selengkapnya</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        
      <?php else : ?>
        <div class="col-12 text-center">
          <p>Tidak ada produk yang ditemukan.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<script src="../../assets/js/script.js"></script>

<?php
include '../../templates/footer.php';
?>