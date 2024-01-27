@extends('admin/base_admin')

@section('content')
<div id="layoutSidenav_content" >
        <main style = "width:100%; padding-left:70px; padding-right:25px; ">
           
                <h1 class="mt-4 mx-0">Assignments</h1>
            
            <div class=" card shadow mb-5 mt-3" style = "width:99%;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">File</th>
                            <th scope="col">Points</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Course</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $assignments as $assign)
                            <tr>
                            <td>{{$assign->as_id}}</td>
                            <td>{{$assign->title}}</td>
                            <td>{{$assign->description}}</td>
                            <td>{{$assign->file_url}}</td>
                            <td>{{$assign->points}}</td>
                            <td>{{$assign->sub_name}}</td>
                            <td>{{$assign->first_name}} {{$assign->last_name}}</td>
                            <td>{{$assign->name}} {{$assign->sems}}</td>

                        @endforeach
                        </tbody>
                    </table>
                </div>
        </main>
    </div>

    <script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function close_edit() {
        var x = document.getElementById("editDiv");
        x.style.display = "none";
    }
    function close_add() {
        var x = document.getElementById("myDIV");
        x.style.display = "none";
    }
    </script>

@stop