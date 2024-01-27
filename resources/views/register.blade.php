@extends('base')

@section('content')

    <div data-spy="scroll"  data-offset="0">
        <div class="main">

            <!-- Sign up form -->
            <div class="card col-md-8 mx-auto my-5 bg-white border-light" style="height: 600px;">
                <div class="row">
                    <div class="col-md-6 mx-auto my-4">
                        <figure><img src="/images/signup-image.jpg" style="height: 400px;" alt="sing up image"></figure>

                    </div>
                    <div class="signin-image col-md-6">
                        <h2 class="form-title text-info my-4 " style="margin-left:35px;">Registration</h2>
                            <form method="POST" class="register-form" id="register-form">
                                @csrf
                                <div class="form-group input-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name form-control border-white" style="color: #01adaa;"></i></label>
                                    <input type="text" class="form-control border-info col-md-10 bg-white" name="firstname" id="firstname" placeholder="First Name" required/>
                                </div>
                                <div class="form-group input-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name form-control border-white" style="color: #01adaa;"></i></label>
                                    <input type="text" class="form-control border-info col-md-10" name="lastname" id="lastname" placeholder="Last Name" required/>
                                </div>
                                <div class="form-group input-group">
                                    <label for="email"><i class="zmdi zmdi-email material-icons-name form-control border-white" style="color: #01adaa; "></i></label>
                                    <input type="email" class="form-control border-info col-md-10 mr-4" name="email" id="email" placeholder="Your Email" required/>
                                </div>
                                <div class="form-group input-group">
                                    <label for="pass"><i class="zmdi zmdi-lock form-control border-white" style="color: #01adaa;"></i></label>
                                    <input type="password" class="form-control border-info col-md-10" name="pass" id="pass" placeholder="Password" required/>
                                </div>

                                <div class="form-group row ml-4">
                                    <div class="form-group col-md-5">
                                        <label for="name" class="mb-1" style="color: #01adaa;"><b>Course</b></label>
                                        <select name="courses" id="courses" class="form-control border-info " required>
                                            @foreach($courses as $course) 
                                                <option value="{{$course -> c_id}}">{{$course -> name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="name" class="mb-1" style="color: #01adaa;" ><b>Semester </b></label>
                                        <select name="sem" id="sem" class="form-control border-info " required>
                                            @foreach($semesters as $sem) 
                                                <option value="{{$sem -> sem_id}}">{{$sem -> sems}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group input-group mt-4">
                                    <label for="name" class="form-control col-md-1 border-white" style="color: #01adaa;">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-medical-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                        </svg>
                                    </label>
                                    <input type="text" class="form-control border-info col-md-10 ml-1" name="rollno" id="rollno" placeholder="Roll Number" pattern="[0-9]*"  maxlength="3" required oninvalid="this.setCustomValidity('Please enter roll number')"/>
                                </div>
                                
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="btn btn-info mt-2" style="margin-left:35px;" value="Register"/>
                                </div>
                            </form>
                            <a href="#" class="text-info" style="margin-left:35px;"><b>I am already member</b></a>

                    </div>
                            
                </div>
            </div>
        </div>
    </div>
@stop