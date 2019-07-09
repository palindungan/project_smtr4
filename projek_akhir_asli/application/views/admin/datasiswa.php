<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="<?=base_url()?>">
	<meta charset="UTF-8">
	<title>Data Siswa</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Custom fonts for this template-->
  <link href=<?php echo base_url("assets/fontawesome-free/css/all.min.css"); ?> rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href=<?php echo base_url("assets/datatables/dataTables.bootstrap4.css");?> rel="stylesheet">

<!-- Custom styles for this template-->
<link href=<?php echo base_url("css/sb-admin-2.css"); ?> rel="stylesheet">

</head>
<body>
  <body id="page-top">

    <?php include 'navbar.php' ?>

  <div id="wrapper">

    <?php include 'sidebar.php'?> 

<div id="content-wrapper">

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Data Guru</a>
    </li>
  </ol>

	<a href="data/add" class="btn btn-primary">Tambah Data Siswa</a>

	<table class='table table-bordered table-hover'><br><br>
		<thead>
			<tr>
				<th>NIS</th>
				<th>Nama Siswa</th>				
        <th>Jenis Kelamin</th>        		
        <th>Kelas</th>
				<th>umur</th>
				<th>golongan</th>
        <th>golongan</th>
			</tr>
		</thead>
		<tbody>
			<!-- ISI DATA AKAN MUNCUL DISINI -->
		              <tr>
                    <td>0987654</td>
                    <td>Alucard</td>
                    <td>L</td>
                    <td>11</td>
                    <td>17</td>
                    <td>A</td>
                 </tr>
                  <tr>
                    <td>0932456</td>
                    <td>Vexana</td>
                    <td>P</td>
                    <td>11</td>
                    <td>16</td>
                    <td>A</td>
                 </tr>              
			
		</tbody>
	</table>
</div>

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
