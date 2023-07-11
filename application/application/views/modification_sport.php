<div class="container mt-5">
        <h2>Modifier le Sport</h2>
        
        <!-- Formulaire de modification du régime -->
        <form action="<?php echo base_url('ControllerBack/modifier_sport/'.$sport->id); ?>" method="post">
            <input type="hidden" name="id_sport" value="<?php echo $sport->id; ?>">
            
            <div class="form-group">
                <label for="nom">Nom du Sport</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $sport->nom; ?>" >
            </div>
            
            <div class="form-group">
                <label for="duree">Durée</label>
                <input type="number" class="form-control" id="duree" name="duree" value="<?php echo $sport->duree; ?>" >
            </div>
            
            <h4>Exercices associés</h4>
            
            <!-- Liste des exercices associés -->
            <ul class="list-group">
                <?php foreach ($exercices as $exercice) { ?>
                    <li class="list-group-item">
                        <?php echo $exercice->nom; ?>
                        <button type="button" class="btn btn-danger btn-sm float-right" onclick="#">Supprimer</button>
                    </li>
                <?php } ?>
            </ul>
            
            <div class="form-group mt-3">
                <label for="nouveau_exercice">Ajouter un nouveau exercice</label>
                <select class="form-control" id="nouveau_exercice" name="exercice" >
                    <option value="">Aucun exercice sélectionné</option>    
                    <!-- Options de sélection des exercices -->
                    <?php foreach ($tous_exercices as $exercice) { ?>
                        <option value="<?php echo $exercice->id; ?>"><?php echo $exercice->nom; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>

