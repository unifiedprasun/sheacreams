<?php defined('BASEPATH') OR exit('No direct script access allowed');
$basepath = base_url('assets/admin/');
?>
          
          <div class="navbar navbar-expand-lg navbar-light">
              <div class="text-center d-lg-none w-100">
                  <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                  <i class="icon-unfold mr-2"></i>
                  Footer
                  </button>
              </div>

              <div class="navbar-collapse collapse" id="navbar-footer">
                  <span class="navbar-text">
                      <?=PANEL_COPYRIGHT?>
                  </span>                  
              </div>
          </div>
          
      </div>
    </div>
  </body>

  <script>
    <?php if ($this->session->flashdata('success')) {?>
        openModel("<?= $this->session->flashdata('success')?>");
    <?php }elseif ($this->session->flashdata('error')) {?>
        openModel("<?= $this->session->flashdata('error')?>");
    <?php } ?>
  </script>
  
</html>




