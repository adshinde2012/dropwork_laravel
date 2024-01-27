@extends('teacher/base_teacher')

@section('content')

    <div data-spy="scroll"  data-offset="0">

        <div class="card shadow-sm row mx-auto" style="height: 260px; width: 80%;">
            <div class="mt-4 border border-white rounded" style="width: 32%;">
                
                <form method="POST" class="register-form mx-3" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-info"><b>Enter Student Roll Number</b></label>
                        <input type="text" class="form-control border-info col-md-10 bg-white" name="rollno" id="rollno" placeholder="Enter student roll no" required/>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-info"><b>Select Subject</b></label>
                        <select class="form-control border-info col-md-10 bg-white" id="subject" name = "subject" >
                        @foreach($subjects as $sub)
                            <option value="{{$sub->sub_id}}">{{$sub->sub_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group form-button mt-2">
                        <button type="submit" class="btn btn-info">Go</button>
                    </div>
                </form>
            </div>  
            <div class=" bg-white" style="width: 65%; height: 100%;">
                <img class="mx-auto bg-light img-responsive fit-image d-flex justify-content-center" style="height: 100%; width: 70%; " src="/images/homework8.png">
            </div>
        </div>
        <div class="mx-auto mt-2" style="width: 80%;">
            <h4 class="card-header text-center text-info border border-info mb-2 ">Student Report</h4>
        </div>

        @if(count($student)>0)
        <div class="card mx-auto mt-2" style="width: 80%;">
            
            <div class="row my-2">
                <div class="mx-auto pb-2" style="width: 40%;">
                @foreach($student as $st)
                    <h5 class="card-header text-info text-center border-info my-2 bg-white"><b>Student Details</b></h5>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Name : </h5><h5 class="mx-2"> {{$st -> first_name}} {{$st -> last_name}}</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Roll No : </h5><h5 class="mx-2"> {{$st->roll_no}}</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Email : </h5><h5 class="mx-2"> {{$st->email}}</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Course : </h5><h5 class="mx-2"> {{$st->name}}</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Semester : </h5><h5 class="mx-2"> {{$st->sems}}</h5></div>
                @endforeach
                </div>
                <div class="mx-auto" style="width: 40%;">
                    <h5 class="card-header text-info text-center border-info my-2 bg-white"><b>Assignment Report</b></h5>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Total : </h5><h5 class="mx-2">{{$reports[0]}}  Assignments</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Completed : </h5><h5 class="mx-2">{{$reports[1]}}   Assignments</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Uploaded  : </h5><h5 class="mx-2">{{$reports[2]}}   Assignments</h5></div>
                    <div class="row mt-2 mx-3"><h5 class="text-info">Remaining : </h5><h5 class="mx-2">{{$reports[3]}}   Assignments</h5></div>
                    
                </div>
            </div>

            <div class="row my-2 mx-2 mr-2 ">
                <div class="card mx-2 my-2 shadow-sm" style="width: 58%;">
                    <div class="card-body">
                        <h5 class="card-header text-info text-center border-info bg-white"><b>Received Marks</b></h5>
                        <canvas id="myBarChart" class="mt-2" height="65%" width="100%"></canvas>
                        <div class="col-md-12 mt-3">
                            <h5 class="text-center text-info">Total Received Marks : {{$total_marks_report[1]}} / {{$total_marks_report[0]}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card mx-2 my-2 shadow-sm" style="width: 38%;">
                    <div class="card-body">
                        <h5 class="card-header text-info text-center border-info bg-white"><b>Assignments</b></h5>
                        <canvas id="myPieChart" class="mt-2" height="100%" width="100%"></canvas>
                        <div class="col-md-12 mt-4">
                            <h5 class="text-center text-info">Total Assignments : {{$reports[0]}}</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

    <script>
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
        var reports = <?php echo json_encode($js_report); ?>;
        
        var chart = new Chart(ctx2, {
        // The type of chart we want to create
            type: 'doughnut',

        // The data for our dataset
            data: {
                
                labels: ['Completed Assignments','Uploaded Assignments', 'Remaining Assignments'],
                
                datasets: [{
                label: 'All Assignments Status',
                backgroundColor: ['rgb(0,153,0,0.5)','rgb(255,0,0,0.5)','rgb(51,0,102,0.5)'],
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

@stop
    
</body>
</html>