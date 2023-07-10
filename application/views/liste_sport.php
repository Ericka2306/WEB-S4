<div class="container mt-5">
    <h2>Liste des sports</h2>
    <div class="row">
        <?php foreach ($sport_data as $sport) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="chemin_vers_l_image" class="card-img-top" alt="Image du sport">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $sport->nom; ?></h5>
                        <p class="card-text">Durée : <?php echo $sport->duree; ?></p>
                        <a href="<?php echo base_url('ControllerBack/details_sport/'.$sport->id); ?>" class="btn btn-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <a href="<?php echo base_url('ControllerBack/create_sport'); ?>">Ajouter un sport</a>
</div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>