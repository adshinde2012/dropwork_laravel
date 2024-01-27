@extends('base2')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="card col-md-9 mx-auto my-3 bg-light">
        <img class="col-md-12 mx-auto my-3 bg-light img-responsive fit-image" src="images/negative-homework.jpg">
        <h4 class="card-header text-center text-info border border-info my-2">To-Do Assignments</h4>
        <div class="card-body">
            
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Points</th>
                    <th scope="col">File</th>
                    <th scope="col">Solution</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($todolist as $todo)
                    <tr>
                        
                        <td>{{$todo->title}}</td>
                        <td>{{$todo->description}}</td>
                        <td>{{$todo->sub_name}}</td>
                        <td>{{$todo->end_date}}</td>
                        <td>{{$todo->points}}</td>
                        <td><a href= "{{ asset('upload/'.$todo->file_url) }}" role="button" class="btn btn-success">View</a></td>
                        <td><a class="btn btn-outline-info" href="{{url('upload_solutions', [$todo->subject_id, $todo->as_id])}}" >Upload</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop