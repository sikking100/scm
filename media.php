<?php
  session_start();
  if (isset($_SESSION['username'])) {
  include "config/koneksi.php";
  include "config/fungsi_thumb.php";
  $nama = strtoupper($_SESSION['nama']);
  $query = mysql_query("SELECT * FROM user WHERE username = '$_SESSION[username]'");
  $r = mysql_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="media.php">
        <div class="sidebar-brand-text mx-3">e-SCM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php
        $status = $_SESSION['status'];
        if ($status == 'admin') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="media.php?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pesan
      </div>

      <!-- Nav Item - List Produk -->
      <li class="nav-item">
        <a class="nav-link" href="media.php?page=pesan">
        <i class="fas fa-list-ul"></i>
          <span>Pesan Produk</span></a>
      </li>
      <!-- Nav Item - List Produk -->
      <li class="nav-item">
        <a class="nav-link" href="media.php?page=pesanan">
        <i class="fas fa-list-ul"></i>
          <span>List Pesanan</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="media.php?page=faktur">
        <i class="fas fa-file-invoice"></i>
          <span>Faktur</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-file-invoice"></i>
          <span>Laporan Penjualan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="media.php?page=laporankasir">Grafik Laporan</a>
            <a class="collapse-item" href="media.php?page=cetak">Cetak Laporan</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setting
      </div>

      <!-- Nav Item - Admin -->
      <li class="nav-item">
        <a class="nav-link" href="media.php?page=user">
          <i class="fas fa-users-cog"></i>
          <span>Kelola User</span></a>
      </li>

      <!-- Nav Item - Supplier -->
      <li class="nav-item">
        <a class="nav-link" href="media.php?page=supplier">
        <i class="fas fa-parachute-box"></i>
          <span>Kelola Supplier</span></a>
      </li>
        <?php } else if ($status == 'supplier') { ?>
          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="media.php?page=dashboard">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Produk
          </div>

          <!-- Nav Item - List Produk -->
          <li class="nav-item">
            <a class="nav-link" href="media.php?page=produk">
              <i class="fas fa-list-ul"></i>
              <span>List Produk</span></a>
          </li>
          <!-- Nav Item - List Produk -->
          <li class="nav-item">
            <a class="nav-link" href="media.php?page=konfirmasipesanan">
              <i class="fas fa-book"></i>
              <span>Pesanan</span></a>
          </li>
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link" href="media.php?page=faktur">
              <i class="fas fa-file-invoice"></i>
              <span>Faktur</span></a>
          </li>
        <?php } else if ($status == 'kasir') { ?>
          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" href="media.php?page=dashboard">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Laporan
          </div>

          <!-- Nav Item - List Produk -->
          <li class="nav-item">
            <a class="nav-link" href="media.php?page=laporankasir">
              <i class="fas fa-list-ul"></i>
              <span>Laporan Penjualan</span>
            </a>
          </li>
        <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
            <!-- Nav Item - Alerts -->
            <?php if ($_SESSION['status'] != 'kasir') { ?>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="angka"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <?php
                  if ($_SESSION['status'] == 'supplier') {
                    $notif = mysql_query("SELECT * FROM pesanan WHERE status_order = '0'");
                  } else {
                    $notif = mysql_query("SELECT * FROM pesanan WHERE status_order = '1'");
                  }
                  while ($n = mysql_fetch_array($notif)) {
                ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo($_SESSION['status']=='admin') ? 'media.php?page=pesanan' : 'media.php?page=konfirmasipesanan' ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date('l, d M Y'); ?></div>
                    <span class="font-weight-bold">Pesanan Baru</span>
                  </div>
                </a>
                <?php } ?>
              </div>
            </li>
            <?php } ?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "<b>$nama</b>"; ?></span>
                <img class="img-profile rounded-circle" src="foto/small_<?php echo "$r[foto]"; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                  if ($r['status'] != 'supplier') {
                    echo "
                      <a class='dropdown-item' href='media.php?page=detailuser&id=$r[id_user]'>
                    ";
                  } else {
                    echo "
                      <a class='dropdown-item' href='media.php?page=detailsupplier&id=$r[id_user]'>
                    ";
                  }
                ?>
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php
            include "page.php";
          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/Chart.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script>
    $(function() {
      $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
    });
  </script>

  <script>
    function ambilKomentar() {
      $.ajax({
        type: "POST",
        url: "notifikasi.php",
        dataType: 'json',
        success: function (response) {
          $("#angka").text("" + response + "");
          timer = setTimeout("ambilKomentar()", 5000);
        }
      });
    }
    $(document).ready(function () {
      ambilKomentar();
    });
  </script>
</body>

</html>
  <?php } else {
    echo "<script>
    alert('Anda Belum Login!!!');
    window.location.href = 'index.php'; 
  </script>";
  } ?>