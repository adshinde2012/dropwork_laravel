@extends('base')

@section('content')

<div data-spy="scroll"  data-offset="0">
    <div class="main">

        <!-- Sign up form -->
        <div class="card shadow col-md-8 mx-auto my-5 bg-white border-light">
            <div class="row">
                <div class="col-md-6 mx-auto my-4 pl-5 ">
                    <figure><img src="/images/signup-image.jpg" style="height: 400px;" alt="sing up image"></figure>

                </div>
                <div class="col-md-6 mt-3">
                    <h2 class="form-title text-info my-4 ">Teacher Registration</h2>
                        <form method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group input-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name form-control border-white" style="color: #01adaa;"></i></label>
                                <input type="text" class="form-control border-info col-md-10 bg-white" name="firstname" id="firstname" placeholder="first name"/>
                            </div>
                            <div class="form-group input-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name form-control border-white" style="color: #01adaa;"></i></label>
                                <input type="text" class="form-control border-info col-md-10 bg-white" name="lastname" id="lastname" placeholder="last name"/>
                            </div>
                            <div class="form-group input-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name form-control border-white" style="color: #01adaa; "></i></label>
                                <input type="email" class="form-control border-info col-md-10 mr-4" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group input-group">
                                <label for="pass"><i class="zmdi zmdi-lock form-control border-white" style="color: #01adaa;"></i></label>
                                <input type="password" class="form-control border-info col-md-10" name="pass" id="pass" placeholder="Password"/>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="btn btn-info mt-2 mx-1" value="Register"/>
                            </div>
                        </form>
                        <a href="/teacher_login" class="text-info mx-1"><b>I am already member</b></a>

                </div>
                        
            </div>
        </div>
    </div>
    </div>

@stop