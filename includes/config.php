<?php
// konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pw2024_233040073";

// koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// periksa koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>