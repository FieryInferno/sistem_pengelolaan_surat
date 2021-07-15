<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('kepala_seksi/pengajuan_surat/tambah') ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label>Perihal</label>
          <input type="text" name="perihal" class="form-control">
        </div>
        <div class="form-group">
          <label>Tujuan</label>
          <input type="text" name="tujuan" class="form-control">
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