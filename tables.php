<?php
session_start();
  require 'is_connect.php';
require ('function.php');

$personnels = All_personnel();
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2N-Liste Personnel</title>

    <!-- Custom fonts for this template -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="css/sb-admin-2.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Personnel</h1>
                        <a href="imprimer.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                            class="fa fa-download fa-sm text-white-50"></i> Generer Liste du Personnel</a>
                        <a href="ajouter_personnel.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fa fa-plus fa-sm text-white-50"></i> Nouveau Personnel</a>
                     </div>
                     <?php include('message.php'); ?>

                    <!-- DataTales Exampl -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste du Personnel</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background:#c8872a;color:#fff">
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Adresse</th>
                                            <th>Numero</th>
                                            <th>Poste</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot style="background:#c8872a;color:#fff">
                                        <tr>
                                          <th>Nom</th>
                                          <th>Prenom</th>
                                          <th>Adresse</th>
                                          <th>Numero</th>
                                          <th>Poste</th>
                                          <th>Statut</th>
                                          <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php while ($personnel = $personnels->fetch()) { ?>
                                        <tr>
                                            <td><?= $personnel['NOM']; ?></td>
                                            <td><?= $personnel['PRENOM']; ?></td>
                                            <td><?= $personnel['VILLE_RESIDENCE']; ?>--<?= $personnel['QUARTIER']; ?></td>
                                            <td><?= $personnel['ORANGE']; ?></td>
                                            <td><?= get_poste($personnel['ID_POSTE']); ?></td>
                                            <td><?= $personnel['STATUT']; ?></td>
                                            <td>

                                                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      ACTIONS
                                                  </a>
                                                  <!-- Dropdown - User Information -->
                                                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                      aria-labelledby="userDropdown">
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item" href="voir_personnel.php?ID_PERSONNEL=<?php echo ($personnel['ID_PERSONNEL']) ?>">
                                                         Voir
                                                     </a>
                                                      <a class="dropdown-item" href="update_personnel.php?ID_PERSONNEL=<?= ($personnel['ID_PERSONNEL']) ?>">
                                                          Modifier
                                                      </a>
                                                      <a class="dropdown-item"  href="voir.php?ID_PERSONNEL=<?php echo $personnel['ID_PERSONNEL'] ?>">
                                                          Imprimer
                                                      </a>
                                                      <a class="dropdown-item" href="new_fichier.php?ID_PERSONNEL=<?= $personnel['ID_PERSONNEL'] ?>">
                                                          Ajouter Document
                                                      </a>
                                                      <?php if($_SESSION['role'] == 'admin') { ?>
                                                      <a class="dropdown-item" onclick="return confirm('Voulez-vous vraiment Supprimer ce Personnel ?'); " href="partials/Supprimer_personnel.php?ID_PERSONNEL=<?= $personnel['ID_PERSONNEL'] ?>">
                                                          Supprimer
                                                      </a>
                                                      <a class="dropdown-item"  href="droit.php?ID_PERSONNEL=<?= $personnel['ID_PERSONNEL']; ?>">
                                                          Donner des Droits
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

</body>

</html>
