  <?php 
    $title="Tambah User";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
  // Query
    $provinsi = mysqli_query($con,"SELECT * FROM tb_provinsi");
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
                  <form method="POST" action="<?=$_ENV['base_url']?>cms-dashboard/pages/users/aksi">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" maxlength="35">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select name="provinsi" id="provinsi" class="form-control selectpicker" data-live-search="true">
                        <option>Pilih Provinsi</option>
                        <?php 
                          while ($dataProv = mysqli_fetch_array($provinsi)) {
                            ?>
                              <option value="<?=$dataProv['id_provinsi']?>"><?=$dataProv['nama_provinsi']?></option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kota</label>
                      <select name="kota" id="kota" class="form-control">
                        <option>Silahkan pilih provinsi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <select name="level" class="form-control">
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Artikel</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary form-control" name="aksi" value="tambah">Tambah</button>
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
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#provinsi").selectpicker()
      $("#provinsi").on('change',function(){
        $('#kota').html('<option>Silahkan pilih provinsi</option>')
        var html
        let link ="<?=$_ENV['base_url']?>cms-dashboard/api/lokasi"

        $.ajax({
          url : link,
          method:"POST",
          data:{
            aksi:'kota',
            id:$(this).val()
          },
          dataType:'json',
          success:function(data){
            html += '<option>Pilih Kota</option>'
            for (var a = 0; a < data.item.length; a++) {
              console.log(data.item[a])
              html +='<option value='+data.item[a].id_kota+'>'+data.item[a].nama+'</option>'
            }
            $('#kota').html(html)
          }
        });
      });
    });
  </script>
</html>
