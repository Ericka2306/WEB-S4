    <div class="container mt-5">
        <h2>Détails du Régime</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $regime->nom; ?></h5>
                <p class="card-text">Prix : <?php echo $regime->prix; ?></p>
                <p class="card-text">Durée : <?php echo $regime->duree; ?></p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Les plats associes a ce regime :</h5>
            <?php foreach ($plats as $plat) { ?>
                <div class="card-body">
                    <p class="card-text">nom : <?php echo $plat->nom; ?></p>
                    <p class="card-text"><?php echo $plat->sary; ?></p>
                </div>
            <?php } ?>
            <a href="<?php echo base_url('ControllerBack/modifier_regime/'.$regime->id); ?>" class="btn btn-primary">Modifier</a>

            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
