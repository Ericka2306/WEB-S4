<div class="container mt-5">
    <h2>Historique d'activités :</h2>
    <br>
    <table class="table table-striped">
        <tr>
            <th>Utilisateur</th>
            <th>Regime</th>
            <th>Sport</th>
            <th>Montant</th>
            <th>Debut</th>
            <th>Fin</th>
        </tr>
        <?php foreach ($results as $row) : ?>
        <tr>
            <td><?php echo $row->utilisateur ?></td>
            <td><?php echo $row->regime ?></td>
            <td><?php echo $row->sport ?></td>
            <td><?php echo $row->montant ?></td>
            <td><?php echo $row->debut ?></td>
            <td><?php echo $row->fin ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="container mt-5">
<h2>Evolution de son poids :</h2>
<br>
<canvas id="graphique" width="800" height="400"></canvas>
</div>
<script>
        var results = <?php echo json_encode($poids); ?>;
        var dates = [];
        var poids = [];
        results.forEach(function(poid) {
            dates.push(poid.datemodif);
            poids.push(poid.poids);
        });
        var ctx = document.getElementById('graphique').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Évolution du poids',
                    data: poids,
                    borderColor: 'blue',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                    title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Poids'
                        }
                    }
                }
            }
        });
</script>


<div class="container mt-5">
<?php echo form_open('ClientController/historique_activites'); ?>
    <p>
        <strong>Selectionner Utilisateur :</strong>
        <input type="hidden" name="userAncien" value="<?php echo $results[0]->id ?>">
            <select name="userId" class="form-select" aria-label="Choisir une option">
                <?php foreach ($utilisateurs as $row) : ?>
                    <option value= <?php echo $row->id ?> > <?php echo $row->nom ?> <option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="ok">
    </p>
<?php echo form_close(); ?>
</div>