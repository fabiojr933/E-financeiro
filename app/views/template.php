<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Financeiro</title>

  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo URL_BASE ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="<?php echo URL_BASE ?>assets/#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo URL_BASE ?>assets/index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo URL_BASE ?>assets/#" class="nav-link">Contact</a>
        </li>
      </ul>
      <?php include_once("topo.php"); ?>
    </nav>
    <?php include_once("menu.php"); ?>
    <?php $this->load($view, $viewData); ?>
    <?php include_once("footer.php"); ?>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <script src="<?php echo URL_BASE ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="<?php echo URL_BASE ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/chart.js/Chart.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/sparklines/sparkline.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/dist/js/adminlte.js"></script>
  <script src="<?php echo URL_BASE ?>assets/dist/js/pages/dashboard.js"></script>


  <!-- DataTables  & Plugins -->
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


  <script src="<?php echo URL_BASE ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?php echo URL_BASE ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

  <script src="<?php echo URL_BASE ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="<?php echo URL_BASE ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="<?php echo URL_BASE ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="<?php echo URL_BASE ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
  <script src="<?php echo URL_BASE ?>assets/plugins/select2/js/select2.full.min.js"></script>


  <!-- Bootstrap4 Duallistbox -->
  <script src=".<?php echo URL_BASE ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>


  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <script>
    $(function() {
      // Initialize Select2 Elements
      $('.select2').select2();

      // Initialize Select2 Elements with Bootstrap 4 theme
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>






</body>

</html>