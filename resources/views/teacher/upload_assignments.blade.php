@extends('teacher/base_teacher')

@section('content')

<div data-spy="scroll"  data-offset="0">

    
<div class="col-sm-11.7 mx-3 my-2">
  <div class="row content">
    <div class="mx-2" style="width: 23%;">
  
        <div class="list-group my-2">
            <a href="#" class="list-group-item list-group-item-action bg-info text-white">
                My  Subjects
            </a>
        </div>
        @foreach ($subjects as $sub)
        
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action  my-1">
                {{$sub->sub_name}}
            </a>
        </div>
        @endforeach

    </div>
    <div class="shadow mx-2 my-2 border-white bg-white rounded" style="width: 74%;">
      <h4 class="card-header text-center text-info border border-info mt-2 mx-2">Upload Assignment</h4>
      @if(session()->has('message'))
            <div class="alert alert-success mt-2 mx-2">
                {{ session()->get('message') }}
            </div>
      @endif
      <form class="register-form px-3 py-3" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="inputAddress" class="text-info"><b>Assignment Title</b></label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
          <label for="inputAddress2" class="text-info"><b>Description</b></label>
          <input type="text" class="form-control" id="description" name = "description" required>
        </div>
        <div class="form-group form-row my-0">
          <div class="form-group col-md-6">
              <label for="startDate" class="text-info"><b>Start Date</b></label>
              <input type="datetime-local" class="form-control" id="startDate" name = "startDate"  required/>
          </div>
         
          <div class="form-group col-md-6">
            <label for="startDate" class="text-info"><b>End Date</b></label>
            <input type="datetime-local" class="form-control" id="endDate" name = "endDate"  required/>
          </div>
          
        </div>
        <div class="form-group form-row my-0">
          <div class="form-group col-md-6">
            <label for="inputState" class="text-info"><b>Subject</b></label>
            <select class="form-control" id="subject" name = "subject"  required>
                @foreach ($subjects as $sub)
                    <option value="{{$sub->sub_id}}">{{$sub->sub_name}} </option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState" class="text-info"><b>Total Points</b></label>
            <input type="number" max="100" min="0" class="form-control" id="points" name = "points"  required/>
          </div>
        </div>
        <label for="file" class="text-info"><b>File</b></label>
        <div class="form-group">
          <div class="custom-file">
           <input type="file" class="custom-file-input" id="file_url" name="file_url"  required>
           <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
        </div>
        <div class="form-group form-button">
          <button type="submit" class="btn btn-info my-3">Upload</button>
        </div>
      </form>

    </div>
    
</div>   
</div>

@stop