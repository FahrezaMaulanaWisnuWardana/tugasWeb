  <?php 
    $title="Profile";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
  <!-- Query -->
  <?php
    $sql = mysqli_query($con,"SELECT * FROM tb_users u INNER JOIN tb_provinsi p ON u.id_provinsi = p.id_provinsi INNER JOIN tb_kota k ON u.id_kota = k.id_kota WHERE id_users='".$_SESSION['user']['id_users']."'");
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
            <a href="<?=$_ENV['base_url']?>cms-dashboard/pages/users/edit/<?=$_SESSION['user']['id_users']?>" class="btn btn-primary mr-1"><i class="fas fa-pencil-alt"></i> Edit Profile</a>
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
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title.' | '. $_SESSION['user']['username']?></h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><?='Nama : '.$data['nama']?></li>
                      <li class="list-group-item"><?='Daerah : '.$data['nama_provinsi'].' - '. $data['nama_kota']?></li>
                      <li class="list-group-item"><?='Alamat : '.$data['alamat']?></li>
                      <li class="list-group-item">Role : 
                        <?php
                          if ($data['level']=="1") {
                            echo"Super Admin";
                          }else if($data['level']=="2"){
                            echo "Admin";
                          }else{
                            echo "Admin Artikel";
                          }
                      ?></li>
                    </ul>
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
