<div class="container mt-5">
    <h2>Liste des Régimes</h2>
    <div class="row">
        <?php foreach ($regime_data as $regime) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- <img src="" class="card-img-top" alt="Image du régime"> -->
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $regime->nom; ?></h5>
                        <p class="card-text">Prix : <?php echo $regime->prix; ?></p>
                        <p class="card-text">Durée : <?php echo $regime->duree; ?></p>
                        <a href="<?php echo base_url('ControllerBack/details_regime/'.$regime->id); ?>" class="btn btn-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="<?php echo base_url('ControllerBack/create_regime'); ?>">Ajouter un regime</a>

    </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>