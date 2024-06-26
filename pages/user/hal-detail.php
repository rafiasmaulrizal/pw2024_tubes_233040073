<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../../includes/functions.php';

// Ambil ID produk dari URL
$id = $_GET['id'] ?? null;
if ($id === null) {
  header("Location: ../index.php");
  exit;
}

// Query untuk mengambil detail produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id = $id";
$produk = query($query);

if (empty($produk)) {
  header("Location: ../index.php");
  exit;
}

$produk = $produk[0];
include '../../templates/navbar.php';
?>

<section class="produk-detail py-5 mt-5" id="produk-detail">
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <?php
        $imgPath = "../../pages/crud/img/" . $produk['gambar'];
        if (file_exists($imgPath)) {
          echo "<img src='$imgPath' class='img-fluid' alt='Gambar Produk'>";
        } else {
          echo "<div style='height: 390px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;'>Gambar tidak ditemukan</div>";
        }
        ?>
      </div>
      <div class="col-md-6">
        <h2 class="fw-semibold"><?= $produk['nama']; ?></h2>
        <p class="fw-medium" style="color: green;">Rp. <?= $produk['harga']; ?>K/Malam</p>
        <p><?= $produk['deskripsi']; ?></p><hr>
        <a class="btn btn-success" href="cabin.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Kembali</a>
        </div>
    </div>
  </div>
</section>

<script src="../../assets/js/script.js"></script>

<?php
include '../../templates/footer.php';
?>
