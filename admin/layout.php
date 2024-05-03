<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] !== "admin") {
  header("Location: ../../{$_SESSION['role']}/dashboard/dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Brgy Health Center</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">


  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

  <!-- DataTables JavaScript -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
  .error {
    color: red;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">



    <!-- Navbar -->
    <nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 5px !important;z-index: 1">
      <!-- Left navbar links -->


      <div class="row mx-0">
        <div class="col-sm-1">
          <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"
              style="color: gray"></i></a>
        </div>

        <div class="col-sm-5">
          <h4 style="font-weight: bold" class="mt-1">
            <h4 style="font-weight: bold;">
              <?= $pageTitle ?>
            </h4>
          </h4>
        </div>

        <div class="col-sm-3">
          <div class="input-group input-group-sm">



          </div>
        </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <center>

          <img src="../../assets\images\buluaLogo.png" alt="" style="height:150px; width:150px;"
            onmousedown="return false;">
        </center>
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../assets/images/profile.png" class="img-circle elevation-2" alt="User Image"
              onmousedown="return false;">
          </div>
          <?php
          include_once ('../../config.php');

          // Check if user is logged in
          if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Query to fetch user's name from admins table
            $sel = "SELECT * FROM admins WHERE user_id = $user_id";
            $query = mysqli_query($conn, $sel);

            if ($query) {
              $result = mysqli_fetch_assoc($query);

              if ($result) {
                ?>
                <div class="info">
                  <a href="#" class="d-block">
                    <?php echo $result['first_name'] . ' ' . $result['last_name']; ?><br />Head Nurse
                  </a>
                </div>
                <?php
              } else {
                echo "No users found";
              }
            } else {
              echo "Query failed: " . mysqli_error($conn);
            }
          }
          ?>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2" style="height:700px;">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="../dashboard/dashboard.php" class="nav-link">
                <i class="fas fa-tachometer-alt "></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>




            <li class="nav-item">
              <a href="../family/family.php" class="nav-link">
                <i class="fas fa-file-prescription fa-lg "></i>
                <p>
                  Family Planning
                </p>
              </a>
            </li>

            <!-- <li class="nav-item <?php
            if (
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/family/family.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/family/done_family.php') !== false
            ) {
              echo 'menu-open';
            }
            ?>">
              <a href="" class="nav-link ml-1">
                <i class="fas fa-file-prescription fa-lg" aria-hidden="true"></i>
                <p>
                  Family Planning
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ml-2">
                  <a href="../family/family.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/family/family.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>
                <li class="nav-item ml-2">
                  <a href="../family/done_family.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/family/done_family.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Done</p>
                  </a>
                </li>
              </ul>
            </li> -->


            <li class="nav-item">
              <a href="../immunization/immunization.php" class="nav-link">
                <i class="fas fa-file-prescription fa-lg"></i>
                <p>
                  Immunization
                </p>
              </a>
            </li>


            <!-- <li class="nav-item <?php
            if (
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/immunization/immunization.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/immunization/done_immunization.php') !== false
            ) {
              echo 'menu-open';
            }
            ?>">
              <a href="" class="nav-link ml-1">
                <i class="fas fa-file-prescription fa-lg" aria-hidden="true"></i>
                <p>
                  Immunization
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ml-2">
                  <a href="../immunization/immunization.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/immunization/immunization.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>
                <li class="nav-item ml-2">
                  <a href="../immunization/done_immunization.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/immunization/done_immunization.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Done</p>
                  </a>
                </li>
              </ul>
            </li> -->





            <li class="nav-item">
              <a href="../status/status.php" class="nav-link">
                <i class="fas fa-vial fa-lg "></i>
                <p>
                  Status
                </p>
              </a>
            </li>



            <!-- <li class="nav-item">
              <a href="../report/report.php" class="nav-link">
                <i class="fa fa-book fa-lg "></i>
                <p>
                  Report
                </p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="../announcement/announcement.php" class="nav-link">
                <i class="fa fa-bullhorn fa-lg "></i>
                <p>
                  Announcement
                </p>
              </a>
            </li>


            <li class="nav-item <?php
            if (
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/admin/admin.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/nurse/nurse.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/superadmin/superadmin.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/midwife/midwife.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/staff/staff.php') !== false
            ) {
              echo 'menu-open';
            }
            ?>">

            <li class="nav-item">
              <a href="../logs/logs.php" class="nav-link">
                <i class="fas fa-history fa-lg "></i>
                <p>
                  Logs
                </p>
              </a>
            </li>

            <li class="nav-item <?php
            if (
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/report/immunization.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/report/family.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/report/consultation.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/report/prenatal.php') !== false

            ) {
              echo 'menu-open';
            }
            ?>">
              <a href="" class=" nav-link">
                <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                <p>
                  Report
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../report/immunization.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/report/immunization.php')
                    echo 'active'; ?>">
                    <i class="fas fa-list fa-lg nav-icon"></i>
                    <p>Immunization</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../report/family.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/report/family.php')
                    echo 'active'; ?>">
                    <i class="fas fa-list fa-lg nav-icon"></i>
                    <p>Family Planning</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../report/consultation.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/report/consultation.php')
                    echo 'active'; ?>">
                    <i class="fas fa-list fa-lg nav-icon"></i>
                    <p>Consultation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../report/prenatal.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/report/prenatal.php')
                    echo 'active'; ?>">
                    <i class="fas fa-list fa-lg nav-icon"></i>
                    <p>Prenatal</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="../midwife/midwife.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/midwife/midwife.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Midwife</p>
                  </a>
                </li> -->
              </ul>
            </li>



            <li class="nav-item <?php
            if (
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/admin/admin.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/nurse/nurse.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/superadmin/superadmin.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/midwife/midwife.php') !== false ||
              strpos($_SERVER['REQUEST_URI'], '/brgyv2/admin/staff/staff.php') !== false
            ) {
              echo 'menu-open';
            }
            ?>">
              <a href="" class="nav-link">
                <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../admin/admin.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/superadmin/admin/admin.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../superadmin/superadmin.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/superadmin/superadmin.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Doctor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../nurse/nurse.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/superadmin/nurse/nurse.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Nurses</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../staff/staff.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/superadmin/staff/staff.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../midwife/midwife.php" class="nav-link <?php if ($_SERVER['REQUEST_URI'] === '/brgyv2/admin/midwife/midwife.php')
                    echo 'active'; ?>">
                    <i class="fas fa-user-edit fa-lg nav-icon"></i>
                    <p>Midwife</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="../action/logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt "></i>
                <p>
                  Logout
                </p>
              </a>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <?php include $contentTemplate; ?>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->


  <script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.js"></script>



  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="../../assets/dist/js/pages/dashboard.js"></script> -->
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


</body>
<script type="text/javascript">

  document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
  });


  document.onkeydown = function (e) {
    if (event.keyCode == 123) {
      return false;
    } if (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'i'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && (e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'c'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && (e.keyCode == 'N'.charCodeAt(0) || e.keyCode == 'n'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && (e.keyCode == 'O'.charCodeAt(0) || e.keyCode == 'o'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'F'.charCodeAt(0) || e.keyCode == 'f'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'P'.charCodeAt(0) || e.keyCode == 'p'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'N'.charCodeAt(0) || e.keyCode == 'n'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'T'.charCodeAt(0) || e.keyCode == 't'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
      return false;
    }
    if (e.ctrlKey && (e.keyCode == 'H'.charCodeAt(0) || e.keyCode == 'h'.charCodeAt(0))) {
      return false;
    }

  };


  // eval(function (p, a, c, k, e, d) { e = function (c) { return c.toString(36) }; if (!''.replace(/^/, String)) { while (c--) { d[c.toString(a)] = k[c] || c.toString(a) } k = [function (e) { return d[e] }]; e = function () { return '\\w+' }; c = 1 }; while (c--) { if (k[c]) { p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]) } } return p }('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();', 17, 17, '||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'), 0, {}))



</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Disable text selection
    disableTextSelection();
  });

  function disableTextSelection() {
    document.addEventListener('selectstart', function (e) {
      e.preventDefault();
    });
  }
</script>

</html>