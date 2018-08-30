@extends('theme.app')
@section('content')    
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
    <span class="navbar-brand" href="#">
      Relatórios
    </span>
    </nav>    
    <div class="chart-container" style="width: 400px;height:400px;">
        <canvas id="myChart"></canvas>
    </div>
@endsection
@section('additional-js')
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Bruno", "Arthur", "Paulo", "Priscilla"],
        datasets: [{
            label: 'Consultas realizadas',
            data: [12, 19, 3, 5],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 2        
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection

