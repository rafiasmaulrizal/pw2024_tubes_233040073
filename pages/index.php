<?php
require '../includes/functions.php';
$kategori = query("SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Green Corner</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top bg-body-tertiary navbar-expand-xl shadow p-3 bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../assets/img/logogc.png" alt="Bootstrap" width="95" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav text-align">
          <li class="nav-item">
            <a class="nav-link active fw-medium" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <?php if (isLoggedIn()) : ?>
              <a class="nav-link active fw-medium" aria-current="page" href="../pages/user/detail.php?id=<?= $kategori['id']; ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Produk</a>
            <?php else : ?>
              <a class="nav-link active fw-medium" aria-current="page" href="login.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Produk</a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (isLoggedIn()) : ?>
              <a class="nav-link active fw-medium" aria-current="page" href="../pages/user/detail.php?id=<?= $kategori['id']; ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Tentang kami</a>
            <?php else : ?>
              <a class="nav-link active fw-medium" aria-current="page" href="login.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Tentang kami</a>
            <?php endif; ?>
          <li class="nav-item">
            <?php if (isLoggedIn()) : ?>
              <a class="nav-link active fw-medium" aria-current="page" href="../pages/user/detail.php?id=<?= $kategori['id']; ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Kontak</a>
            <?php else : ?>
              <a class="nav-link active fw-medium" aria-current="page" href="login.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Kontak</a>
            <?php endif; ?>
          </li>
        </ul>
        <div class="col-md-3 text-end">
          <a href="login.php" class="btn btn-outline-success me-2">Login</a>
          <a href="register.php" class="btn btn-success">Sign-up</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Home -->
  <section class="home" id="home">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="col mx-2" style="text-align: justify;">
          <h1 class="fw-bold" style="color: #fff;">Nikmati Suasana Alam <span>Pangalengan</span></h1>
          <p class="mt-3" style="color: #fff;">Green Corner Pangalengan merupakan tempat wisata yang berada di Pangalengan, Kabupaten Bandung. Green Corner Pangalengan menyediakan berbagai fasilitas yang dapat Anda nikmati bersama keluarga dan teman-teman Anda. </p>
          <h3 class="fw-semi-bold" style="color: #fff;">Bersama Green Corner</h3>
          <a class="btn btn-success" href="https://wa.me/6285210010902" role="button">Booking Now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Home End -->

  <!-- List Layanan -->
  <section class="layanan">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="col-12 text-center">
          <h2 class="fw-semibold">Layanan Kami</h2>
          <span class="sub-title">Pelayanan Kami, Kepuasan Anda. Menghadirkan Layanan Berkualitas</span>
        </div>
      </div>
      <div class="row mt-2 mx-5 my-5">
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
  <!-- List Layanan End-->

  <!-- List Paket -->
  <section class="paketlist" id="list">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="col-12 text-center">
          <h2 class="fw-semibold">Paket List</h2>
          <span class="sub-title">Ke Pangalengan bingung nyari tempat berkemah, menginap dan outbound? Ke Green Corner banyak pilihan</span>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mx-3">
        <?php foreach ($kategori as $item) : ?>
          <div class="col" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1200">
            <div class="card h-100 shadow p-3">
              <?php
              $imgPath = "../assets/img/" . $item['gambar'];
              if (file_exists($imgPath)) {
                echo "<img src='$imgPath' class='card-img-top' width='390' alt='Gambar Paket'>";
              } else {
                echo "<div class='card-img-top' style='height: 390px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;'>Gambar tidak ditemukan</div>";
              }
              ?>
              <div class="card-body">
                <h5 class="card-title fw-semibold"><?= $item['nama']; ?></h5>
                <p class="card-text"><?= $item['deskripsi']; ?></p>
              </div>
              <div class="card-footer">
                <?php if (isLoggedIn()) : ?>
                  <a class="btn btn-success" href="../pages/user/detail.php?id=<?= $item['id']; ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Selengkapnya</a>
                <?php else : ?>
                  <a class="btn btn-success" href="login.php" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Selengkapnya</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- List Paket End -->

  <?php
  include '../templates/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-j57Jd5rN2MdaT+qep0Pp3tYhkLgF3N3jozFWnSJ2MgjpjU6lC8k2x5z8FqY5KfHI" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>