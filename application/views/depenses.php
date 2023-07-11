
<body>
    <div class="container mt-5">
        <h2>Liste des Dépenses</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Désignation</th>
                    <th scope="col">Prix Unitaire</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($depenses as $depense) { ?>
                    <tr>
                        <th scope="row"><?php echo $depense->id; ?></th>
                        <td><?php echo $depense->date_depense; ?></td>
                        <td><?php echo $depense->designation; ?></td>
                        <td><?php echo $depense->prixunitaire; ?></td>
                        <td><?php echo $depense->quantite; ?></td>
                        <td><?php echo $depense->total; ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="#">Supprimer</button>
                        </td>
                    </tr>
               
                <?php } ?>
                
            </tbody>
        </table>
    <a href="<?php echo base_url('StatController/create_depense'); ?>">Ajouter une depense</a>

    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>