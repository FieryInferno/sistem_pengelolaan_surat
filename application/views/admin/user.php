<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/user/tambah') ?>"><i class="fas fa-plus"> Tambah Data </i></a>
  <?php if ($this->session->pesan) echo $this->session->pesan; ?>
  <table class="table table-bordered table-striped mt-2">
    <thead>
      <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
        <th>Level</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($user as $key) { ?>
          <tr>
            <td><?= $key['nik']; ?></td>
            <td><?= $key['nama']; ?></td>
            <td><?= $key['email']; ?></td>
            <td><?= $key['username']; ?></td>
            <td><?= $key['level']; ?></td>
            <td>
              <a class="btn btn-danger" href="<?= base_url('admin/User/hapus/' . $key['id_user']); ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php }
      ?>
    </tbody>
  </table>
</div>