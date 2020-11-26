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
          <form action="<?=$_ENV['base_url']?>cms-dashboard/auth/aksi" method="POST">
          	<button class="btn btn-primary" name="aksi" value="logout">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
  <!-- Bootstrap core JavaScript-->
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/js/sb-admin-2.min.js"></script>