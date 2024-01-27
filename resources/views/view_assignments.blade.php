@extends('base2')

@section('content')

<div data-spy="scroll"  data-offset="0">

    <div class="container-fluid">
        <div class="row content">
            <div class="ml-3" style="width: 23%;">
                
                <div class="list-group my-1">
                <a href="#" class="list-group-item list-group-item-action active bg-info text-white">
                    Subjects
                </a>
                </div>
                @foreach ($subjects as $sub)
                
                <div class="list-group">
                    <a href="{{url('view_assignments', $sub->sub_id)}}" class="list-group-item list-group-item-action my-1">
                        {{$sub->sub_name}}
                    </a>
                </div>
                @endforeach
            </div>
        
            <div class="ml-3 my-1" style="width: 73%;">
                
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Sr</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">File</th>
                        <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($assignments as $assign)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$assign->title}}</td>
                        <td>{{$assign->description}}</td>
                        <td>{{$assign->sub_name}}</td>
                        <td>{{$assign->end_date}}</td>
                        <td><a href="{{ asset('upload/'.$assign->file_url) }}" class="btn btn-info">View</a></td>
                        <td>{{$assign->points}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="card ml-3 my-2 bg-light" style="width: 23%;">
                <h4 class="card-header text-center text-info border border-info mt-2 mx-2">Total Assignments</h4>
                <canvas id="myPieChart" height="90%" width="100%" class="mt-3"></canvas>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script>

        //Pie chart js
        var ctx2 = document.getElementById('myPieChart').getContext('2d');
        var assign_count = <?php echo json_encode($assigns); ?>;
        var subjects = <?php echo json_encode($all_sub); ?>;
        var chart = new Chart(ctx2, {
        // The type of chart we want to create
            type: 'doughnut',

        // The data for our dataset
            data: {
                
                labels:subjects,
                
                datasets: [{
                label: 'All Assignments Status',
                backgroundColor: ['rgb(255,0,0,0.5)','rgb(0,153,0,0.5)','rgb(51,0,102,0.5)','rgb(245,7,231 ,0.5)' ,'rgb(217,220,3,0.5)' ],
                borderColor: ['rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)','rgb(0,102,102)'],
                data: assign_count,
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
    
                    },
                    color: '#fff',
                }
            }
        }
        });

    </script>

</div>
@stop
