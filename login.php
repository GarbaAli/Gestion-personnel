<?php
session_start();
require 'bd.php';
require 'function.php';
if(isset($_POST['submit'])){
    // sleep(1);
$a =  "Ce mot de passe est incorrrect !";
$c =  "Entrer un mot de passe !";
$o =  "ok";


$result = '';
$mdp = '';

if(isset($_POST['mdp']) and !empty($_POST['mdp'])){

    $mdp = sha1($_POST['mdp']);

    $req = $bdd->prepare('SELECT * FROM Personnel WHERE mdp = ?');
    $req->execute(array($mdp));
    $user_infos = $req->fetch();

    if(empty($user_infos['mdp'])){
        $result =  message_flash("$a", "danger");
    }else{
         $_SESSION['id'] = $user_infos['ID_PERSONNEL'];
         $_SESSION['nom'] = $user_infos['NOM'];
         $_SESSION['prenom'] = $user_infos['PRENOM'];
         $_SESSION['role'] = $user_infos['ROLE'];
         // $result = $o;
            header('location:index.php');
    }
}else{
    $result = message_flash("$c", "danger");
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

    <title>2N - Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="  background-image: url(img/banner1.jpg);background-size: 100% 100%;background-repeat: no-repeat;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" style="margin-top:20%">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background: url('img/2n.PNG');background-position: center;background-size: 50% 50%;background-repeat: no-repeat;"></div>
                            <div class="col-lg-6">
                                <div class="p-5" style=" background-color: #c8872a;">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue-Connectez-vous!</h1>
                                    </div>
                                    <form method="post" action="" class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="mdp" placeholder="Votre mot de passe..." >
                                        </div>
                                        <input type="submit" value="Connectez-vous" name="submit" class="btn btn-primary btn-user btn-block"/>
                                        <p style="color:red"><?php if(isset($result)){ echo $result;} ?></p>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
