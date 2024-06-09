<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../../includes/functions.php';
$kategori = query("SELECT * FROM kategori");

$kategori = query("SELECT * FROM kategori");
$cariDitemukan = false;

if (isset($_POST["cari"])) {
  $kategori = cari($_POST["keyword"]);
  $cariDitemukan = !empty($kategori);
}
include '../../templates/navbar.php';

?>
<section class="home" id="home">
  <div class="container">
    <div class="row">
      <div class="col mx-2" style="text-align: justify;">
        <h1 class="fw-bold" style="color: #fff;">Nikmati Suasana Alam <span>Pangalengan</span></h1>
        <p class="mt-3" style="color: #fff;">Green Corner Pangalengan merupakan tempat wisata yang berada di Pangalengan, Kabupaten Bandung. Green Corner Pangalengan menyediakan berbagai fasilitas yang dapat Anda nikmati bersama keluarga dan teman-teman Anda. </p>
        <h3 class="fw-semi-bold" style="color: #fff;">Bersama Green Corner</h3>
        <a class="btn btn-success" href="https://wa.me/6285210010902" role="button">Booking Now</a>
       
      </div>
    </div>
  </div>
</section>

<section class="layanan">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="fw-semibold">Layanan Kami</h2>
        <span class="sub-title">Pelayanan Kami, Kepuasan Anda. Menghadirkan Layanan Berkualitas</span>
      </div>
    </div>
    <div class="row mx-3 my-3">
      <div class="col-md-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="card-layanan">
          <h5 class="mt-3 fw-semibold"><i class="bi bi-person-raised-hand" style="color: green;"></i> Customer Support</h5>
          <p class="mt-3" style="text-align: justify;">Green Corner Pangalengan memiliki prinsip melayani Anda dengan sepenuh Hati serta kemudahan dan selalu siap siaga selama 24 Jam </p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="card-layanan">
          <h5 class="mt-3 fw-semibold"><i class="bi bi-geo-alt-fill" style="color: green;"></i> Lokasi Mudah</h5>
          <p class="mt-3" style="text-align: justify;">Lokasi kami berada berada ditepi danau Situ Cileunca yang akan menyuguhkan pemandangan yang asri serta mudah diakses oleh kendaraan pribadi </p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="card-layanan">
          <h5 class="mt-3 fw-semibold"><i class="bi bi-cash-stack" style="color: green;"></i> Harga Kompetitif</h5>
          <p class="mt-3" style="text-align: justify;">Harga yang kami tawarkan sesuai dengan pelayanan dan fasilitas yang kami berikan untuk Anda. </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="paketlist" id="list">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="fw-semibold">Paket List</h2>
        <span class="sub-title">Ke Pangalengan bingung nyari tempat berkemah, menginap dan outbound? Ke Green Corner banyak pilihan</span>
      </div>
    </div>

    <form action="" method="post">
          <div class="input-group mt-5 shadow ">
            <input type="text" class="form-control" placeholder="Cari Kategori" aria-autocomplete="off" name="keyword" autocomplete="off">
            <button class="btn btn-success" type="submit" name="cari">Cari</button>
          </div>
        </form>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3 mx-3">
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
              <a class="btn btn-success" href="cabin.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
include '../../templates/footer.php';
?>