<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/buat_surat_keluar') ?>" enctype="multipart/form-data">
        <input type="hidden" name="urutan_surat" id="urutan_surat">
        <div class="form-group">
          <label>Klasifikasi</label>
          <select name="klasifikasi" id="klasifikasi" class="form-control" onchange="nomorSurat(this)">
            <option>Pilih Klasifikasi</option>
            <option value="umum">Umum</option>
            <option value="pemerintahan">Pemerintahan</option>
            <option value="pengawasan">Pengawasan</option>
            <option value="pekerjaan_umum_dan_ketenagaan">Pekerjaan Umum dan Ketenagaan</option>
            <option value="perekonomian">Perekonomian</option>
            <option value="kesejahteraan_rakyat">Kesejahteraan Rakyat</option>
            <option value="keamanan">Keamanan</option>
            <option value="politik">Politik</option>
            <option value="kepegawaian">Kepegawaian</option>
            <option value="keuangan">Keuangan</option>
          </select>
        </div>
        <div class="form-group">
          <label>No. Surat</label>
          <input type="text" name="no_surat" class="form-control" readonly id="no_surat">
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