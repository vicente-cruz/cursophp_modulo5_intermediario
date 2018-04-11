<?php
/* Ir em www.chartjs.org e baixar o Chart.min.js
 * https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js
 */
$vendas = array(10,20,30,40,20);
$custos = array(8,15,37,90,35);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Projeto Gráfico</title>
    </head>
    <body>
        <div style="width:500px;">
            <canvas id="grafico1"></canvas>
        </div>
        <div style="width:500px;">
            <canvas id="grafico2"></canvas>
        </div>
        
        <script type="text/javascript" src="Chart.min.js"></script>
        <script type="text/javascript">
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100);
            };
            
            window.onload = function() {
                var contexto1 = document.getElementById("grafico1").getContext("2d");
                var grafico1 = new Chart(contexto1, {
                    type:'line',
                    data:{
                        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
                        datasets: [
                            {
                                label:'Vendas',
                                backgroundColor:'#FF0000',
                                borderColor:'#FF0000',
                                //data:[3,6,7,4,15],
                                data:[<?php echo implode(',',$vendas); ?>],
                                fill:false
                            },
                            {
                                label:'Custos',
                                backgroundColor:'#00FF00',
                                borderColor:'#00FF00',
                                //data:[2,5,8,10,1],
                                data:[<?php echo implode(',',$custos); ?>],
                                fill:false
                            }
                        ]
                    }
                });
                
                var contexto2 = document.getElementById('grafico2').getContext("2d");
                var grafico2 = new Chart(contexto2, {
                    type:'pie',
                    data:{
                        labels: ["Red", "Orange", "Yellow", "Green", "Blue"],
                        datasets: [
                            {
                                data: [
                                    randomScalingFactor(),
                                    randomScalingFactor(),
                                    randomScalingFactor(),
                                    randomScalingFactor(),
                                    randomScalingFactor(),
                                ],
                                backgroundColor: [
                                    '#FF0000','#FFA500','#FFFF00','#00FF00','#0000FF'
                                ],
                                label: 'Minha pizza'
                            }
                        ]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        </script>
    </body>
</html>