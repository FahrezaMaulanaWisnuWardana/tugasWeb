  <?php 
    $title="Buat Artikel";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Query -->
  <?php 
    $sql = mysqli_query($con,"SELECT * FROM tb_kategori");
  ?>
  <!-- End Query -->
  <style type="text/css">
    #img-live{
      max-width: 380px;
      margin-bottom: 20px;
      padding:5px;
      border:1px solid #f2f2f2;
      display: none;
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
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Thumbnail</label>
                      <input type="file" name="foto" class="form-control-file" id="foto" accept="image/png , image/jpeg">
                    </div>
                    <div id="preview-img">
                      <img src="" id="img-live">
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control selectpicker" name="kategori[]" multiple>
                        <?php 
                          while ($kat = mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?=$kat['id_kategori']?>"><?=$kat['kategori']?></option>
                            <?php
                          }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Isi</label>
                      <textarea name="content" id="summernote"></textarea>
                    </div>
                    <button type="submit" name="aksi" class="btn btn-primary" value="tambah-artikel">Buat Artikel</button>
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

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#summernote').summernote({
        height:200,
        callbacks:{
            onImageUpload: function(files) {
            for (var i = 0; i < files.length; i++) {
              editor = $(this)
              $.upload(files[i],editor)
            }
          }
        }
      });

      $.upload = function(file , editor){
        let out = new FormData();
        out.append('file',file,file.name)
        $.ajax({
          method:'POST',
          url:encodeURI("<?=$_ENV['base_url']?>cms-dashboard/api/upload-img-summernote"),
          contentType:false,
          cache:false,
          processData:false,
          data:out,
          success:function(img){
            editor.summernote('insertImage',img);
          },
          error: function (jqXHR, textStatus, errorThrown) {
              console.error(textStatus + " " + errorThrown);
          }
        })
      }
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
        $("#img-live").css({'display':'block'});
      });

    });
  </script>
</html>
