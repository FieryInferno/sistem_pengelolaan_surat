 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; P3DW Subang</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>
  <script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
  <script src="<?= base_url(); ?>assets/DataTables/datatables.min.js"></script>
  <script>
    CKEDITOR.replace( 'editor1' );

    $(document).ready( function () {
        $('#myTable').DataTable(); 
        
        $('.disposisi').click(() => {
          let id_surat_masuk  = $(this).attr('data-id');
          console.log($('.disposisi').attr('data-id'));
        });
    });

    function disposisi(id) {
      $('#id_surat_masuk').val(id);
    }

    function pilihSubseksi(data) {
      $.ajax({
        url   : `<?= base_url(); ?>admin/pilih_subseksi`,
        type  : 'post',
        data  : {
          id_seksi : data.value
        }, 
        success : function(result){
          data  = '<option>Pilih Subseksi</option>';
          result.forEach(element => {
            data  += `<option value="${element.id_subseksi}">${element.nama_subseksi}</option>`;
          });
          $('#subseksi').html(data);
        }
      });
    }

    function nomorSurat(data) {
      $.ajax({
        url   : `<?= base_url(); ?>admin/nomor_surat`,
        type  : 'post',
        data  : {
          klasifikasi : data.value
        }, 
        success : function(result){
          $('#urutan_surat').val(result.urutan_surat);
          $('#no_surat').val(result.no_surat);
        }
      });
    }

    function cekNomorSurat(data) {
      $.ajax({
        url   : `<?= base_url(); ?>admin/cek_nomor_surat`,
        type  : 'post',
        data  : {
          no_surat : data.value
        }, 
        success : function(result) {
          if (result.status) {
            $('#cekSurat').html(`<span class="text-danger">No. Surat Sudah Ada</span>`);
            $('#tombolSuratMasuk').attr(`disabled`, 'disabled');
          } else {
            $('#cekSurat').html(``);
            $('#tombolSuratMasuk').removeAttr(`disabled`, 'disabled');
          }
        }
      });
    }
  </script>
</body>

</html>