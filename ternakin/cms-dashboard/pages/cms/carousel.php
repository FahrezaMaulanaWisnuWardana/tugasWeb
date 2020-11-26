  <?php 
    $title="Slider";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>
  <!-- Query -->
  <?php 
    $id = $_GET['id_carousel'];
    $sql = mysqli_query($con,"SELECT * FROM tb_carousel WHERE id_carousel='".$id."'");
    $data = mysqli_fetch_assoc($sql);
  ?>
  <!-- End Query -->
  <style type="text/css">
    .img-list{
    }
    .img-list img{
      border:1px solid #f2f2f2;
      padding:10px;
      width: 100%;
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
                  <form method="POST" action="<?=$_ENV['base_url']?>cms-dashboard/pages/cms/aksi" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" name="id_carousel" value="<?=$data['id_carousel']?>">
                      <label>Slider</label>
                      <input type="file" name="foto[]" class="form-control-file" id="foto" accept="image/png , image/jpeg" multiple>
                    </div>
                    <div class="form-group">
                      <label>Judul</label>
                      <textarea class="form-control" name="judul"></textarea>
                      <small class="text-danger">Pisahkan dengan simbol (<b> | </b>)</small>
                    </div>
                    <div class="form-group">
                      <label>Sub judul</label>
                      <textarea class="form-control" name="subjudul"></textarea>
                      <small class="p text-danger">Pisahkan dengan simbol (<b> | </b>)</small>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" name="deskripsi"></textarea>
                      <small class="p text-danger">Maksimal 50 karakter per baris & Pisahkan dengan simbol (<b> | </b>)</small>
                    </div>
                    <div class="form-group">
                      <label>Url/link</label>
                      <textarea class="form-control" name="link"></textarea>
                      <small class="text-danger">Pisahkan dengan simbol (<b> | </b>)</small>
                    </div>
                    <button type="submit" name="aksi" id="btn-edit" disabled class="btn btn-primary" value="edit-slider">Edit Slider</button>
                  </form>
                      <div class="img-list">
                        <div class="row d-flex align-items-center">
                          <div class="col-12 my-2">
                            <h3>Foto Lama.</h3>
                          </div>
                          <?php 
                              $s = explode(',', $data['img_carousel']);
                                for ($i=0; $i <count($s); $i++) { 
                                ?>
                                  <div class="col-lg-6 col-md-12">
                                    <img src="<?=$_ENV['base_url']?>assets/image/slider/<?=$s[$i]?>">
                                  </div>
                                <?php
                                }
                           ?>
                          <div class="col-12 my-5">
                            <h3>Foto Baru.</h3>
                          </div>
                        </div>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $("#foto").on('change',function(){
        var fileList = this.files; 
          if (fileList.length>3) {
            $(this).val(null)
            $("#btn-edit").prop('disabled','disabled');
            alert('Maksimal 3 gambar saja!');
          }else{
            $("#btn-edit").prop('disabled',false);
             for(var i = 0; i < fileList.length; i++)
             {
                var t = window.URL || window.webkitURL;
                var objectUrl = t.createObjectURL(fileList[i]);
                $('.img-list > .row').append('<div class="col-lg-6 col-md-12"><img src="' + objectUrl + '"></div>');
             }
          }
      })
    });
  </script>
</html>
