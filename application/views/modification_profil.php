<div class="container mt-5">
        <h2>Modifier le Profil </h2>
        
        <form action="<?php echo base_url(); ?>ProfilController/validation_modification" method="post">
            <input type="hidden" name="id_utilisateur" value="<?php echo $user->id; ?>">
            
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user->nom; ?>" >
            </div>
            
            <div class="form-group">
                <label for="prix">E-mail</label>
                <input type="text" class="form-control" id="prix" name="mail" value="<?php echo $user->mail; ?>" >
            </div>
            
            <div class="form-group">
                <label for="duree">Mot de passe</label>
                <input type="text" class="form-control" id="duree" name="mdp" value="<?php echo $user->motdepasse; ?>" >
            </div>

            <div class="form-group">
                <label for="duree">Taille</label>
                <input type="text" class="form-control" id="duree" name="taille" value="<?php echo $profil->taille; ?>" >
                <input type="hidden" class="form-control" id="duree" name="tailleAncien" value="<?php echo $profil->taille; ?>" >
            </div>

            <div class="form-group">
                <label for="duree">Poids</label>
                <input type="text" class="form-control" id="duree" name="poids" value="<?php echo $profil->poids; ?>" >
                <input type="hidden" class="form-control" id="duree" name="poidsAncien" value="<?php echo $profil->poids; ?>" >
            </div>
            <input type="hidden" class="form-control" id="duree" name="caisse" value="<?php echo $user->caisse; ?>" >
            <input type="hidden" class="form-control" id="duree" name="estAdmin" value="<?php echo $user->estadmin; ?>" >

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>

