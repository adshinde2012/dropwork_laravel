@extends('base2')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="row mx-1">
        <div class="card  mx-auto my-1 bg-light" style="width: 63%;">
        <h4 class="card-header text-center text-info border border-info mt-1 mx-2">My score of all Assignments</h4>
            <div class="card-body">
                <canvas id="myBarChart" height="55%" width="100%"></canvas>
            </div>
        </div>
        <div class="card  mx-1 my-1 bg-light" style="width: 35%;">
            <h4 class="card-header text-center text-info border border-info mt-1 mx-2">Reports</h4>
            <div class="card-body">
                <canvas id="myPieChart" height="100%" width="100%"></canvas>
                <div class="col-md-12 mt-3">
                    <h5 class="text-center text-info">Total Assignments : {{$total_assign}}</h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script type="text/javascript">
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var marks = <?php echo json_encode($marks); ?>;
        var assigns = <?php echo json_encode($assigns); ?>;
        var chart = new Chart(ctx, {
        // The type of chart we want to create
            type: 'bar',

        // The data for our dataset
            data: {
                
                labels: assigns,
                
                datasets: [{
                label: 'Received Marks',
                backgroundColor: ['rgb(255,0,127,0.3)','rgb(0,153,0,0.3)','rgb(51,0,102,0.3)','rgb(255,0,0,0.3)'],
                borderColor: ['rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)'],
                data: marks,
                borderWidth: 1
            }]
        },

        // Configuration options go here
        options: {
            legend: {
                labels: {
                boxWidth: 0,
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
            }
        }
        });

        //Pie chart js
        var ctx2 = document.getElementById('myPieChart').getContext('2d');
        var reports = <?php echo json_encode($report); ?>;
        
        var chart = new Chart(ctx2, {
        // The type of chart we want to create
            type: 'doughnut',

        // The data for our dataset
            data: {
                
                labels: ['Uploaded Assignments','Completed Assignments', 'Remaining Assignments'],
                
                datasets: [{
                label: 'All Assignments Status',
                backgroundColor: ['rgb(255,0,0,0.5)','rgb(0,153,0,0.5)','rgb(51,0,102,0.5)'],
                borderColor: ['rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)'],
                data: reports,
                borderWidth: 1
            }]
        },

        // Configuration options go here
        options: {
            
                tooltips: {
                enabled: true
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx2) => {
    
                        let sum = reports[0] + reports[1] + reports[2];
                        let percentage = (value * 100 / sum).toFixed(2) + "%";
                        return percentage;
    
    
                    },
                    color: '#fff',
                }
            }
        }
        });

        
    </script>

</div>

@stop