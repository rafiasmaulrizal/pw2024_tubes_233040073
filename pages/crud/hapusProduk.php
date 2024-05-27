<?php
require "../../includes/functions.php";

$id = $_GET['id'];

if (hapusProduk($id) > 0) {
  echo "<script>
              alert('data berhasil dihapus');
              document.location.href = '../dashboard/produk.php';
            </script>";
} else {
  echo "<script>
              alert('data gagal dihapus');
              document.location.href = '../dashboard/produk.php';
            </script>";
}





