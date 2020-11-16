  <?php 
    $title="Edit Artikel";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
   <script src="<?=$_ENV['base_url']?>assets/ckeditor/ckeditor.js"></script>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Query -->
  <?php 
    $sqli = mysqli_query($con, "SELECT * FROM tb_artikel WHERE id_artikel='".$_GET['id_artikel']."'");
    $sqlKatAll = mysqli_query($con,"SELECT * FROM tb_kategori");
    $data = mysqli_fetch_assoc($sqli);
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
                    <input type="hidden" name="id_artikel" value="<?=$data['id_artikel']?>">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control" value="<?=$data['judul']?>">
                    </div>
                    <div class="form-group">
                      <label>Thumbnail</label>
                      <input type="file" name="foto" class="form-control-file" id="foto" accept="image/png , image/jpeg">
                    </div>
                    <div id="preview-img">
                      <img src="<?=$_ENV['base_url']?>assets/image/artikel/<?=$data['foto']?>" id="img-live">
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control selectpicker" name="kategori[]" multiple>
                        <?php 
                          $katId = explode(',', $data['id_kategori']);
                          while ( $kat= mysqli_fetch_array($sqlKatAll)) {
                              ?>
                              <option value="<?=$kat['id_kategori']?>" <?=(in_array($kat['id_kategori'], $katId))?'selected':'';?> ><?=$kat['kategori']?></option>
                              <?php
                          }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Isi</label>
                      <textarea name="content" id="isi"><?=$data['isi']?></textarea>
                      <script type="text/javascript">
                        var editor = CKEDITOR.replace('isi');
                        CKFinder.setupCKEditor(editor);
                      </script>
                    </div>
                    <button type="submit" name="aksi" class="btn btn-primary" value="update-artikel">Ubah Artikel</button>
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
      $('select').selectpicker();
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
      });

    });
  </script>
</html>
