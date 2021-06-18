<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a href="<?= base_url(); ?>admin/kelola_staff/tambah" class="btn btn-primary">Tambah</a>
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
                <a class="btn btn-primary" href=""><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; 
        ?>
      </tbody>
    </table>
  </div>
</div>