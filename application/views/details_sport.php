<div class="container mt-5">
        <h2>Détails du Sport</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $sport->nom; ?></h5>
                <p class="card-text">Durée : <?php echo $sport->duree; ?></p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Les exercices associes a ce regime :</h5>
            <?php foreach ($exercices as $exercices) { ?>
                <div class="card-body">
                    <p class="card-text">nom : <?php echo $exercices->nom; ?></p>
                    <p class="card-text"><?php echo $exercices->sary; ?></p>
                </div>
            <?php } ?>
            <a href="<?php echo base_url('ControllerBack/modifier_sport/'.$sport->id); ?>" class="btn btn-primary">Modifier</a>

            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
