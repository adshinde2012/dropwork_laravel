@extends('admin/base_admin')

@section('content')
<div id="layoutSidenav_content" >
        <main style = "width:100%; padding-left:70px; padding-right:25px; ">
           
                <h1 class="mt-4 mx-0">Subjects</h1>

            <button type="button" onclick="myFunction()" class="btn btn-outline-dark my-2">Add new subject</button>
            
            <div class="row">
                
                <div id="myDIV" class="card shadow mx-2 mb-4 mt-2"  style = "width:60%; display: none;">
                <h4 class="card-header text-center bg-dark text-white">Add new subject</h4>
                    <form method="POST" action="/manage_subjects" class="register-form my-2 mx-2" id="login-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-5 ml-4">
                                    <label for="email" class="text-dark"><b>Subject Name</b></label>
                                    <input type="text" class="form-control border-dark" name="sub_name" id="sub_name" placeholder="Enter subject name" required/>
                                </div>
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Credit</b></label>
                                    <input type="number" max="10" min="0"  class="form-control border-dark" name="credit" id="credit" placeholder="Enter subject credit" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Course</b></label>
                                    <select class="form-control border-dark" id="course" name = "course"  required>
                                        @foreach ($courses as $course)
                                            <option value="{{$course->c_id}}">{{$course->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Semester</b></label>
                                    <select class="form-control border-dark" id="sem" name = "sem"  required>
                                        @foreach ($sems as $sem)
                                            <option value="{{$sem->sem_id}}">{{$sem->sems}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Assign Teacher</b></label>
                                    <select class="form-control border-dark" id="assign_teacher" name = "assign_teacher"  required>
                                        @foreach ($teachers as $teach)
                                            <option value="{{$teach->t_id}}">{{$teach->first_name}} {{$teach->last_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-button ml-3 col-md-8">
                                <input type="submit" name="signin" id="signin" class="btn btn-dark col-md-3" value="Add"/>
                                <a class="btn btn-secondary text-white col-md-3 ml-4"  role="button" onclick = "close_add()">Close</a>
                            </div>
                    </form>
                </div>
                @if($sub_obj)
                <div id="editDiv" class="card shadow mx-2 "  style = "width:48%;">
                <h4 class="card-header text-center bg-dark text-white">Edit Subject</h4>
                    <form method="POST" action="/manage_subjects" class="register-form my-2 mx-2" id="login-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-5 ml-4">
                                    <label for="email" class="text-dark"><b>Subject Name</b></label>
                                    <input type="text" class="form-control border-dark" name="new_sub_name" id="new_sub_name" value="{{$sub_obj[0]->sub_name}}" required/>
                                </div>
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Credit</b></label>
                                    <input type="number" max="10" min="0"  class="form-control border-dark" name="new_credit" id="new_credit" value="{{$sub_obj[0]->credit}}" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Course</b></label>
                                    <select class="form-control border-dark" id="new_course" name = "new_course" required>
                                        @foreach ($courses as $course)
                                            <option value="{{$course->c_id}}">{{$course->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Semester</b></label>
                                    <select class="form-control border-dark" id="new_sem" name = "new_sem" required>
                                        @foreach ($sems as $sem)
                                            <option value="{{$sem->sem_id}}">{{$sem->sems}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 ml-4">
                                    <label for="number" class="text-dark"><b>Assign Teacher</b></label>
                                    <select class="form-control border-dark" id="new_assign_teacher" name = "new_assign_teacher"  required>
                                        @foreach ($teachers as $teach)
                                            <option value="{{$teach->t_id}}">{{$teach->first_name}} {{$teach->last_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-button ml-3 col-md-8">
                                <input type="submit" name="signin" id="signin" class="btn btn-dark " value="Save Changes"/>
                                <a class="btn btn-secondary text-white col-md-3 ml-4"  role="button" onclick = "close_edit()">Close</a>
                            </div>
                            <input class="form-control" style="display: none;" id="sub_id" name="sub_id" value="{{$sub_obj[0]->sub_id}}">
                    </form>
                </div>
                @endif
            </div>
            <div class=" card shadow mb-5 mt-3" style = "width:99%;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Course</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $subjects as $sub)
                            <tr>
                            <td>{{$sub->sub_name}}</td>
                            <td>{{$sub->credit}}</td>
                            <td>{{$sub->name}}</td>
                            <td>{{$sub->sems}}</td>
                            <td>{{$sub->first_name}} {{$sub->last_name}}</td>
                            <td><a class="btn btn-outline-success" href="{{url('manage_subjects', $sub->sub_id)}}" role="button">Edit</a>
                            <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href="{{url('manage_subjects', [0, $sub->sub_id] )}}" role="button">Delete</a></td>
                             
                            </tr>
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