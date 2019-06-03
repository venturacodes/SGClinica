@extends('theme.app')
@section('content')    
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
    <span class="navbar-brand" href="#">
      Relatórios
    </span>
</nav> 
 <div class="container">
 <div class="chart-container" style="width: 800px;height:800px;">
    <p>Para verificar informações do gráfico clique duas vezes sobre o dataset. Neste caso: "Consultas realizadas"</p>
    <canvas id="myChart"></canvas>
    </div>
 </div>         
    
@endsection
@section('additional-js')
<script>
$(document).ready(function(){
    var url = "{{url('api/appointments/getDone')}}";
    var collaborators = new Array();
    var total_appointments = new Array();
    let data = new Array();
    $.get(url, function(response){
            response.forEach(function(data){
                collaborators.push(data.name);
                total_appointments.push(data.total);
            })
    });
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: collaborators,
        datasets: [{
            label: 'Consultas realizadas',
            data: total_appointments,
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
});

</script>
@endsection

