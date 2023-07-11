<div class="container mt-5">
    <h2>Liste des plats</h2>
    <div class="row">
        <?php foreach ($plat_data as $plat) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="chemin_vers_l_image" class="card-img-top" alt="Image du plat">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $plat->nom; ?></h5>
                        <p class="card-text">Durée : <?php echo $plat->sary; ?></p>
                        <a href="<?php echo base_url('ControllerBack/modifier_plat/'.$plat->id); ?>" class="btn btn-primary">modifier</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="<?php echo base_url('ControllerBack/create_plat'); ?>">Ajouter un plat</a>

</

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>