<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pret a partir ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Voulez-vous vraiment vous deconnectez ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Non c'etais une erreur</button>
                <a class="btn btn-primary" href="login.php">Deconnexion</a>
            </div>
        </div>
    </div>
</div>

<!-- MODAL POUR Nouveau POSTE -->
<div class="modal fade" id="poste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau Poste </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
          <form id="form_poste" method="post">
            <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="poste" id="postes" class="form-control" placeholder="Entrer le nouveau poste">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <input type="submit" id="submitposte" class="btn btn-primary" value="Ajouter">
            </div>
        </form>
        </div>
    </div>
</div>



<!-- MODAL POUR AFFECTER DES DROITS AU Personnel -->
<div class="modal fade" id="affectation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Affectation </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
          <form id="form_admin" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" autocomplete="off" name="prenom" id="prenom" value="Ali" class="form-control">
              </div>
                <div class="form-group">
                  <select class="form-control" name="role">
                    <option value="admin">admin</option>
                    <option value="utilisateur">utilisateur</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" autocomplete="off" name="mdp" id="mdp" class="form-control" placeholder="le mot de passe du concerné">
                </div>
                <div class="form-group">
                  <input type="password" name="mdp2" id="mdp2" class="form-control" placeholder="Confirmer le mot de passe">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <input type="submit" id="submitadmin" class="btn btn-primary" value="Sauvegarder">
            </div>
        </form>
        </div>
    </div>
</div>
