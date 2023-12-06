<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Login</title>

<?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
<?php echo link_tag('assets/vendor/fontawesome-free/css/all.min.css'); ?>
<?php echo link_tag('assets/css/sb.min.css'); ?>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <!---- Error Message ---->
          <div class="card-body">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="email" name="email" value="" id="email" class="form-control" autofocus="autofocus"  />
                  <label for="username">Enter Email</label>              
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" name="password" value="" id="password" class="form-control" autofocus="autofocus"  />
                  <label for="password">Password</label>              
                </div>
              </div>
    
              <input type="submit" name="login" value="Login" class="btn btn-primary btn-block"  onclick="login();"/>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/login.js'); ?>" defer></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  </body>

</html>
