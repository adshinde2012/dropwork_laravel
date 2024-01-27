@extends('teacher/base_teacher')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="card col-md-9 mx-auto my-3 bg-light">
        <img class="col-md-7 mx-auto my-3 bg-light img-responsive fit-image" src="/images/classmates2.png">
        <h4 class="card-header text-center text-info border border-info my-2">All Students</h4>
        <div class="card-body">
          
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($students as $st)
                  <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$st->roll_no}}</td>
                    <td>{{$st->first_name}}</td>
                    <td>{{$st->last_name}}</td>
                    <td>{{$st->email}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@stop


