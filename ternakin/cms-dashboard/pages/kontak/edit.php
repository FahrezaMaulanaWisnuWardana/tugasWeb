  <?php 
    $title="Edit kontak";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
  // Query
    $id = $_GET['id_kontak'];
    $kontak = mysqli_query($con , "SELECT * FROM tb_kontak WHERE id_kontak='".$id."'");
    $data_kontak = mysqli_fetch_assoc($kontak);
  // End Query
   ?>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
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
                  <a href="tambah"><i class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                  <form method="POST" action="aksi.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_kontak" value="<?=$data_kontak['id_kontak']?>">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" maxlength="35" value="<?=$data_kontak['nama']?>">
                    </div>
                    <div class="form-group">
                      <label>Icon</label>
                      <input type="file" name="icon" class="form-control-file" id="icon" accept="image/png , image/jpeg">
                    </div>
                    <div id="preview-img">
                    <button type="submit" class="btn btn-primary form-control" name="aksi" value="update-kontak">Edit</button>
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

  <?php require_once"../../templates/footer-dashboard.php"; ?>
</html>
