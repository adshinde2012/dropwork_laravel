@extends('admin/base_admin')

@section('content')
<div id="layoutSidenav_content" >
        <main style = "width:100%; padding-left:70px; padding-right:25px; ">
           
                <h1 class="mt-4 mx-0">Teachers</h1>
            
            <div class=" card shadow mb-5 mt-3" style = "width:99%;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $teachers as $teach)
                            <tr>
                            <td>{{$teach->first_name}}</td>
                            <td>{{$teach->last_name}}</td>
                            <td>{{$teach->email}}</td>
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