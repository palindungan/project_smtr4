
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href=<?php echo base_url("assets/fontawesome-free/css/all.min.css"); ?> rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href=<?php echo base_url("assets/datatables/dataTables.bootstrap4.css");?> rel="stylesheet">

<!-- Custom styles for this template-->
<link href=<?php echo base_url("css/sb-admin-2.css"); ?> rel="stylesheet">

</head>

<body id="page-top">

    <?php include 'navbar.php' ?>

  <div id="wrapper">
<!-- Sidebar -->
      <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Data:</h6>
          <a class="dropdown-item" href='admin/dataguru'>Guru</a>
          <a class="dropdown-item" href='admin/datasiswa'>Siswa</a>
        </div>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Input Data:</h6>
          <a class="dropdown-item" href="#">Guru</a>
          <a class="dropdown-item" href="#">Siswa</a>
        </div>
        <li class="nav-item dropdown">
        <a class="nav-link" href='admin/mapel'>
            <i class="fas fa-fw fa-folder"></i>
              <span>Mata Pelajaran</span>
          </a>
        </li>        
        <li class="nav-item dropdown">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
              <span>Tabel Presensi</span>
          </a>
        </li>
      </li>
    </ul>

      <div id="content-wrapper">

      <div class="container-fluid">
      	<!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        
        <?php include 'isidahsboard.php' ?>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=<?php echo base_url("assets/jquery/jquery.min.js");?>></script>
  <script src=<?php echo base_url("assets/bootstrap/js/bootstrap.bundle.min.js");?>></script>

  <!-- Core plugin JavaScript-->
  <script src=<?php echo base_url("assets/jquery-easing/jquery.easing.min.js");?>></script>

  <!-- Page level plugin JavaScript-->
  <script src=<?php echo base_url("assets/chart.js/Chart.min.js");?>></script>
  <script src=<?php echo base_url("assets/datatables/jquery.dataTables.js");?>></script>
  <script src=<?php echo base_url("assets/datatables/dataTables.bootstrap4.js");?>></script>

  <!-- Custom scripts for all pages-->
  <script src=<?php echo base_url("js/sb-admin-2.min.js")?>></script>

  <!-- Demo scripts for this page-->
  <script src=<?php echo base_url("js/demo/datatables-demo.js");?>></script>
  <script src=<?php echo base_url("js/demo/chart-area-demo.js");?>></script>

</body>

</html>