@extends('base2')

@section('content')

<div data-spy="scroll"  data-offset="0">

    <div class="card col-md-9 mx-auto my-3 bg-light">
    <img class="col-md-12 mx-auto my-3 bg-light img-responsive fit-image" src="/images/homework9.png">
    <h4 class="card-header text-center text-info border border-info my-2">Subject List</h4>
        <div class="card-body">
            
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Credit</th>
                        <th scope="col">Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $sub)
                    <tr>
                        
                        <td>{{$loop->iteration}}</th>
                        <td>{{$sub->sub_name}}</td>
                        <td>{{$sub->credit}}</td>
                        <td>{{$sub->first_name}} {{$sub->last_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@stop