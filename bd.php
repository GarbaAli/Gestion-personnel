<?php

try {
    $strco = 'mysql:host=localhost;dbname=myapp';
    $bdd = new PDO ($strco,'root','');
} catch (Exception $e) {
    $msg = 'erreur PDO dans '.$e->getMessage();
    die($msg);
}

?>
