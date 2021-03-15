<?php
session_start();
  require 'is_connect.php';
require ('function.php');
  $fichiers = All_document();
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2N- Liste des Postes</title>

    <!-- Custom fonts for this template -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/alertify.min.css" rel="stylesheet">
    <link href="css/semantic.rtl.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php require 'header.php' ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Documents</h1>
                    </div>
                     <?php include('message.php'); ?>
                    <!-- DataTales Exampl -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tous les Documents</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background:#c8872a;color:#fff">
                                        <tr>
                                              <th>ID DOCUMENT</th>
                                              <th>PERSONNEL</th>
                                            <th>LIVELLE DU DOCUMENT</th>
                                            <th style="width:10%">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tfoot style="background:#c8872a;color:#fff">
                                        <tr>
                                              <th>ID DOCUMENT</th>
                                              <th>PERSONNEL</th>
                                              <th>LIVELLE DU DOCUMENT</th>
                                              <th style="width:10%">ACTIONS</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php while ($fichier = $fichiers->fetch()) { ?>
                                        <tr>
                                            <td><?= $fichier['ID_FICHIER']; ?></td>
                                            <td> <?= get_user($fichier['ID_PERSONNEL']); ?></td>
                                            <td><?= $fichier['TITRE']; ?></td>
                                            <td>
                                              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  ACTIONS
                                              </a>
                                              <!-- Dropdown - User Information -->
                                              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                  aria-labelledby="userDropdown">
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" href="personnels/<?= get_user($fichier['ID_PERSONNEL']); ?>/<?= $fichier['TITRE'] ?>">
                                                        Voir le document
                                                  </a>
                                                  <?php if($_SESSION['role'] == 'admin') { ?>
                                                  <a class="dropdown-item" href="partials/Supprimer_fichier.php?ID_FICHIER=<?= $fichier['ID_FICHIER']; ?>">
                                                      Supprimer
                                                  </a>
                                                <?php } ?>
                                              </div>
                                            </td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- traitement du formulaire d'ajout de poste -->
    <script src="js/ajax/f_poste.js"></script>
    <script src="js/alertify.min.js"></script>

</body>

</html>
