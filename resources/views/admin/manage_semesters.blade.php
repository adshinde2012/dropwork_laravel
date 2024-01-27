@extends('admin/base_admin')

@section('content')
<div id="layoutSidenav_content" >
        <main style = "width:100%; padding-left:70px; padding-right:25px; ">
           
                <h1 class="mt-4 mx-0">Semesters</h1>

            <button type="button" onclick="myFunction()" class="btn btn-outline-dark my-2">Add new semester</button>
            
            <div class="row">
                <div class="mx-2 card shadow mb-5" style = "width:48.5%;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" class="text-center">Semester</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $semesters as $sem)
                            <tr>
                            <td class="text-center">{{$sem->sems}}</td>
                            <td><a class="btn btn-outline-success" href="{{url('manage_semesters', $sem->sem_id)}}" role="button">Edit</a>
                            <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href="{{url('manage_semesters', [0, $sem->sem_id] )}}" role="button">Delete</a></td>
                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="myDIV" class="card shadow mx-2 "  style = "width:48%; display: none;  height:220px">
                <h4 class="card-header text-center bg-dark text-white">Add new semester</h4>
                    <form method="POST" action="/manage_semesters" class="register-form my-2 mx-2" id="login-form">
                            @csrf
                            
                            <div class="form-group">
                                
                                <label for="email" class="text-dark"><b>Semester</b></label>
                                <input type="number" max="10" min="0" class="form-control border-dark col-md-10" name="sem" id="sem" placeholder="Enter semester" required/>
                                
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="btn btn-dark" value="Add"/>
                            </div>
                    </form>
                </div>
                @if($sem_obj)
                <div id="editDiv" class="card shadow mx-2 "  style = "width:48%; height:220px">
                <h4 class="card-header text-center bg-dark text-white">Edit Course</h4>
                    <form method="POST" action="/manage_semesters" class="register-form my-2 mx-2" id="login-form">
                            @csrf
                            
                            <div class="form-group">
                                
                                <label for="email" class="text-dark"><b>Course Name</b></label>
                                <input type="number" max="10" min="0" class="form-control border-dark col-md-10" name="new_sem" id="new_sem" value = "{{$sem_obj->sems}}" required/>
                                
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="btn btn-dark" value="Save Changes"/>
                                <a class="btn btn-secondary text-white"  role="button" onclick = "close_edit()">Close</a>
                            </div>
                            <input class="form-control" style="display: none;" id="sem_id" name="sem_id" value="{{$sem_obj->sem_id}}">
                    </form>
                </div>
                @endif
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
    </script>

@stop