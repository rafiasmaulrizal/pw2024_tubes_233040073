<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../../includes/functions.php';

$id = $_GET['id'] ?? null;
if ($id === null) {
  header("Location: ../index.php");
  exit;
}

$query = "SELECT * FROM produk WHERE id = $id";
$produk = query($query);

if (empty($produk)) {
  header("Location: ../index.php");
  exit;
}

$produk = $produk[0];
include '../../templates/navbardash.php';
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
        <p><?= $produk['deskripsi']; ?></p>
        <hr>
        <a href="produk.php" class="badge text-bg-success text-decoration-none"> Kembali </a>
        <a href="../../pages/crud/ubahProduk.php?id=<?= $produk['id']; ?>" class="badge text-bg-warning text-decoration-none"><i class="bi bi-eyedropper"></i> Ubah </a>
        <a href="../../pages/crud/hapusProduk.php?id=<?= $produk['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="badge text-bg-danger text-decoration-none"><i class="bi bi-trash"></i> Hapus</a>
      </div>
    </div>
  </div>
</section>

<script src="../../assets/js/script.js"></script>

<?php
include '../../templates/footer.php';
?>