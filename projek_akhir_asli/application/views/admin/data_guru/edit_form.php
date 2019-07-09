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

<!-- ini navbar -->


<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">ADMIN SMA MUHAMMADIYAH</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">       
        <div class="input-group-append">
        </div>
      </div>
    </form>
<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">Settings</a>
      <a class="dropdown-item" href="#">Activity Log</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href='login.php' data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
</ul>

</nav>


<!-- end of ini navbar -->

  
  <div id="wrapper">

    <!-- ini sidebar -->

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
          <a class="dropdown-item" href='data_user/data_guru/tambah_guru'>Guru</a>
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
    </ul>

    <!-- end of ini sidebar -->

      <div id="content-wrapper">

      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Isi konten -->

          <div class="row">
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
                      information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                          DataTables documentation</a>.</p> -->

                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Edit Guru</h6>
                      </div>
                      <div class="card-body">

                          <!-- button menu tambah -->
                          <a href="<?php echo base_url() . 'admin/Barang'; ?>" class="btn btn-light btn-icon-split">
                              <span class="icon text-gray-600">
                                  <i class="fas fa-arrow-right"></i>
                              </span>
                              <span class="text">Kembali</span>
                          </a>
                          <!-- button menu tambah -->

                          <!-- space antar tombol dengan table -->
                          <div class="my-4"></div>
                          <!-- space antar tombol dengan table -->

                          <!-- form inputan data -->

                          <!-- <?php foreach ($data_edit as $u1) { ?> -->

                          <form action="<?php echo base_url() . 'admin/data_user/data_guru/update_aksi'; ?>" method="post">
                              <div class="row">
                                  <div class="col-lg-6 mb-4">
                                      <div class="form-group">
                                          <label>NIP</label>
                                          <input type="text" readonly="" class="form-control" name="NIP" placeholder="NIP" value="">
                                      </div>
                                  </div>
                              </div>

                              <div class="row">

                                  <div class="col-lg-6 mb-4">
                                      <div class="form-group">
                                          <label>Nama Guru</label>
                                          <input type="text" class="form-control" name="nama_guru" placeholder="Nama Guru" value="">
                                      </div>
                                      <div class="form-group">
                                          <label>Alamat</label>
                                          <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3"></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label>Jenis Kelamin</label>
                                          <input type="text" class="form-control" name="jk" placeholder="Jenis Kelamin" value="">
                                      </div>

                                      <!-- tombol submit disini -->
                                      <div class="form-group">
                                          <input type="submit" value="Update">
                                          <a href="<?php echo base_url() . 'admin/Barang'; ?>"> Batal</a>
                                      </div>
                                      <!-- tombol submit disini -->

                                  </div>

                                  <div class="col-lg-6 mb-4">
                                      <div class="form-group">
                                          <label>Email</label>
                                          <input type="text" class="form-control" name="email" placeholder="Email" value="">
                                      </div>
                                      <div class="form-group">
                                          <label>No Hp</label>
                                          <input type="text" class="form-control" name="no_hp" placeholder="No Hp" value="">
                                      </div>
                                      <div class="form-group">
                                          <label>Kode Mapel</label>
                                          <input type="number" class="form-control" name="kode_mapel" placeholder="Kode Mapel" value="">
                                      </div>
                                      <div class="form-group">
                                          <label>Kelas</label>
                                          <input type="number" class="form-control" name="kelas" placeholder="Kelas" value="">
                                      </div>

                                  </div>

                              </div>
                          </form>

                          <!-- form inputan data -->

                          <!-- <?php 
                      } ?> -->

                      </div>
                  </div>

              </div>
          </div>
          <!-- End of Isi konten-->

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
