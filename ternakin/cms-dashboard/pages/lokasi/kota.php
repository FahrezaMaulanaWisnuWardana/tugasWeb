  <?php 
    $title="List Kota";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/datatables/dataTables.bootstrap4.min.css">
  <!-- Query -->
  <?php
    $sql = mysqli_query($con,"SELECT * FROM tb_kota LEFT JOIN tb_provinsi ON tb_kota.id_provinsi = tb_provinsi.id_provinsi");
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
          <?php 
            if (isset($_SESSION['alert'])) {
              if (isset($_SESSION['alert']['berhasil'])) {
                ?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['alert']['berhasil']?>
                </div>
                <?php
              }else{
                ?>
                <div class="alert alert-danger" role="alert">
                  <?=$_SESSION['alert']['gagal']?>
                </div>
                <?php
              }
              unset($_SESSION['alert']);
            }
          ?>
          <div class="row">

            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                  <a href="tambah-kota"><i class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="listKota" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Provinsi.</th>
                            <th>Kota.</th>
                            <th>Aksi.</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                            <th>Provinsi.</th>
                            <th>Kota.</th>
                            <th>Aksi.</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php 
                          $no=1;
                            while ($data = mysqli_fetch_array($sql)) {
                              ?>
                                <tr>
                                  <td><?=$no++?></td>
                                  <td><?=$data['nama_provinsi']?></td>
                                  <td><?=$data['nama_kota']?></td>
                                  <td class="text-center">
                                    <div class="d-flex">
                                      <a href="<?=$_ENV['base_url']?>cms-dashboard/kota/edit/<?=$data['id_kota']?>" class="btn btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a> 
                                      <form method="POST" action="aksi">
                                        <button type="submit" class="btn btn-danger" name="aksi" value="hapus-kota" onclick="return confirm('Yakin akan dihapus?')">
                                          <i class="fas fa-trash"></i>
                                          <input type="hidden" name="id_kota" value="<?=$data['id_kota']?>">
                                        </button>
                                      </form>
                                    </div>
                                  </td>
                                </tr>
                              <?php
                            }
                          ?>
                        </tbody>
                      </table>
                  </div>
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
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#listKota").DataTable();
    });
  </script>
</html>
