  <?php 
    $title="Tambah Kota";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Query -->
  <?php 
    $sql = mysqli_query($con,"SELECT * FROM tb_provinsi");
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
                      <label>id_kota</label>
                      <input type="number" name="id_kota" id="id_kota" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control selectpicker" name="provinsi" id="provinsi" data-live-search="true">
                          <option>Pilih provinsi</option>
                        <?php 
                          while ($data = mysqli_fetch_array($sql)) {
                            ?>
                              <option value="<?=$data['id_provinsi']?>"><?=$data['nama_provinsi']?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" name="kota" class="form-control">
                    </div>
                    <button type="submit" name="aksi" class="btn btn-primary" value="tambah-kota">Tambah Kota</button>
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
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#provinsi").selectpicker()
        $("#provinsi").on('change',function(){
            let id = $(this).val()
            let link ="<?=$_ENV['base_url']?>cms-dashboard/api/lokasi"
            $.ajax({
              url : link,
              method:"POST",
              data:{
                aksi:'check-kota-id',
                id:id
              },
              dataType:'json',
              success:function(data){
                $("#id_kota").val(parseInt(data.id_kota+1))
              }
            });
        });
    });
  </script>
</html>
