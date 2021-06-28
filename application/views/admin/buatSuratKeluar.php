<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/buat_surat_keluar') ?>" enctype="multipart/form-data">
        <input type="hidden" name="urutan_surat" value="<?= $urutan_surat; ?>">
        <div class="form-group">
          <label>No. Surat</label>
          <input type="text" name="no_surat" class="form-control" value="<?= $no_surat; ?>" readonly>
        </div>
        <div class="form-group">
          <label>Perihal</label>
          <input type="text" name="perihal" class="form-control">
        </div>
        <div class="form-group">
          <label>Tujuan</label>
          <input type="text" name="tujuan" class="form-control">
        </div>
        <div class="form-group">
          <label>Tanggal Surat</label>
          <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="form-group">
          <label>Isi Surat</label>
          <textarea name="isi" cols="30" rows="10" class="form-control" id="editor1"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>