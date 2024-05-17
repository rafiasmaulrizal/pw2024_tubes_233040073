<?php

function koneksi()
{
  $db = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040073');
  return $db;
}

function query()
{
  $conn = koneksi();
  $result = mysqli_query($conn, "SELECT * FROM kategori");

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// Definisikan fungsi tambah
function tambah($data)
{
  $conn = koneksi(); // Panggil fungsi koneksi di sini

  // Ambil data dari form dan lakukan sanitasi
  $nama = mysqli_real_escape_string($conn, htmlspecialchars($data['nama']));
  $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
  $lokasi = mysqli_real_escape_string($conn, htmlspecialchars($data['lokasi']));
  $gambar = mysqli_real_escape_string($conn, htmlspecialchars($data['gambar']));

  // Query insert data
  $query = "INSERT INTO kategori (nama, deskripsi, lokasi, gambar)
              VALUES ('$nama', '$deskripsi', '$lokasi', '$gambar')";

  // Jalankan query dan cek apakah berhasil
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn); // Mengembalikan jumlah baris yang terpengaruh
  } else {
    return 0; // Mengembalikan 0 jika gagal
  }
}


function hapus($id)
{
  $conn = koneksi(); // Panggil fungsi koneksi di sini

  // Query hapus data
  $query = "DELETE FROM kategori WHERE id = $id";

  // Jalankan query dan cek apakah berhasil
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn); // Mengembalikan jumlah baris yang terpengaruh
  } else {
    return 0; // Mengembalikan 0 jika gagal
  }
}

function ubah($data)
{
  $conn = koneksi(); // Panggil fungsi koneksi di sini

  // Ambil data dari form dan lakukan sanitasi
  $id = $data['id'];
  $nama = mysqli_real_escape_string($conn, htmlspecialchars($data['nama']));
  $deskripsi = mysqli_real_escape_string($conn, htmlspecialchars($data['deskripsi']));
  $lokasi = mysqli_real_escape_string($conn, htmlspecialchars($data['lokasi']));
  $gambar = mysqli_real_escape_string($conn, htmlspecialchars($data['gambar']));

  // Query update data
  $query = "UPDATE kategori SET
              nama = '$nama',
              deskripsi = '$deskripsi',
              lokasi = '$lokasi',
              gambar = '$gambar'
            WHERE id = $id";

  // Jalankan query dan cek apakah berhasil
  if (mysqli_query($conn, $query)) {
    return mysqli_affected_rows($conn); // Mengembalikan jumlah baris yang terpengaruh
  } else {
    return 0; // Mengembalikan 0 jika gagal
  }
}

function cari($keyword)
{
  $conn = koneksi(); // Panggil fungsi koneksi di sini

  // Query cari data
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
