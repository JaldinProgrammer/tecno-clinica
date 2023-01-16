@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Dias de la semana con mas visitas</h3>
        <canvas id="myChart"></canvas>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var dataFromQuery =  {{ Js::from($data) }};
        var labels =  {{ Js::from($labels) }};
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '# de llaves',
                    data: dataFromQuery,
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
