@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Especialidades mas requeridas</h3>
        <canvas id="myChart"></canvas>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var labels =  ['Pediatra', 'Nefrologo', 'Cirujano', 'Infectologo', 'Dermatologo']
        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels,
                datasets: [{
                    label: '# de atenciones',
                    data: [15, 4, 10, 11, 16],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ]
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
