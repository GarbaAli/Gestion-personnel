<?php
  if (isset($_SESSION['notification']['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['notification']['color'] ?>" style="height: <?= $_SESSION['notification']['taille'] ?>px ;">
                <button type="button" style="float: right;" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4 style="float: left;"> <?= $_SESSION['notification']['message'] ?> </h4>
            </div>
      <?php $_SESSION['notification'] = []; ?>

  <?php } ?>
