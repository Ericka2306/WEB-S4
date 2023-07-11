<div class="container mt-5">
        <h2>Modifier le plat</h2>
        
        <!-- Formulaire de modification du régime -->
        <form action="<?php echo base_url('ControllerBack/modifier_plat/'.$plat->id); ?>" method="post">
            <input type="hidden" name="id_plat" value="<?php echo $plat->id; ?>">
            
            <div class="form-group">
                <label for="nom">Nom du plat</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $plat->nom; ?>" >
            </div>
            
            <div class="form-group">
                <label for="duree">Sary</label>
                <input type="text" class="form-control" id="duree" name="sary" value="<?php echo $plat->sary; ?>" >
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>

