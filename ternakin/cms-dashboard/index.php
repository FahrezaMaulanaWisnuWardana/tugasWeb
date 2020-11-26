<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    $title="Login Ternakin";
    require_once"templates/head-login.php"; 
    if (isset($_SESSION['user'])) {
        header("location:{$_ENV['base_url']}".'cms-dashboard/home'."");
    }
  ?>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-12 mt-5" style="margin-top: 100px !important;">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">CMS Ternakin</h1>
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
                  <form class="user" method="POST" action="auth/aksi">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="aksi" value="login">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>
  <?php require_once"templates/footer-login.php"; ?>
</html>
