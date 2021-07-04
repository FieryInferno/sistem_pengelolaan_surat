<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <?php echo $this->session->flashdata('pesan') ?>
  <table class="table table-bordered table-striped mt-2" id="myTable">
    <thead>
      <tr>
        <th class ="text-center">No</th>
        <th class ="text-center">Nomor Surat</th>
        <th class ="text-center">Tanggal Surat</th>
        <th class ="text-center">Perihal</th>
        <th class ="text-center">Tujuan</th>
        <th class ="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1; 
        foreach ($keluar as $m) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $m['no_surat'] ?></td>
            <td><?php echo $m['tanggal'] ?></td>
            <td><?php echo $m['perihal'] ?></td>
            <td><?php echo $m['tujuan'] ?></td>
            <td>
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('assets/' . $m['file']) ?>"><i class="fas fa-eye"></i></a>
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/SuratKeluar/ubah/' . $m['id_surat_keluar']) ?>"><i class="fas fa-edit"></i></a>
              <a onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('KepalaTu/Surat/delete_surat_keluar/' . $m['id_surat_keluar']) ?>"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; 
      ?>
    </tbody>
  </table>
</div>