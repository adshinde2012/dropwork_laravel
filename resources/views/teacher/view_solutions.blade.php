@extends('teacher/base_teacher')

@section('content')
<div data-spy="scroll"  data-offset="0">   

    <div class="card shadow-sm row mx-3" style="height: 220px;">
      <div class="mt-4 border border-white rounded" style="width: 25%;">

          <form class="register-form pl-3 pt-2" method="GET" style="margin-top: 30px;">
              <label class="form-group text-info" for="inputState"><b>Select Subject</b></label>
              <div class="form-group form-row">
                  <div class="form-group col-md-9">
              
                    <select class="form-control" id="subject" name = "subject">
                    @foreach ($subjects as $sub)
                        <option value="{{$sub->sub_id}}">{{$sub->sub_name}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group form-button">
                      <button type="submit" class="btn btn-info">Go</button>
                  </div>
          
              </div>    
          </form>
      </div>  
      <div class=" bg-white" style="width: 73%; height: 100%;">
          <img class="mx-auto bg-light img-responsive fit-image d-flex justify-content-center" style="height: 100%; width: 60%; " src="/images/homework8.png">
      </div>
    </div>


    @if (!$assigns->isEmpty())
    <div class="row content mx-auto" style="width: 100%">
        <div class="mx-2 mt-1" style="width: 20%">
          
            <div class="list-group my-1 ">
                <a href="#" class="list-group-item list-group-item-action bg-info text-white">
                    Assignments
                </a>
            </div>
            @foreach ($assigns as $assign)
            <div class="list-group">
                <a href="{{url('view_solutions', [$assign->subject_id, $assign->as_id] )}}" class="list-group-item list-group-item-action  my-1">
                    {{$assign->title}}
                </a>
            </div>
            @endforeach
        </div>

        @if ($solutions)
        <div class="shadow my-1 " style="width: 78%">
            @if ($solutions)
            <h4 class="card-header text-center text-info border border-info mb-2 mx-2 mt-2">Solutions for {{$assign_obj[0]->title}}</h4>
            @else 
            <h4 class="card-header text-center text-info border border-info mb-2 mx-2 mt-2">Solutions</h4>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success mt-1 mb-2 mx-2">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if (!$solutions->isEmpty())
            <table class="table mx-2" style="width:98.5%">
                <thead class="thead-light ">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Submit Date</th>
                    <th scope="col">Solution</th>
                    <th scope="col">Accept</th>
                    <th scope="col">Assign Marks</th>
                    <th scope="col">Total Points</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($solutions as $solu)
                    <tr>
                        <td>{{$solu->first_name}}</th>
                        <td>{{$solu->last_name}}</td>
                        <td>{{$solu->submit_date}}</td>
                        <td><a href= "{{asset('upload/'.$solu->ans_url)}}" role="button" class="btn btn-info">View</a></td>
                        @if ($solu->status)
                        <td><button type="button" class="btn btn-danger" disabled>Reject</button></td>
                        <td><button type="button" class="btn btn-success" disabled>Assigned</button> 
                        </td>
                        <td>{{$solu->points}}</td>
                        @else
                        <td><a href= "{{url('reject_solution', $solu->sol_id )}}" role="button" class="btn btn-danger">Reject</a></td>
                        <td> 
                          <form class="register-form" method="GET">
                          <div class="input-group form-group mb-0">
                            <input class="form-control" style="display: none;" id="solu_id" name="solu_id" value="{{$solu->sol_id}}">
                            <input type="number" min="0" max="{{$solu->points}}" class="form-control" name="marks" id="marks" required>
                            <div class="input-group-prepend form-group">
                              <button class="btn btn-success rounded" type="submit">Submit</button>
                            </div>
                          </div>
                          </td>
                          </form>
                        </td>
                        <td>{{$solu->points}}</td>
                        @endif
                        
                      </tr>
                      @endforeach
                </tbody>
                    
            </table>
            @else
            <div class="alert alert-danger mx-3" role="alert">
                No any solutions...
            </div>
            @endif

        </div>
        @endif

    </div>
    @endif

</div>

@stop