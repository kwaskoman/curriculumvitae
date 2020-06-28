<?php
  session_start();

  if (!isset($_SESSION['logged']['email'])) {
    header('location: ../../');
    exit();
  }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminTEB | USER</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">UserTEB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          echo "<img src=\"../../dist/img/{$_SESSION['logged']['avatar']}\" class='img-circle elevation-2' alt='User Image'>";
        ?>
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              echo $_SESSION['logged']['name'], ' ', $_SESSION['logged']['surname'];
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="../../scripts/logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Wyloguj się
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
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              Strona domowa użytkownika
              <?php
                echo $_SESSION['logged']['name'];
              ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">DOKONAJ WYBORU!</h5>
                <p class="card-text">
                  <div>
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql="SELECT * FROM `candidates`";
                    $result = $conn->query($sql);
                    $i = 1;
                    while ($user = $result->fetch_assoc()){

                      $tab[$i]  = $user['name'];
                      $tab1[$i] = $user['surname'];
                      $i++;
                    }
                    echo<<<WYBORY
                    <form action="" method="post" enctype="text/plain">
                      <div>
                          <p><span style="color: red">Możesz zaznaczyc tylko jednego kandydata!</span></p><br>

                          <input type="radio" name="candidates" value="Kandydat1">$tab[1] $tab1[1]<br>
                          <input type="radio" name="candidates" value="Kandydat1">$tab[2] $tab1[2]<br>
                          <input type="radio" name="candidates" value="Kandydat1">$tab[3] $tab1[3]<br>
                          <input type="radio" name="candidates" value="Kandydat1">$tab[4] $tab1[4]<br>
                          <input type="radio" name="candidates" value="Kandydat1">$tab[5] $tab1[5]<br>
                          <input type="radio" name="candidates" value="Kandydat1">$tab[6] $tab1[6]<br>


                          <button type="submit" class="btn btn-primary">Wyślij</button>

                          </div>
                          </form>
WYBORY;
                          ?>
                    </div>
                </p>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
