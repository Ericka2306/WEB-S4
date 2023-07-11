<form method="post" action="<?php echo site_url('Control_program/insert_program'); ?>">
    <h3>Choisissez une série d'exercices :</h3>
    <select name="selected_exercises">
    <?php foreach ($exercice as $exercise) { ?>
        <option value="<?php echo $exercise->id; ?>">
            <?php echo $exercise->nom; ?>
        </option>
    <?php } ?>
    </select>
    

    
    <h3>Choisissez le regime :</h3>
    <select name="selected_diet">
    <?php foreach ($Regime as $exercise) { ?>
        <option value="<?php echo $exercise->id; ?>">
            <?php echo $exercise->nom; ?>
            
        </option>
    <?php } ?>
    </select>
    <h3> L'objectif du regime</h3>
    <select name="selected_objective">
    
        <option value="1">
           perdre du poids
        </option>
        <option value="2">
           prendre du poids
        </option>
   
    </select>
    </select>
    <h3>Choisissez le montant</h3>
    <input type="number" name="montat">
    <h3>Choisissez la limite inferieur du poids</h3>
    <input type="number" name="intervalle_d">
    <h3>Choisissez la limite superieur du poids</h3>
    <input type="number" name="intervalle_f">
    <input type="submit" value="Insérer">
</form>