<div class="container mt-5">
        <h2>Modifier l'exercice</h2>
        
        <!-- Formulaire de modification du régime -->
        <form action="<?php echo base_url('ControllerBack/modifier_exercice/'.$exercice->id); ?>" method="post">
            <input type="hidden" name="id_exercice" value="<?php echo $exercice->id; ?>">
            
            <div class="form-group">
                <label for="nom">Nom de l'exercice</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $exercice->nom; ?>" >
            </div>
            
            <div class="form-group">
                <label for="duree">Sary</label>
                <input type="text" class="form-control" id="duree" name="sary" value="<?php echo $exercice->sary; ?>" >
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>

