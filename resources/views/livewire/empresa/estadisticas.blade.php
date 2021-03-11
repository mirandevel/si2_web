<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8  flexflex-row">
        <div>
            <h2 class="text-2xl text-center font-semibold leading-tight">Gráfica de Ganancias</h2>
        </div>
        <canvas id="myChart" width="100" height="35"></canvas>
    </div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8  flexflex-row">
        <div>
            <h2 class="text-2xl text-center font-semibold leading-tight">Cantidad de Productos Vendidos</h2>
        </div>
        <canvas id="productos" width="100" height="35"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($fechas)?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($cantidad)?>,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctxx = document.getElementById('productos').getContext('2d');
        var myChartt = new Chart(ctxx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($fechasP)?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($cantidadP)?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</div>
