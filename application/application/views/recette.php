<div class="container mt-5">
<h2>Recette :</h2>
<br>
<canvas id="graphique" width="800" height="400"></canvas>
</div>
<script>
        var dates = <?php echo $dates; ?>;
        var poids = <?php echo $montants; ?>;
        var ctx = document.getElementById('graphique').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Vola miditra',
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
