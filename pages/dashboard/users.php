<?php

require '../../includes/functions.php';

$conn = koneksi();
$users = mysqli_query($conn, "SELECT * FROM users");


include '../../templates/navbardash.php';

?>

<!-- Daftar Produk -->
<div class="col py-5 my-5 mx-5 px-5">
  <h2>Daftar Users</h2><hr>
  <div class="container">

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Gambar</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1; ?>
        <?php foreach ($users as $users) : ?>


          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $users['username']; ?></td>
            <td>
              <?php if ($users['gambar']) : ?>
                <img src="../crud/img/ <?= $users['gambar']; ?>" alt="<?= $users['username']; ?>" width="50">
              <?php else : ?>
                <img src="../../assets/img/defaulfoto.png" alt="default" width="50">
              <?php endif; ?>
            </td>
            <td><?= $users['email']; ?></td>
            <td><?= $users['role']; ?></td>
            <td>
            <a href="../../pages/crud/ubahUser.php?id=<?= $users['id']; ?>" class="badge text-bg-warning text-decoration-none"><i class="bi bi-eyedropper"></i> Ubah </a>
            <a href="../../pages/crud/hapusUser.php?id=<?= $users['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');" class="badge text-bg-danger text-decoration-none"><i class="bi bi-trash"></i> Hapus</a>
            </td>
          </tr>

        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95PMTr5tHTo05ONWeZ7qvSpZSmOcn6jR9e7Tw9OKM" crossorigin="anonymous"></script>
  </body>

  </html>