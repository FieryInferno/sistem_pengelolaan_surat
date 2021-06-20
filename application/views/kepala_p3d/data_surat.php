<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <?php
    if ($this->session->pesan) {
      echo $this->session->pesan;
    }
  ?>
  <table class="table table-bordered table-striped mt-2" id="myTable">
    <thead>
      <tr>
        <th class ="text-center">No</th>
        <th class ="text-center">Nomor Surat</th>
        <th class ="text-center">Pengirim</th>
        <th class ="text-center">Tanggal Surat</th>
        <th class ="text-center">Perihal</th>
        <th class ="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1; 
        foreach ($surat as $m) : ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $m['no_surat'] ?></td>
          <td><?php echo $m['pengirim'] ?></td>
          <td><?php echo $m['tanggal'] ?></td>
          <td><?php echo $m['perihal'] ?></td>
          <td>
            <a href="<?= base_url('assets/' . $m['file']); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
            <?php
              switch ($m['status']) {
                case '0': ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="disposisi('<?= $m['id_surat_masuk']; ?>')"><i class="fas fa-mail-bulk"></i></button>
                  <?php break;
                
                default: ?>
                  <button type="button" class="btn btn-primary" disabled>Sudah Didisposisi</button>
                  <?php break;
              }
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disposisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>kepala_p3d/disposisi" method="post">
        <div class="modal-body">
          <input type="hidden" name="id_surat_masuk" id="id_surat_masuk">
          <div class="form-group">
            <label>Diteruskan ke</label>
            <select name="seksi" class="form-control">
              <option>Pilih Seksi</option>
              <?php
                foreach ($seksi as $key) { ?>
                  <option value="<?= $key['id_seksi']; ?>"><?= $key['nama_seksi']; ?></option>
                <?php }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>