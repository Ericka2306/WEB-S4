<div class="container mt-5">
    <h2>Liste des exercices</h2>
    <div class="row">
        <?php foreach ($exercice_data as $exercice) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo base_url(); ?>uploads/<?php echo $exercice->sary; ?>" class="card-img-top" alt="Image du exercice">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $exercice->nom; ?></h5>
                        <p class="card-text">Durée : <?php echo $exercice->sary; ?></p>
                        <a href="<?php echo base_url('ControllerBack/modifier_exercice/'.$exercice->id); ?>" class="btn btn-primary">modifier</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="<?php echo base_url('ControllerBack/create_exercice'); ?>">Ajouter un Exercice</a>

</

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>