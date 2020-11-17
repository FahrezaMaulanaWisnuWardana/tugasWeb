  <?php 
    $title="Tambah Provinsi";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
  <!-- Query -->
  <?php 
      $sql = mysqli_query($con,"SELECT * FROM tb_provinsi ORDER BY id_provinsi DESC LIMIT 1");
      $data = mysqli_fetch_assoc($sql);
   ?>
  <!-- End Query -->
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php require_once"../../partials/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          <?php require_once"../../partials/topbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="transition: 0.4s;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
          </div>

          <div class="row">

            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="<?=$_ENV['base_url']?>cms-dashboard/pages/lokasi/aksi">
                    <div class="form-group">
                      <label>id_provinsi</label>
                      <input type="number" name="id_provinsi" class="form-control" readonly value="<?=$data['id_provinsi']+1?>">
                    </div>
                    <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" name="provinsi" class="form-control">
                    </div>
                    <button type="submit" name="aksi" class="btn btn-primary" value="tambah-provinsi">Tambah Provinsi</button>
                  </form>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
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

  <?php require_once"../../templates/footer-dashboard.php" ?>
</html>
