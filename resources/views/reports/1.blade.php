@extends('layouts.app')

@section('content')
    <h3>hola</h3>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var users =  {{ Js::from($data) }};
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Doctores', 'Administradores', 'Pacientes'],
                datasets: [{
                    label: '# de cuentas',
                    data: users,
                    borderWidth: 1
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
