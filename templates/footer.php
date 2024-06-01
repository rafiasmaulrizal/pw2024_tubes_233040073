<footer>
  <div class="contact bg-secondary-subtle mt-5" id="contact">
    <div class="container">
      <div class="card-group row-cols-1 row-cols-md-4 px-3 mx-3">
        <div class="col">
          <div class="card-sosial">
            <br>
            <h6 class="card-title fw-medium">Sosial Media</h6>
            <br>
            <a href="https://www.instagram.com/greencornerofficial/?hl=id"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UC7X-1TD9JuCaewa_yDX1gZw"><i class="bi bi-youtube"></i></a>
            <a href="https://www.tiktok.com/@greencornerofficial"><i class="bi bi-tiktok"></i></a>
            <a href="https://www.facebook.com/GreenCornerPangalengan/"><i class="bi bi-facebook"></i></a>
          </div>
        </div>
        <div class="col">
          <div class="card-body">
            <br>
            <h6 class="card-title fw-medium">Link</h6>
            <br>
            <a class="dropdown-item" href="listcamping.html">Camping</a>
            <a class="dropdown-item" href="listcabin.html">Cabin</a>
            <a class="dropdown-item" href="listoutbound.html">Outbound</a>
            <a class="dropdown-item" href="tentangkami.html">Tentang kami</a>
            <a class="dropdown-item" href="contact.html">Kontak kami</a>
            <br><br>
          </div>
        </div>
        <div class="col">
          <div class="card-body">
            <br>
            <h6 class="card-title fw-medium">Lokasi Kami</h6>
            <br>
            <p class="card-text">Green Corner, Kp. Cipangisikan RT 01/RW 07, Desa Warnasari, Kec. Pangalengan, Kab. Bandung 40378 </p>
            <br><br>
          </div>
        </div>
      </div>
      <section class="footer">
        <div class="row mx-3 mt-3">
          <div class="col-md-9 fw-medium">
            <p>Copyright © 2024 Green Corner</p>
          </div>
          <div class="col fw-medium">
            <p>Powered by Green Corner</p>
          </div>
        </div>
        <br>
      </section>
    </div>
  </div>
</footer>
<!-- footer end -->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
  document.addEventListener("DOMContentLoaded", function() {
    <?php if ($cariDitemukan) : ?>
      document.getElementById("list").scrollIntoView({
        behavior: "smooth"
      });
    <?php endif; ?>
  });
</script>
</body>

</html>