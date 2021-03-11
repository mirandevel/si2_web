<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8  flexflex-row">
        <div>
            <h2 class="text-2xl text-center font-semibold leading-tight">Usuarios</h2>
            {{-- <x-jet-label for="u" value="{{'Rango'}}" />
          <select id="u" wire:model="rangoU" name="u" class="w-1/6 form-select mt-1 block">
                 <option value="{{1}}">{{'Hoy'}}</option>
                 <option value="{{2}}">{{'Esta semana'}}</option>
                 <option value="{{3}}">{{'Este mes'}}</option>
                 <option value="{{4}}">{{'Este año'}}</option>
                 <option value="{{5}}">{{'Desde el inicio'}}</option>
             </select>--}}
        </div>

        <canvas id="myChart" width="100" height="35"></canvas>


        <div>
            <h2 class="text-2xl text-center font-semibold leading-tight">Empresas</h2>
            {{--    <x-jet-label for="e" value="{{'Rango'}}" />
                <select id="e" wire:model="rangoE" name="e" class="w-1/6 form-select mt-1 block">
                    <option value="1">{{'Hoy'}}</option>
                    <option value="2">{{'Esta semana'}}</option>
                    <option value="3">{{'Este mes'}}</option>
                    <option value="4">{{'Este año'}}</option>
                    <option value="5">{{'Desde el inicio'}}</option>
                </select>--}}
        </div>
        <canvas id="empresas" width="100" height="35"></canvas>

        <div>
            <h2 class="text-2xl text-center font-semibold leading-tight">Comisiones</h2>
            {{--     <x-jet-label for="c" value="{{'Rango'}}" />
                 <select id="c" wire:model="rangoC" name="c" class="w-1/6 form-select mt-1 block">
                     <option value="1">{{'Hoy'}}</option>
                     <option value="2">{{'Esta semana'}}</option>
                     <option value="3">{{'Este mes'}}</option>
                     <option value="4">{{'Este año'}}</option>
                     <option value="5">{{'Desde el inicio'}}</option>
                 </select>--}}
        </div>
        <canvas id="comisiones" width="100" height="35"></canvas>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js">
    </script>


    <script>

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:<?php echo json_encode($fechasU)?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($cantidadU)?>,
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
        })
    </script>
    <script>
        var ctxx = document.getElementById('empresas').getContext('2d');
        var myChartt = new Chart(ctxx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($fechasE)?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($cantidadE)?>,
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


        var ctxxx = document.getElementById('comisiones').getContext('2d');
        var myCharttt = new Chart(ctxxx, {
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
