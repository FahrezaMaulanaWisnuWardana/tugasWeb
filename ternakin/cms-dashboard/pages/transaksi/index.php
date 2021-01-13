  <?php 
    $title="List Transaksi";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/datatables/dataTables.bootstrap4.min.css">
  <!-- Query -->
  <?php
    $sql = mysqli_query($con,"SELECT * FROM tb_transaksi t INNER JOIN tb_produk hwn ON hwn.id_hewan = t.id_hewan INNER JOIN tb_peternak p ON t.id_peternak = p.id_peternak INNER JOIN tb_peternak pt ON pt.id_peternak = t.id_peternak") or die(mysqli_error($con));
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
                  <div class="table-responsive">
                      <table class="table table-bordered" id="listUser" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama hewan.</th>
                            <th>Nama Pemilik.</th>
                            <th>Pembeli.</th>
                            <th>Kurir.</th>
                            <th>Resi.</th>
                            <th>Status.</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                            <th>Nama hewan.</th>
                            <th>Nama Pemilik.</th>
                            <th>Pembeli.</th>
                            <th>Kurir.</th>
                            <th>Resi.</th>
                            <th>Status.</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php 
                          $no=1;
                            while ($data = mysqli_fetch_array($sql)) {
                              ?>
                                <tr>
                                  <td><?=$no++?></td>
                                  <td><?=$data['nama_produk']?></td>
                                  <td>
                                    <?php 
                                        $sqlPeternak = mysqli_query($con,"SELECT * FROM tb_peternak WHERE id_peternak = hwn.id_peternak");
                                        $data_pemilik = mysqli_fetch_assoc($sqlPeternak);
                                        echo $data_pemilik['nama_lengkap'];
                                     ?>
                                  </td>
                                  <td><?=$data['nama_lengkap']?></td>
                                  <td><?=$data['kurir']?></td>
                                  <td><?=$data['no_resi']?></td>
                                  <td>
                                    <?php 
                                      if ($data['status']=="1") {
                                        echo "Belum Dibayar";
                                      }else if($data['status']=="2"){
                                        echo "Proses oleh penjual";
                                      }else if($data['status']=="3"){
                                        echo "Pengiriman";
                                      }else if ($data['status']=="4") {
                                        echo"Status pesanan sedang dikirim";
                                      }else if($data['status']=="5"){
                                        echo"Pesanan telah sampai";
                                      }else if($data['status']=="6"){
                                        echo"Pesanan telah sampai";
                                      }else if($data['status']=="99"){
                                        echo"Pesanan telah sampai";
                                      }
                                    ?>
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
      $("#listUser").DataTable();
    });
  </script>
</html>
