<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8  flexflex-row">
        <div>
            <h2 class="text-2xl text-center font-semibold leading-tight">Gráfica de ventas este mes</h2>
        </div>

            <canvas id="myChart" width="100" height="35"></canvas>

        <div>
            @if($productos->isNotEmpty())
            <h2 class="text-2xl text-center font-semibold leading-tight">Productos mas vendidos este mes</h2>
                @else
                <h2 class="text-2xl text-center font-semibold leading-tight">No se ha vendio ningun producto este mes</h2>

            @endif
        </div>

        <div class="grid grid-cols-5 gap-10 mb-10">
            @foreach($productos as $producto)
                <div class="border-2 border-paleta-4 rounded relative bg-white">
                    <div class="absolute top-0 right-0 ...">
                        <div class="ml-3 relative">
                        </div>
                    </div>
                    <img class="border-b-2 border-paleta-4" src="{{$producto->url_imagen}}">
                    <div class="px-3 py-2 bg-white">
                        <div class="relative flex">
                            <p class="text-black text-lg">{{ucfirst($producto->nombre)}}</p>
                            <p class="text-black text-xl absolute right-0">{{$producto->precio}}$</p>
                        </div>
                        <div class="flex items-center mt-1">
                            @for ($i = 1; $i <= 5; $i++)
                                @if($producto->calificacion>=$i)
                                    <svg class="w-4 h-4 fill-current text-yellow-600"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 fill-current text-gray-400"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <p>Disponibles: {{$producto->cantidad}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js">
    </script>


    <script>



        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($fechas)?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($cantidad)?>,
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
