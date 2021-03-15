<?php
if (empty($_SESSION['role'] == 'admin')) {
  header('location:login.php');
}
 ?>
