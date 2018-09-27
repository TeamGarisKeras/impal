<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>~ Welcome ~</title>
    <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <style media="screen">
      body{
        font-family: 'Bree Serif', serif;
      }
      label{
        font-size: 14px;
      }
      .card{
        box-shadow: 0 1px #FFFFFF inset, 0 1px 3px rgba(34, 25, 25, 0.4);
      }
    </style>
  </head>
  <body>
    <div class="container p-5">
      <div class="row">
        <div class="mx-auto card col-12 col-sm-8 col-md-6 col-lg-4">
          <!-- <?php if($this->session->flashdata('gagal')){
                  echo '<div class="alert alert-danger">Username atau Password Salah..<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
              }?> -->
              <div class="card-body">
                <h3 class="card-subtitle mb-2 d-flex justify-content-center">Welcome</h3>
                <div class="d-flex justify-content-center mb-5 mt-2">
                  <img src="<?=base_url()?>assets/img/logo.png" class="img-fluid mx-auto" height="100px" width="100px" alt="">
                </div>
                <?= form_open('')?>
                  <div class="form-group">
                    <label class="" for="username">Username</label>
                    <input type="text" class="form-control" name="_username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label class="" for="username">Password</label>
                    <input type="password" class="form-control" name="_password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-info w-100" name="button">Login</button>
                <?= form_close(); ?>
              </div>
        </div>
      </div>
    </div>
  </body>
</html>
