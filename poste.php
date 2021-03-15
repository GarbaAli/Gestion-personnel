<?php
session_start();
  require 'is_connect.php';
require ('function.php');
  $postes = All_poste();
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
                        <h1 class="h3 mb-0 text-gray-800">Poste</h1>

                        <a href="#"  data-toggle="modal" data-target="#poste" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fa fa-plus fa-sm text-white-50"></i> Nouveau Poste</a>
                    </div>
                     <?php include('message.php'); ?>
                    <!-- DataTales Exampl -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des Postes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background:#c8872a;color:#fff">
                                        <tr>
                                            <th>ID POSTE</th>
                                            <th>LIBELLE</th>
                                            <?php if($_SESSION['role'] == 'admin') { ?>
                                            <th style="width:10%">ACTIONS</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot  style="background:#c8872a;color:#fff">
                                        <tr>
                                          <th>ID POSTE</th>
                                          <th>LIBELLE</th>
                                          <?php if($_SESSION['role'] == 'admin') { ?>
                                          <th style="width:10%">ACTIONS</th>
                                          <?php } ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php while ($poste = $postes->fetch()) { ?>
                                        <tr>
                                            <td><?= $poste['ID_POSTE']; ?></td>
                                            <td><?= $poste['NOM_POSTE']; ?></td>
                                            <?php if($_SESSION['role'] == 'admin') { ?>
                                            <td>
                                              <a href="post/trash_poste.php?ID_POSTE=<?= $poste['ID_POSTE'] ?>" onclick="return confirm('Etes vous sure...?'); " class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                                  class="fa fa-trash fa-sm text-white-50"></i>Supprimer</a>
                                            </td>
                                          <?php } ?>
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
