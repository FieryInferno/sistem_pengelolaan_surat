<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/user/tambah') ?>">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" class="form-control">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
          <?php echo form_error('username','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
          <?php echo form_error('password','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
            <option>Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="kepala_p3d">Kepala P3D</option>
            <option value="kepala_seksi">Kepala Seksi</option>
            <option value="staff">Staff</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Seksi</label>
          <select name="seksi" class="form-control">
            <option>Pilih Seksi</option>
            <option value="tata_usaha">Tata Usaha</option>
            <option value="penerimaan_dan_penagihan">Penerimaan dan Penagihan</option>
            <option value="pendataan_penetapan">Pendataan Penetapan</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Sub Seksi</label>
          <select name="subseksi" class="form-control">
            <option value="NULL">Pilih Sub Seksi</option>
            <option value="pengelola_keuangan">Pengelola Keuangan</option>
            <option value="perencanaan_dan_program">Perencanaan dan Program</option>
            <option value="pengadministrasian_sarana_dan_prasarana">Pengadministrasian Sarana dan Prasarana</option>
            <option value="pengubah_data_aplikasi_dan_pengelolaan_data_sistem_keuangan">Pengolah Data Aplikasi dan Pengolahan Data Sistem Keuangan</option>
            <option value="pengadministrasian_umum">Pengadministrasian Umum</option>
            <option value="verifikator_pajak">Verifikator Pajak</option>
            <option value="pengolah_data_dan_potensi_pajak">Pengolah Data dan Potensi Pajak</option>
            <option value="pengolah_data_pemeriksa_pajak">Pengolah Data Pemeriksa Pajak</option>
            <option value="pengolah_data_penagihan_pajak">Pengolah Data Penagihan Pajak</option>
            <option value="pranata_kearsipan">Pranata Kearsipan</option>
            <option value="pengelolaan_pelaporan_dan_penerimaan">Pengelola Pelaporan dan Penerimaan</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>