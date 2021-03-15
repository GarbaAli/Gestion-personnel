<?php

require('bd.php');

if(isset($_GET['ID_PERSONNEL'])) {
   $getMatricule = ($_GET['ID_PERSONNEL']);
   $userinfo = $bdd->prepare('SELECT * FROM personnel WHERE ID_PERSONNEL = ?');
   $userinfo->execute(array($getMatricule));
    
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
    <h1 style="text-align:center">INFORMATION INDIVIDUELLE DU PERSONNEL<br/><h5 style="text-align:center">Fait le : <?php echo date('d/m/y à h:i'); ?></h5></h1>
    
    
    <table border="1" style="width:100%;border-collapse:collapse;" class="border">
        <tr>
            <th style="width:5%">N°</th>
            <th style="width:20%">NOM</th>
            <th style="width:20%">PRENOM</th>
            <th style="width:10%">POSTE</th>
            <th style="width:15%">EMBAUCHE</th>
            <th style="width:15%">NUMERO</th>
            <th style="width:15%">ADRESSE</th>
        </tr>
        
        <?php while ($row=$userinfo->fetch()) { ?>
        <tr style="border:1px; " >
            <td><?php echo ('P00'. $row['ID_PERSONNEL']);?></td>
            <td><?php echo $row['NOM'];?></td>
            <td><?php echo $row['PRENOM'];?></td>
            <td><?php echo $row['ID_POSTE'];?></td>
            <td><?php echo $row['DTE_EMBAUCHE'];?></td>
            <td><?php echo $row['ORANGE'];?></td>
            <td><?php echo $row['QUARTIER'];?></td>
        </tr>
        <?php
        }
        
        /*
         * Fin du traitement
         */
        
        ?>
    </table>
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