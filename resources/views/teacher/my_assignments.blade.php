@extends('teacher/base_teacher')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="shadow col-sm-4 mx-2 my-2 border border-info rounded" style="width: 30%;">

    <form class="register-form mt-2" method="GET">
        
        <label class="form-group text-info" for="inputState"><b>Select Subject</b></label>
        <div class="form-group form-row">
            <div class="form-group col-md-9">
        
            <select class="form-control" id="subject" name = "subject">
            @foreach ($subjects as $sub)
                <option value="{{$sub->sub_id}}">{{$sub->sub_name}} ({{$sub->name}} - {{$sub->sems}})</option>
            @endforeach
            </select>
            </div>
            <div class="form-group form-button col-md-3">
                <button type="submit" class="btn btn-info" style="width: 60px;">Go</button>
            </div>

        </div>    
    </form>
    @if($assignments)
    </div>
    <div class="card shadow mx-auto my-3 bg-white border-white" style="width:99%">
        
        <h4 class="card-header text-center text-info border border-info mt-2 mx-2">Assignments</h4>
        @if(session()->has('message'))
            <div class="alert alert-success mt-2 mx-2">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="mt-2 mx-2">
            
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">File</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Points</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($assignments as $assign)
                    <tr>
                        
                        <td>{{$loop->iteration}}</th>
                        <td>{{$assign->title}}</td>
                        <td>{{$assign->description}}</td>
                        <td><a href= "{{asset('upload/'.$assign->file_url)}}" role="button" class="btn btn-info">View</a></td>
                        <td>{{$assign->end_date}}</td>
                        <td>{{$assign->points}}</td>
                        <td><a href="{{url('my_assignments', [$assign->as_id] )}}" style="color:#CF1E05;"><svg width="2em" height="1.6em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    
</div>

@stop