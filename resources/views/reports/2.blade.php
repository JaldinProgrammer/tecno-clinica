@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Llaves por cada tabla</h3>
        <canvas id="myChart"></canvas>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var dataFromQuery =  {{ Js::from($data) }};
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Reservaciones',
                    'Diagnostico',
                    'Cita',
                    'Usuarios',
                    'Especialidades',
                    'Promociones',
                    'llaves',
                    'Especialidades de doctores',

                ],
                datasets: [{
                    label: '# de llaves',
                    data: dataFromQuery,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(154, 162, 235)',
                        'rgb(55, 205, 86)',
                        'rgb(24, 72, 235)',
                        'rgb(15, 95, 126)',
                        'rgb(200, 140, 15)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
