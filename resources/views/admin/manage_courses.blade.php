@extends('admin/base_admin')

@section('content')

    <div id="layoutSidenav_content" >
        <main style = "width:100%; padding-left:70px; padding-right:25px; ">
           
                <h1 class="mt-4 mx-0">Courses</h1>

            <button type="button" onclick="myFunction()" class="btn btn-outline-dark my-2">Add new course</button>
            
            <div class="row">
                <div class="mx-2 card shadow" style = "width:48.5%;">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $courses as $course)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td id="course_name">{{$course->name}}</td>
                            <td><a class="btn btn-outline-success" href="{{url('manage_courses', $course->c_id)}}" role="button">Edit</a>
                            <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href="{{url('manage_courses', [0, $course->c_id] )}}" role="button">Delete</a></td>
                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="myDIV" class="card shadow mx-2 "  style = "width:48%; display: none;">
                <h4 class="card-header text-center bg-dark text-white">Add new course</h4>
                    <form method="POST" action="/manage_courses" class="register-form my-2 mx-2" id="login-form">
                            @csrf
                            
                            <div class="form-group">
                                
                                <label for="email" class="text-dark"><b>Course Name</b></label>
                                <input type="text" class="form-control border-dark col-md-10" name="course_name" id="edit_course_name" placeholder="Enter Course name for example MCA" required/>
                                
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="btn btn-dark" value="Add"/>
                            </div>
                    </form>
                </div>
                @if($course_obj)
                <div id="editDiv" class="card shadow mx-2 "  style = "width:48%; height:220px">
                <h4 class="card-header text-center bg-dark text-white">Edit Course</h4>
                    <form method="POST" action="/manage_courses" class="register-form my-2 mx-2" id="login-form">
                            @csrf
                            
                            <div class="form-group">
                                
                                <label for="email" class="text-dark"><b>Course Name</b></label>
                                <input type="text" class="form-control border-dark col-md-10" name="new_course_name" id="new_course_name" value = "{{$course_obj->name}}" required/>
                                
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="btn btn-dark" value="Save Changes"/>
                            </div>
                            <input class="form-control" style="display: none;" id="course_id" name="course_id" value="{{$course_obj->c_id}}">
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
    </script>


@stop