<?php
function koneksi()
{
  $db = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040073');
  return $db;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();
  $nama = mysqli_real_escape_string($conn, htmlspecialchars($data['nama']));
  $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
  $lokasi = mysqli_real_escape_string($conn, htmlspecialchars($data['lokasi']));
  // Upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  $query = "INSERT INTO kategori (nama, deskripsi, lokasi, gambar)
            VALUES ('$nama', '$deskripsi', '$lokasi', '$gambar')";
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn);
  } else {
    return 0;
  }
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  if ($error === 4) {
    echo "<script>
          alert('Pilih gambar terlebih dahulu');
          </script>";
    return false;
  }
  // Cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
          alert('Yang anda upload bukan gambar yang valid');
          </script>";
    return false;
  }
  // Cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
          alert('Ukuran gambar terlalu besar');
          </script>";
    return false;
  }
  // Lolos pengecekan, gambar siap diupload
  // Generate nama gambar baru  
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
  return $namaFileBaru;
}

function hapus($id)
{
  $conn = koneksi();
  $query = "DELETE FROM kategori WHERE id = $id";
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn);
  } else {
    return 0;
  }
}



function ubah($data)
{
  $conn = koneksi();
  $id = $data["id"];
  $nama = mysqli_real_escape_string($conn, htmlspecialchars($data['nama']));
  $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
  $lokasi = mysqli_real_escape_string($conn, htmlspecialchars($data['lokasi']));
  $gambarLama = mysqli_real_escape_string($conn, htmlspecialchars($data['gambarLama']));
  // Cek apakah user memilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }
  $query = "UPDATE kategori SET
            nama = '$nama',
            deskripsi = '$deskripsi',
            lokasi = '$lokasi',
            gambar = '$gambar'
            WHERE id = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM kategori
            WHERE
            nama LIKE '%$keyword%' OR
            deskripsi LIKE '%$keyword%' OR
            lokasi LIKE '%$keyword%' OR
            gambar LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function registrasi($data)
{
  $conn = koneksi();
  $username = strtolower(trim(stripslashes($data['username'])));
  $password = mysqli_real_escape_string($conn, $data['password']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);
  $email = strtolower(stripslashes($data['email']));
  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' OR email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
          alert('username sudah digunakan');
          </script>";
    return false;
  }
  // cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
          alert('konfirmasi password tidak sesuai');
          </script>";
    return false;
  }
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // tambah user baru
  $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function isLoggedIn()
{
  return isset($_SESSION['login']) && $_SESSION['login'] === true;
}
function isAdmin($username)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND role = 'admin'");
  return mysqli_num_rows($result) === 1;
}

function tambahProduk($data)
{
  $conn = koneksi();
  $kategori_id = mysqli_real_escape_string($conn, htmlspecialchars($data['kategori_id']));
  $nama = mysqli_real_escape_string($conn, htmlspecialchars($data['nama']));
  $harga = mysqli_real_escape_string($conn, htmlspecialchars($data['harga']));
  $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
  if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $harga)) {
    echo "<script>alert('Harga tidak valid!');</script>";
    return false;
  }
  // Upload gambar
  $gambar = uploadProduk();
  if (!$gambar) {
    return false;
  }
  $query = "INSERT INTO produk (kategori_id, nama, harga, gambar, deskripsi)
              VALUES ('$kategori_id', '$nama', '$harga', '$gambar', '$deskripsi')";
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn);
  } else {
    return 0;
  }
}

function uploadProduk()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  if ($error === 4) {
    echo "<script>
          alert('Pilih gambar terlebih dahulu');
          </script>";
    return false;
  }
  // Cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
          alert('Yang anda upload bukan gambar yang valid');
          </script>";
    return false;
  }
  // Cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
          alert('Ukuran gambar terlalu besar');
          </script>";
    return false;
  }
  // Lolos pengecekan, gambar siap diupload
  // Generate nama gambar baru  
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

function cariProduk($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM produk
            WHERE
            nama LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            deskripsi LIKE '%$keyword%' OR
            gambar LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// hapus produk
function hapusProduk($id)
{
  $conn = koneksi();

  $query = "DELETE FROM produk WHERE id = $id";
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn);
  } else {
    return 0;
  }
}

// ubah produk
function ubahProduk($data)
{
  $conn = koneksi();

  $id = $data["id"];
  $kategori_id = mysqli_real_escape_string($conn, htmlspecialchars($data['kategori_id']));
  $nama = mysqli_real_escape_string($conn, htmlspecialchars($data['nama']));
  $harga = mysqli_real_escape_string($conn, htmlspecialchars($data['harga']));
  $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
  $gambarLama = mysqli_real_escape_string($conn, htmlspecialchars($data['gambarLama']));
  // Cek apakah user memilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = uploadProduk();
    if (!$gambar) {
      return false;
    }
  }

  $query = "UPDATE produk SET
            kategori_id = '$kategori_id',
            nama = '$nama',
            harga = '$harga',
            gambar = '$gambar',
            deskripsi = '$deskripsi'
            WHERE id = $id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// hapus user
function hapusUsers($id)
{
  $conn = koneksi();

  $query = "DELETE FROM users WHERE id = $id";
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn);
  } else {
    return 0;
  }
}

function ubahUsers($data)
{
  $conn = koneksi();

  $id = $data["id"];
  $username = mysqli_real_escape_string($conn, htmlspecialchars($data['username']));
  $email = mysqli_real_escape_string($conn, htmlspecialchars($data['email']));
  $role = mysqli_real_escape_string($conn, htmlspecialchars($data['role']));
  $password = mysqli_real_escape_string($conn, htmlspecialchars($data['password']));

  $query = "UPDATE users SET
            username = '$username',
            email = '$email',
            role = '$role',
            password = '$password'
            WHERE id = $id";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}