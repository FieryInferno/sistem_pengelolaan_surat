<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-contetnt-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <div class="card" style="width: 60%;">
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('admin/kelola_staff/edit/' . $id_user) ?>">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" class="form-control" value="<?= $nik; ?>">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="<?= $email; ?>">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?= $username; ?>">
          <?php echo form_error('username','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" value="<?= $password; ?>">
          <?php echo form_error('password','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
            <option>Pilih Role</option>
            <option value="admin" <?= $level == 'admin' ? 'selected' : '' ; ?>>Admin</option>
            <option value="kepala_p3d" <?= $level == 'kepala_p3d' ? 'selected' : '' ; ?>>Kepala P3D</option>
            <option value="kepala_seksi" <?= $level == 'kepala_seksi' ? 'selected' : '' ; ?>>Kepala Seksi</option>
            <option value="staff" <?= $level == 'staff' ? 'selected' : '' ; ?>>Staff</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Seksi</label>
          <select name="seksi" class="form-control">
            <option>Pilih Seksi</option>
            <option value="tata_usaha" <?= $seksi == 'tata_usaha' ? 'selected' : '' ; ?>>Tata Usaha</option>
            <option value="penerimaan_dan_penagihan" <?= $seksi == 'penerimaan_dan_penagihan' ? 'selected' : '' ; ?>>Penerimaan dan Penagihan</option>
            <option value="pendataan_penetapan" <?= $seksi == 'pendataan_penetapan' ? 'selected' : '' ; ?>>Pendataan Penetapan</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <div class="form-group">
          <label>Sub Seksi</label>
          <select name="subseksi" class="form-control">
            <option value="NULL">Pilih Sub Seksi</option>
            <option value="pengelola_keuangan" <?= $subseksi == 'pengelola_keuangan' ? 'selected' : '' ; ?>>Pengelola Keuangan</option>
            <option value="perencanaan_dan_program" <?= $subseksi == 'perencanaan_dan_program' ? 'selected' : '' ; ?>>Perencanaan dan Program</option>
            <option value="pengadministrasian_sarana_dan_prasarana" <?= $subseksi == 'pengadministrasian_sarana_dan_prasarana' ? 'selected' : '' ; ?>>Pengadministrasian Sarana dan Prasarana</option>
            <option value="pengubah_data_aplikasi_dan_pengelolaan_data_sistem_keuangan" <?= $subseksi == 'pengubah_data_aplikasi_dan_pengelolaan_data_sistem_keuangan' ? 'selected' : '' ; ?>>Pengolah Data Aplikasi dan Pengolahan Data Sistem Keuangan</option>
            <option value="pengadministrasian_umum" <?= $subseksi == 'pengadministrasian_umum' ? 'selected' : '' ; ?>>Pengadministrasian Umum</option>
            <option value="verifikator_pajak" <?= $subseksi == 'verifikator_pajak' ? 'selected' : '' ; ?>>Verifikator Pajak</option>
            <option value="pengolah_data_dan_potensi_pajak" <?= $subseksi == 'pengolah_data_dan_potensi_pajak' ? 'selected' : '' ; ?>>Pengolah Data dan Potensi Pajak</option>
            <option value="pengolah_data_pemeriksa_pajak" <?= $subseksi == 'pengolah_data_pemeriksa_pajak' ? 'selected' : '' ; ?>>Pengolah Data Pemeriksa Pajak</option>
            <option value="pengolah_data_penagihan_pajak" <?= $subseksi == 'pengolah_data_penagihan_pajak' ? 'selected' : '' ; ?>>Pengolah Data Penagihan Pajak</option>
            <option value="pranata_kearsipan" <?= $subseksi == 'pranatan_kearsipan' ? 'selected' : '' ; ?>>Pranata Kearsipan</option>
            <option value="pengelolaan_pelaporan_dan_penerimaan" <?= $subseksi == 'pengelolaan_pelaporan_dan_penerimaan' ? 'selected' : '' ; ?>>Pengelola Pelaporan dan Penerimaan</option>
          </select>
          <?php echo form_error('role','<div class="text-small text-danger"></div') ?>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>