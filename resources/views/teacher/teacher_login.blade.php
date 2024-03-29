@extends('base')

@section('content')

    <div class="main ">

        <!-- Sing in  Form -->
        <div class="card shadow col-md-8 mx-auto my-5 bg-white border-light" style="height: 450px;">
            <div class="row">
                <div class="col-md-5 mx-auto my-4">
                    <figure><img src="/images/signin-image.jpg" style="height: 400px;" alt="sing up image"></figure>
                    
                </div>
                <div class="signin-image col-md-6 my-4">
                    
                        <h2 class="form-title text-info my-4">Teacher Log In</h2>
                        <form method="POST" action="/teacher_login" class="register-form" id="login-form">
                            @csrf
                            @if(isset($error))
                                <label for="email" class="text-danger">{{$error}}</label>
                           
                            @endif
                            <div class="form-group">
                                
                                <label for="email" class="text-info">Email</label>
                                <input type="email" class="form-control border-info col-md-10" name="email" id="email" placeholder="Enter your email" required/>
                                
                            </div>
                            <div class="form-group">
                                <label for="your_pass" class="text-info">Password</label>
                                <input type="password" class="form-control border-info col-md-10" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span><span></span></span>Forgot Password?</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="btn btn-info" value="Log in"/>
                            </div>
                            <a href="/register" class="text-info"><b>Create an account</b></a>
                        </form>
                        
                    
                </div>

            </div>
        </div>

    </div>
@stop
