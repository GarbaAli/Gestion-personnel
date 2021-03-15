<?php

require('bd.php');
require 'function.php';

if(isset($_GET['ID_PERSONNEL'])) {
   $getMatricule = ($_GET['ID_PERSONNEL']);
   $userinfo = $bdd->prepare('SELECT * FROM personnel WHERE ID_PERSONNEL = ?');
   $userinfo->execute(array($getMatricule));
   $info = $userinfo->fetch();

ob_start();
?>

<style type="text/css">
   span{color:grey;}
  div .images{width:150px;height:150px;margin-left:200px;}
    h3{text-decoration:none;font-size:16px;padding-bottom:5px}
    table td{font-size:15px;margin-bottom:10px}
    table strong{color:grey;}
    .image{width:390px;height:120px;margin-left:140px;margin-bottom:200px}
    #mage{position:relative;left:85px;margin-bottom:5px}
    h2{text-decoration:underline;font-style:italic;}
    #avatar{width:50px;height:50px }


</style>

<page backtop="5%" backbottom="5%" backleft="5%" backright="5%">

    <page_header style="vertical-align:top;">
        <div style="width:100%;height:70px;">
            <img src="img/2n.png" style="width:20%;height:80px;">
        </div>

            <div style="width:100%; text-align:right; vertical-align:top;margin:-60 0 0 0;">
                <p><span style="font-weight: bold; font-size: 17px; font-color: black;">Solutions en matériels et équipements pour un batiment durable</span><br/>
                Négoce international - Représentation commerciale - Fourniture du matériel<br/>
               électrique (BTP et Industriel) - carrelage d'habitation et industriel - montage de projets<br/>
               de construction de batiments tertiaires et insdustriels
            </p>
            </div>

        <hr/>
    </page_header>


    <page_footer>
        <hr/>
        <p style="text-align:center">Situé à BONABERI (ancienne route) - face cinéma FOHATO<br/>
        BP : Doual Cameroun -Tél fixe : (237) 233 390 876 - Tel port : (237) 694 015 788<br/>
        Email : info@2ncorporate.com - Web site : www.2ncorporate.com - PO88512329689C - RC N°:RC/YAO/2015/A/3930</p>
    </page_footer>


<div style="margin: 50 0 0 0;">
    <h1 style="text-align:center">INFORMATION INDIVIDUELLE DU PERSONNEL<br/><?php echo $info['NOM']; ?><br><h5 style="text-align:center">Fait le : <?php echo date('d/m/y à h:i'); ?></h5></h1>





    <em style="color:#000;font-size:20px;text-decoration:underline">Informations de base</em>
    <div style="width: 70%">

        <div style="margin-left: -150px;">
            <p>Nom : <?php echo $info['NOM']; ?></p>

            <p>Ville de résidence : <?php echo $info['VILLE_RESIDENCE']; ?></p>

            <p>Etat Matrimonial : <?php echo $info['ETAT_MATRIMONIAL']; ?></p>

            <p>Poste : <?= get_poste($info['ID_POSTE']); ?></p>
        </div>

        <div style="text-align: right;margin-top: -120px;margin-right: 220px">
            <div style="text-align: left">
                <p >Prenom : <?php echo $info['PRENOM']; ?></p>

                <p>Quatier : <?php echo $info['QUARTIER']; ?></p>

                <p>Nombre d'enfant : <?php echo $info['NBRE_ENFANT']; ?></p>
            </div>
        </div>

    </div>

    <em style="color:#000;font-size:20px;text-decoration:underline;margin-top: 50px;">Adresses</em>
    <div style="width: 70%">

        <div style="margin-left: -50px;">
            <p>Numéro Orange : <?php echo $info['ORANGE']; ?></p>
            <p>Numéro Professionnel : <?php echo $info['PHONE_PRO']; ?></p>
        </div>

        <div style="text-align: right;margin-top: -50px;margin-right: 120px">
            <div style="text-align: left">
                <p >Numéro Mtn : <?php echo $info['MTN']; ?></p>
            </div>
        </div>
    </div>


    <em style="color:#000;font-size:20px;text-decoration:underline;margin-top: 50px;">Personne a contacter en cas d'urgence</em>
    <div style="width: 70%">

        <div style="margin-left: 30px;">
            <p>Numéro d'urgence : <?php echo $info['CONTACT_URGENT']; ?></p>
            <p>Nature du lien Avec le concerne : <?php echo $info['LIEN_PARENTER']; ?></p>
        </div>

        <div style="text-align: right;margin-top: -68px;margin-right: 40px">
            <div style="text-align: left">
                <p >Nom du concerné : <?php echo $info['NOM_URGENT']; ?></p>
            </div>
        </div>

    </div>


    <em style="color:#000;font-size:20px;text-decoration:underline;margin-top: 50px;">Informations Complementaires</em>
    <div style="width: 70%">

        <div style="margin-left: 30px;">
            <p>Pointure Chaussure : <?php echo $info['POINTURE']; ?></p>
            <p>Anglais : <?php echo $info['ANGLAIS']; ?></p>
            <p>Date d'embauche : <?= parse_date( $info['DTE_EMBAUCHE']); ?></p>
        </div>

        <div style="text-align: right;margin-top: -68px;margin-right: 40px">
            <div style="text-align: left">
                <p >Francais : <?php echo $info['FRANCAIS']; ?></p>
                <p >Autre Langue ? : <?php echo $info['AUTRE_LANGUE']; ?></p>
            </div>
        </div>

    </div>






</div>
</page>



<?php
}
$contenue = ob_get_clean();
require('html2pdf/html2pdf.class.php');

$pdf = new HTML2PDF('p','A4','fr','UTF-8');
$pdf -> writeHTML($contenue);
$pdf -> output('personnel.pdf');


?>
