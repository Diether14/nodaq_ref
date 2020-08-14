<!-- <footer class="footer footer-default bg-dark w-footer" style="color:#ffffff">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              Weendi
            </a>
          </li>
          <li>
            <a href="#">
              About Us
            </a>
          </li>
          <li>
            <a href="#">
              Contact Us
            </a>
          </li>
         
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, 
        <a href="#" style="color:#ffffff" target="_blank">Weendi</a>
      </div>
    </div>
  </footer> -->

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
          <a class="btn btn-primary" href="<?= base_url(); ?>/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  </div>

  <script src="<?= base_url(); ?>/public/user/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?= base_url(); ?>/public/user/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url(); ?>/public/user/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/assets/js/main.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>/public/assets/taginput/tagsinput.js" type="text/javascript"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
      extraPlugins: 'image2,uploadimage',

      toolbar: [{
          name: 'clipboard',
          items: ['Undo', 'Redo']
        },
        {
          name: 'styles',
          items: ['Styles', 'Format']
        },
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
        },
        {
          name: 'paragraph',
          items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
        },
        {
          name: 'links',
          items: ['Link', 'Unlink']
        },
        {
          name: 'insert',
          items: ['Image', 'Table']
        },
        {
          name: 'tools',
          items: ['Maximize']
        },
        {
          name: 'editing',
          items: ['Scayt']
        }
      ],

      // Upload images to a CKFinder connector (note that the response type is set to JSON).
      uploadUrl: '<?= base_url(); ?>/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: '<?= base_url(); ?>/public/ckfinderckfinder.html',
      filebrowserImageBrowseUrl: '<?= base_url(); ?>/public/ckfinderckfinder.html?type=Images',
      filebrowserUploadUrl: '<?= base_url(); ?>/public/ckfindercore/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
      filebrowserImageUploadUrl: '<?= base_url(); ?>/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Reduce the list of block elements listed in the Format drop-down to the most commonly used.
      format_tags: 'p;h1;h2;h3;pre',
      // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
      removeDialogTabs: 'image:advanced;link:advanced',

      height: 450
    });
  </script>
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>
</body>
</html>
