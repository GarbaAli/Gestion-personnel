<?php
/*
 * Générer un PDF à partir d'une base de données
 */

require('bd.php');
require('function.php');

$req="SELECT * FROM personnel";
$ps=$bdd->prepare($req);
$ps->execute();

/*
 * Début de la temporisation de sortie
 */
ob_start();
?>

<style type="text/css">
    hr{ background:#717375; height:1px; border:none;}
    table{ border-collapse:collapse; width:100%;font-size:11pt;font-family:helvetica; line-height:6mm;  }
    strong{ color:#000; }
    em{ font-size:9pt;}
    table.border td{ border:1px solid #CFD1D2; padding:1mm 1mm;}
    table.border th,td.black{ background:#000; color:#FFF; font-weight:normal; border:solid 1px #FFF; padding:1mm 1mm; text-align:left;}
</style>

<page backtop="5%" backbottom="5%" backleft="5%" backright="5%">

    <page_header style="vertical-align:top;">
        <div style="width:100%;height:70px;">
            <img src="img/2n.png" style="width:20%;height:80px;">
        </div>

            <div style="width:100%; text-align:right; vertical-align:top;margin:-60 0 0 0;">
                <p><span style="font-weight: bold; font-size: 17px">Solutions en matériels et équipements pour un batiment durable</span><br/>
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
    <h1 style="text-align:center">LISTE DU PERSONNEL<br/><h5 style="text-align:center">Fait le : <?php echo date('d/m/y à h:i'); ?></h5></h1>


    <table border="1" style="width:100%;border-collapse:collapse;" class="border">
        <tr>
            <th style="width:5%">N°</th>
            <th style="width:25%">NOM</th>
            <th style="width:15%">PRENOM</th>
            <th style="width:10%">POSTE</th>
            <th style="width:15%">EMBAUCHE</th>
            <th style="width:15%">NUMERO</th>
            <th style="width:15%">ADRESSE</th>
        </tr>

        <?php while ($row=$ps->fetch()) { ?>
        <tr style="border:1px">
            <td><?php echo ('P00'. $row['ID_PERSONNEL']);?></td>
            <td><?php echo $row['NOM'];?></td>
            <td><?php echo $row['PRENOM'];?></td>
            <td><?php echo $row['ID_POSTE'];?></td>
            <td><?=($row['DTE_EMBAUCHE']) ;?></td>
            <td><?php echo $row['ORANGE'];?></td>
            <td><?php echo $row['VILLE_RESIDENCE'];?>-<?php echo $row['QUARTIER'];?></td>
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

/*
 * $content récupére toutes les données mises en mémoire.
 */

$content = ob_get_clean();

require('html2pdf/html2pdf.class.php');

/*
 * On instancie notre constructeur
 * On affiche le contenu
 * On génére notre PDF
 */

$pdf = new HTML2PDF('L','A4','fr','true','UTF-8');
$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(true)');
$pdf->Output('liste_personnel.pdf');

?>
