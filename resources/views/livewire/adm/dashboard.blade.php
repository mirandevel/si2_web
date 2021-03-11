<div>
    <div class="flex justify-center space-x-16 mt-10">
        <div>
            <div
                class="rounded-full bg-white w-24 h-24 flex flex-wrap content-center border-2 border-paleta-1 shadow-2xl">
                <span class="w-full text-center text-2xl font-bold">{{$users}}</span>
            </div>
            <span class="text-xl font-bold">Usuarios totales</span>
        </div>


        <div>
            <div
                class="rounded-full bg-white w-24 h-24 flex flex-wrap content-center border-2 border-paleta-1 shadow-2xl">
                <span class="w-full text-center text-2xl font-bold">{{$empresas}}</span>
            </div>
            <span class="text-xl font-bold">Empresas totales</span>


        </div>
    </div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8 mt-10  flexflex-row">
    <div>
        <h2 class="text-2xl text-center font-semibold leading-tight">Comisiones en este mes</h2>
    </div>

    <canvas id="comisiones" width="100" height="35"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js">
    </script>

    <script>



        var ctx = document.getElementById('comisiones').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($fechasC)?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($cantidadC)?>,
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
</div>

