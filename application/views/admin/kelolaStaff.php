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
          <th class ="text-center">NIP</th>
          <th class ="text-center">Nama</th>
          <th class ="text-center">Username</th>
          <th class ="text-center">Seksi</th>
          <th class ="text-center">Subseksi</th>
          <th class ="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
          foreach ($staff as $m) : ?>
            <tr>
              <td><?= isset($m['nip']) ? $m['nip'] : '' ; ?></td>
              <td><?= isset($m['nama']) ? $m['nama'] : '' ; ?></td>
              <td><?= isset($m['username']) ? $m['username'] : '' ; ?></td>
              <td><?= isset($m['nama_seksi']) ? $m['nama_seksi'] : '' ; ?></td>
              <td><?= isset($m['nama_subseksi']) ? $m['nama_subseksi'] : '' ; ?></td>
              <td>
                <a class="btn btn-primary" href="<?= base_url('admin/kelola_staff/ubah/' . $m['id_user']); ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="<?= base_url('admin/kelola_staff/hapus/' . $m['id_user']); ?>"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; 
        ?>
      </tbody>
    </table>
  </div>
</div>