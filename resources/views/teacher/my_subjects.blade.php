@extends('teacher/base_teacher')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="card shadow col-md-9 mx-auto my-3 bg-white border-white">
        <img class="col-md-12 mx-auto my-3 bg-white img-responsive " style="height: 40%;width: 55%;" src="/images/teacher_work2.png">
        <h4 class="card-header text-center text-info border border-info my-2">My Subjects</h4>
        <div class="card-body">
        @if (!$subjects->isEmpty())
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Credit</th>
                        <th scope="col">Course</th>
                        <th scope="col">Semester</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach ($subjects as $sub)
                    <tr>
                        
                        <td>{{$loop->iteration}}</th>
                        <td>{{$sub->sub_name}}</td>
                        <td>{{$sub->credit}}</td>
                        <td>{{$sub->name}}</td>
                        <td>{{$sub->sems}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-danger" role="alert">
            No any subject assigned to you till now. Please contact administrator!!
        </div>
        @endif
        </div>
    </div>
    
</div>

@stop