<?php
session_start();
  require 'is_connect.php';
  require 'function.php';

  $nb_post = nbre_poste();
  $nb_pers = nbre_personnel();
  $nb_doc = nbre_doc();
  $nb_admin = nbre_admin();
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2N CORPORATE-Personnel</title>

    <!-- Custom fonts for this template-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Debut du menu  -->
      <?php require 'header.php'; ?>
      <!-- Fin du menu -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                    </div>

                    <!-- Contenue de la page -->
                    <div class="row">

                        <!-- Personnel -->

                        <div class="col-xl-12 col-md-8 mb-8">
                          <a href="tables.php">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                                PERSONNELS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $nb_pers ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users" style="font-size:60px; color: #c8872a"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                        <!-- POSTES -->
                        <div class="col-xl-12 col-md-8 mb-8" style="margin-top:20px">
                            <a href="poste.php">
                              <div class="card border-left-success shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                                  POSTES</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nb_post ?></div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fa fa-user " style="font-size:60px; color: #c8872a"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </a>
                        </div>

                        <!-- DOCUMENTS -->
                        <div class="col-xl-12 col-md-8 mb-8" style="margin-top:20px">
                            <a href="document.php">
                              <div class="card border-left-warning shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                                                  DOCUMENTS</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nb_doc ?></div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fa fa-book" style="font-size:60px; color: #c8872a"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </a>
                        </div>

                        <!-- ADMINISTRATION -->
                        <?php if($_SESSION['role'] == 'admin') { ?>
                        <div class="col-xl-12 col-md-8 mb-8" style="margin-top:20px">
                          <a href="admin.php">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-dark text-uppercase mb-1">
                                            ADMINISTRATION</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $nb_admin ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cogs" style="font-size:60px; color: #c8872a"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </a>
                        </div>
                      <?php } ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          <?php require 'footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
      <?php require 'modal.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
