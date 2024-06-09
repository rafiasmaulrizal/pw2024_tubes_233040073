<?php
require "../../includes/functions.php";

$id = $_GET['id'];

if (hapusUsers($id) > 0) {
  echo "<script>
              alert('data berhasil dihapus');
              document.location.href = '../dashboard/users.php';
            </script>";
} else {
  echo "<script>
              alert('data gagal dihapus');
              document.location.href = '../dashboard/users.php';
            </script>";
}
?>
