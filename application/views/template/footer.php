    <!-- Animateions area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area" style="background: #36b9cc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script>
      $('#chat').click(function() {
          if ('<?= $this->session->masuk; ?>' !== '') {
            location.replace("<?= base_url(); ?>chat/<?= $id_pedagang; ?>");
          } else {
            $('#belumLogin').html(
              `<div class="alert alert-warning alert-dismissible show" role="alert">
                Belum login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>`
            );
          }
        });
    </script>
</body>

</html>