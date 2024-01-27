@extends('base2')

@section('content')
<div data-spy="scroll"  data-offset="0">   
    
<div class="container-fluid">
    <div class="row content">
      <div class="col-lg-2">
    
        <div class="list-group my-1">
            <a href="#" class="list-group-item list-group-item-action bg-info text-white" style="font-size: large;">
                Subjects
            </a>
        </div>
        @foreach ($subjects as $sub)
            
            <div class="list-group">
                <a href="{{url('upload_solutions', $sub->sub_id)}}" class="list-group-item list-group-item-action my-1">
                    {{$sub->sub_name}}
                </a>
            </div>
        @endforeach
      </div>
  
      <div class="col-lg-10">
        <h4 class="card-header text-center text-info border border-info mb-2 mt-1">Upload Solution</h4>
        @if(session()->has('message'))
            <div class="alert alert-success mt-1 mb-1">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table  mt-2 mb-2">
            <thead class="thead-light">
              <tr>
                <th scope="col">Sr</th>
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
            
            @foreach ($assignments as $assign)

            @if (in_array($assign->as_id, $solu_status))

            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$assign->title}}</td>
                <td>{{$assign->description}}</td>
                <td>{{$assign->sub_name}}</td>
                <td>{{$assign->end_date}}</td>
                <td>{{$assign->points}}</td>
                <td><a href="{{ asset('upload/'.$assign->file_url) }}" class="btn btn-outline-secondary" disabled>View</a></td>
                <td>
                  <button type="button" class="btn btn-success px-4" disabled>Done</button>
                </td>
            </tr>
              
            @elseif (in_array($assign->as_id , $solu_ids))

            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$assign->title}}</td>
                <td>{{$assign->description}}</td>
                <td>{{$assign->sub_name}}</td>
                <td>{{$assign->end_date}}</td>
                <td>{{$assign->points}}</td>
                <td><a href="{{ asset('upload/'.$assign->file_url) }}" class="btn btn-outline-secondary" disabled>View</a></td>
                <td>
                  <button type="button" class="btn btn-info" disabled>Uploaded</button>
                </td>
              </tr>

            @else
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$assign->title}}</td>
                <td>{{$assign->description}}</td>
                <td>{{$assign->sub_name}}</td>
                <td>{{$assign->end_date}}</td>
                <td>{{$assign->points}}</td>
                <td><a href="{{ asset('upload/'.$assign->file_url) }}" class="btn btn-outline-secondary" disabled>View</a></td>
                <td>
                  <a class="btn btn-outline-info" href="{{url('upload_solutions', [$assign->subject_id, $assign->as_id])}}" >Upload</a>
                </td>
              </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        
        @if($assign_id) 
        <div id="myDIV">
          <div class="col-sm-7 mx-auto my-3 border border-info rounded">
      
            <form class="register-form px-3 py-2" method="POST" enctype="multipart/form-data">
              @csrf
              
              <div class="form-group">
                <label for="inputState" class="text-info mt-2"><b><h5>Solution for {{$assign_id[0]->title}}</h5></b></label>
                
              </div>
              <label for="file" class="text-info"><b>File</b></label>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file_url" name="file_url"  required>
                  <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
        
                </div>
              </div>
              <div class="form-group form-button">
                <button type="submit" class="btn btn-info my-1">Upload</button>
              </div>
            </form>
      
          </div>
        </div>
        @endif
        
      </div>

    </div>
  </div>
</div>

  <script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display == "none"){
        x.style.display = "block";
      }
    }
      $('#uploadfile').on('change',function(){
          //get the file name
          var fileName = $(this).val();
          //replace the "Choose a file" label
          $(this).next('.custom-file-label').html(fileName);
      })
  </script>

@stop
