@extends('base2')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="card col-md-9 mx-auto my-3 bg-light">
        <img class="col-md-7 mx-auto my-3 bg-light img-responsive fit-image" src="images/classmates2.png">
        <h4 class="card-header text-center text-info border border-info my-2">My Classmates</h4>
        <div class="card-body">
          
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($classmates as $cm)
                <tr>
                    <td>{{$loop->iteration}}</th>
                    <td>{{$cm->first_name}}</td>
                    <td>{{$cm->last_name}}</td>
                    <td>{{$cm->email}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop