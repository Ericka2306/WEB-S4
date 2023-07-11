<div class="container mt-5">
        <h2>Modifier le Régime</h2>
        
        <!-- Formulaire de modification du régime -->
        <form action="<?php echo base_url('ControllerBack/modifier_regime/'.$regime->id); ?>" method="post">
            <input type="hidden" name="id_regime" value="<?php echo $regime->id; ?>">
            
            <div class="form-group">
                <label for="nom">Nom du Régime</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $regime->nom; ?>" >
            </div>
            
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" value="<?php echo $regime->prix; ?>" >
            </div>
            
            <div class="form-group">
                <label for="duree">Durée</label>
                <input type="number" class="form-control" id="duree" name="duree" value="<?php echo $regime->duree; ?>" >
            </div>
            
            <h4>Plats associés</h4>
            
            <!-- Liste des plats associés -->
            <ul class="list-group">
                <?php foreach ($plats as $plat) { ?>
                    <li class="list-group-item">
                        <?php echo $plat->nom; ?>
                        <button type="button" class="btn btn-danger btn-sm float-right" onclick="#">Supprimer</button>
                    </li>
                <?php } ?>
            </ul>
            
            <div class="form-group mt-3">
                <label for="nouveau_plat">Ajouter un nouveau plat</label>
                <select class="form-control" id="nouveau_plat" name="plat">
                    <option value="">Aucun plat sélectionné</option>    
                    <!-- Options de sélection des plats -->
                    <?php foreach ($tous_plats as $plat) { ?>
                        <option value="<?php echo $plat->id; ?>"><?php echo $plat->nom; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>

