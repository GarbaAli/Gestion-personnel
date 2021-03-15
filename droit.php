<?php
session_start();
  require 'is_connect.php';
require ('function.php');
require 'bd.php';
  extract($_GET);
  $id = $ID_PERSONNEL;
  if (!empty($id) and $id > 0 and intval($id)) {
    $q = $bdd->prepare('SELECT * FROM Personnel WHERE ID_PERSONNEL = ?');
    $q->execute(array($id));
    $pers = $q->fetch();

    if (isset($_POST['submit'])) {

      extract($_POST);
      $error = '';
      if (empty($role)) {
        $error .= 'Affecter un role a cet utlisateur <br>';
      }
      if (empty($mdp)) {
        $error .= 'Affecter un passe de connexion<br>';
      }

      if (empty($mdp2)) {
        $error .= 'Confirmer le  passe de connexion<br>';
      }

      if ($error == '') {
          $role = trim(htmlentities($role));
          if ($mdp == $mdp2) {
              $mdp = sha1($mdp);
          }else {
            $error .=  'Vos passes sont differents<br>';
          }
      }

      if ($error === '') {
        $req = $bdd->prepare("UPDATE `personnel` SET `mdp` = :mdp , `ROLE` = :role WHERE `personnel`.`ID_PERSONNEL` = :id");
        $req->execute([
          'mdp'=>$mdp,
          'role'=>$role,
          'id'=> $id
        ]);

        header('location:admin.php');
        set_flash("Droit d'utilisateur affecté a ".$pers['PRENOM'] ,'success');
      }

    }

  }


 ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2N- Droit d'Administration</title>

    <!-- Custom fonts for this template-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/alertify.min.css" rel="stylesheet">
    <link href="css/semantic.rtl.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Debut du menu  -->
      <?php require 'header.php'; ?>
      <!-- Fin du menu -->

                <!-- Begin Page Content -->
                <div class="container">
                  <div class="col-12">
                    <?php if (isset($error)) {
                      echo message_flash($error,'danger',70);
                    } ?>
                  </div>
                  <form id="form_droit" action="" method="post"  style="border:1px solid silver;width:60%;padding:50px;margin-left:150px;border-radius:10px">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <input type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="submitdroit" name="submit" value="Sauvegarder">
                    </div>
                    <hr>

                    <!-- Contenue de la page -->

                        <div class="row">
                          <div class="form-group col-12">
                            <div class="form-group">
                              <input  type="text" disabled value="<?= $pers['NOM'] ?>"  id="nom" autocomplete="off" class="form-control" name="nom">
                            </div>
                          </div>
                          <div class="form-group col-12">
                            <select class="form-control"  id="role" name="role">
                              <option value="admin">admin</option>
                              <option value="utilisateur">utilisateur</option>
                            </select>
                          </div>
                          <div class="form-group col-12">
                            <input type="text" autocomplete="off" name="mdp" id="mdp" class="form-control" placeholder="le mot de passe du concerné">
                          </div>
                          <div class="form-group col-12">
                            <input type="password" name="mdp2" id="mdp2" class="form-control" placeholder="Confirmer le mot de passe">
                          </div>
                        </div><hr>
                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <a href="tables.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Annuler</a>
                          </div>

                        </div>
                      </form>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


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
    <script src="js/alertify.min.js"></script>

</body>

</html>
