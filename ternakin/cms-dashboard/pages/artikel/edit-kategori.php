  <?php 
    $title="Edit Kategori";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>

  <!-- Query -->
  <?php 
    $id = $_GET['id_kategori'];
    $sql = mysqli_query($con,"SELECT * FROM tb_kategori WHERE id_kategori='".$id."'");
    $sqlImgKat = mysqli_query($con,"SELECT * FROM tb_kategori_img WHERE id_kategori='".$id."'");
    $data = mysqli_fetch_assoc($sql);
    $dataImg = mysqli_fetch_assoc($sqlImgKat);
  ?>
  <!-- End Query -->
  <style type="text/css">
    #img-live{
      max-width: 380px;
      margin-bottom: 20px;
      padding:5px;
      border:1px solid #f2f2f2;
    }
  </style>
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
                  <form method="POST" action="<?=$_ENV['base_url']?>cms-dashboard/pages/artikel/aksi" enctype="multipart/form-data">
                    <input type="hidden" name="id_kategori" value="<?=$data['id_kategori']?>">
                    <div class="form-group">
                      <label>Kategori</label>
                      <input type="text" name="kategori" class="form-control" value="<?=$data['kategori']?>">
                    </div>
                    <div class="form-group">
                      <label>Foto Kategori</label>
                      <input type="file" name="foto" class="form-control-file" id="foto" accept="image/png , image/jpeg">
                    </div>
                    <div id="preview-img">
                      <img src="<?=$_ENV['base_url']?>assets/image/kategori/<?=$dataImg['img_kategori']?>" id="img-live">
                    </div>
                    <button type="submit" name="aksi" class="btn btn-primary" value="update-kategori">Ubah Kategori</button>
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
  <script type="text/javascript">
    $(document).ready(function(){
      function readURL(input){
        if(input.files && input.files[0])
        {
          var reader = new FileReader();
          reader.onload = function(e)
          {
            $('#preview-img').css({'display':'block'});
            $('#img-live').attr('src', e.target.result);
          }
              reader.readAsDataURL(input.files[0]);
        }
      }
      $('#foto').change(function(){
        readURL(this);
        $("#img-live").css({'display':'block'});
      });
    });
  </script>
</html>
