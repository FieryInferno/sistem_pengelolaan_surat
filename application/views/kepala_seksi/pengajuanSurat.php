<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
      </div>
    </div>
    <div class="card-body">
      <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('kepala_seksi/pengajuan_surat/tambah') ?>">
        <i class="fas fa-plus"> Tambah Pengajuan</i>
      </a>
      <?= $this->session->pesan ? $this->session->pesan : ''; ?>
      <table class="table table-bordered table-striped mt-2" id="myTable">
        <thead>
          <tr>
            <th class ="text-center">No</th>
            <th class ="text-center">Perihal</th>
            <th class ="text-center">Tujuan</th>
            <th class ="text-center">Isi</th>
            <th class ="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no=1; 
            foreach ($surat as $m) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $m['perihal'] ?></td>
              <td><?php echo $m['tujuan'] ?></td>
              <td><?php echo $m['isi'] ?></td>
              <td>
                <?php
                  switch ($m['status']) {
                    case '0': ?>
                      <button disabled class="btn btn-primary">Sedang diajukan</button>
                      <?php break;
                    case '1': ?>
                      <a href="<?= base_url('assets/' . $m['file']); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <?php break;
                    
                    default:
                    
                      break;
                  }
                ?>
                <a href="<?= base_url('staff/pengajuan_surat/hapus/' . $m['id_pengajuan_surat_keluar']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>