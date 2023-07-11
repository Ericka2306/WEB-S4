
<div class="container mt-5">
    <h2>Details : </h2>
    <p style="margin-left:50px"><strong>Nom : </strong> <?php echo $user->nom ?></p>
    <p style="margin-left:50px"><strong>Mail : </strong> <?php echo $user->mail ?></p>
    <p style="margin-left:50px"><strong>Caisse : </strong> <?php echo $user->caisse ?> Ar</p>
    <p style="margin-left:50px"><strong>Taille : </strong> <?php echo $profil->taille ?> m</p>
    <p style="margin-left:50px"><strong>Poids : </strong> <?php echo $profil->poids ?> Kg</p>
    <p style="margin-left:50px"><strong>IMC : </strong> <?php echo $IMC ?> Kg/m2</p>
</div>

<div class="container mt-5">
<h2>Evolution de votre poids : </h2>
    <?php echo form_open('ClientController/historique_activites'); ?>
        <select name="userId" class="form-select" aria-label="Choisir une option">
            <?php foreach ($utilisateurs as $row) : ?>
                <option value= <?php echo $row->id ?> > <?php echo $row->nom ?> <option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="ok">
    <?php echo form_close(); ?>
<canvas id="graphique" width="800" height="400"></canvas>
</div>
<script>
        var results = <?php echo json_encode($results); ?>;
        var dates = [];
        var poids = [];
        results.forEach(function(result) {
            dates.push(result.datemodif);
            poids.push(result.poids);
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
