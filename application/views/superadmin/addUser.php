<!DOCTYPE html>
<html lang="en">

  <head>

<title>Super Admin</title>

<!-- Bootstrap core CSS-->
<?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assets/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assets/css/sb.min.css'); ?>
<style>
  .addUserRow {
    margin-bottom: 14px;
  }
</style>
  </head>

  <body id="page-top">
       <?php include APPPATH.'views/includes/header.php';?>


    <div id="wrapper">

      <!-- Sidebar -->
            <?php include APPPATH.'views/includes/sidebar.php';?>
      <div id="content-wrapper">
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>"/>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Add User</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="card">
            <div class="card-body">
              <div class="row addUserRow">
                <div class="col-lg-2">Name</div>
                <div class="col-lg-10"><input type="text" class="form-control" value="" id="name"/></div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">Mobile</div>
                  <div class="col-lg-10"><input type="text" class="form-control" value="" id="mobile"/></div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">Email Id</div>
                  <div class="col-lg-10"><input type="email" class="form-control" value="" id="email"/></div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">Address</div>
                  <div class="col-lg-10"><textarea value="" class="form-control" id="address"></textarea></div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">Gender</div>
                  <div class="col-lg-10">
                    <select id="gender" class="form-control">
                      <option value="" disabled selected>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">DOB</div>
                  <div class="col-lg-10"><input type="date" class="form-control" value="" id="dob"/></div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">Profile Pic</div>
                  <div class="col-lg-10"><input type="file" class="form-control" value="" id="profile_pic"/></div>
              </div>
              <div class="row addUserRow">
                  <div class="col-lg-2">Signature</div>
                  <div class="col-lg-10"><input type="file" class="form-control" value="" id="signature"/></div>
              </div>
              <div class="row addUserRow text-center">
                  <div class="col-lg-12"><input type="button" class="btn btn-primary" value="Submit" onclick="addUser();"/></div>
              </div>
            </div>
            </div>
          
          </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include APPPATH.'views/includes/footer.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/users.js'); ?>" defer></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb.min.js'); ?>"></script>

  </body>

</html>
