<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <nav class="navbar fixed-top bg-body-tertiary navbar-expand-xl shadow  bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../../assets/img/logogc.png" alt="Bootstrap" width="95" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav text-align">

          <li class="nav-item">
            <a class="nav-link fw-medium" href="kategori.php">Kategori</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-medium" href="produk.php">Produk</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fw-medium" href="users.php">Users</a>
          </li>
          
        </ul>
      <div class="col-md-3 text-end mx-5">
        <a href="../../index.php" class="btn btn-danger" onclick="return confirm('Yakin ingin Logout?');">Log Out <i class="bi bi-box-arrow-right"></i></a>
      </div>
      </div>
    </div>
  </nav>


  