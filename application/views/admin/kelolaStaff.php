<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/kelola_staff/tambah') ?>"><i class="fas fa-plus"> Tambah Data </i></a>
  <?php echo $this->session->flashdata('pesan') ?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped mt-2" id="myTable">
      <thead>
        <tr>
          <th class ="text-center">NIK</th>
          <th class ="text-center">Nama</th>
          <th class ="text-center">Username</th>
          <th class ="text-center">Email</th>
          <th class ="text-center">Seksi</th>
          <th class ="text-center">Subseksi</th>
          <th class ="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
          foreach ($staff as $m) : ?>
            <tr>
              <td><?php echo $m['nik'] ?></td>
              <td><?php echo $m['nama'] ?></td>
              <td><?php echo $m['username'] ?></td>
              <td><?php echo $m['email'] ?></td>
              <td><?php echo $m['seksi'] ?></td>
              <td><?php echo $m['subseksi'] ?></td>
              <td>
                <a class="btn btn-primary" href="<?= base_url('admin/kelola_staff/edit/' . $m['id_user']); ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="<?= base_url('admin/kelola_staff/hapus/' . $m['id_user']); ?>"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; 
        ?>
      </tbody>
    </table>
  </div>
</div>