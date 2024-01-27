@extends('admin/base_admin')

@section('content')
<div id="layoutSidenav_content" >
        <main style = "width:100%; padding-left:70px; padding-right:25px; ">
           
                <h1 class="mt-4 mx-0">Solutions</h1>
            
            <div class=" card shadow mb-5 mt-3" style = "width:99%;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Ans File</th>
                            <th scope="col">Submit Date</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $solutions as $solu)
                            <tr>
                            <td>{{$solu->sol_id}}</td>
                            <td>{{$solu->student_id}}</td>
                            <td>{{$solu->subject_id}}</td>
                            <td>{{$solu->ans_url}}</td>
                            <td>{{$solu->submit_date}}</td>
                            <td>{{$solu->marks}}</td>
                            <td>{{$solu->status}}</td>

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