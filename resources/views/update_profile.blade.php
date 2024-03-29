@extends('base2')

@section('content')

    <div data-spy="scroll"  data-offset="0">
    <div class="main">

        <!-- Sign up form -->
        <div class="card shadow-sm col-md-8 mx-auto my-3 border-light" style="background-color: #f7f7f7;">
            <div class="col-md-6 mx-auto my-1">
                <figure><img src="/images/profile3.png" class="col-md-12 mx-auto my-3 img-responsive fit-image" style="background-color: #f7f7f7;"  alt="sing up image"></figure>
                
            </div>
            <div class="col-md-12 mx-auto my-1">
                <h4 class="card-header text-center text-info border border-info my-2">My Profile</h4>
            </div>
              
            <div class="signin-image col-md-12 mx-auto">
                <div>
                    <a class="btn btn-outline-info ml-3 my-2" role="button" onclick="myFunction()" >Click here to Update Profile</a>
                    <a class="btn btn-outline-secondary ml-3 my-2" role="button" href="/update_profile" >Cancel</a>
                    <a class="btn btn-outline-info my-2" role="button" style="margin-left: 336px;">Change Password</a>
                
                </div>
                
                    <form method="POST" class="register-form col-md-12 my-2" id="register-form">
                        @csrf
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="my-1" style="color: #01adaa;"><b>First Name</b></label>
                            <input disabled required type="text" class="form-control border-info " name="firstname" id="firstname" value="{{$student[0]->first_name}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="my-1" style="color: #01adaa;"><b>Last Name</b></label>
                            <input disabled required type="text" class="form-control border-info " name="lastname" id="lastname" value="{{$student[0]->last_name}}"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="my-1" style="color: #01adaa;"><b>Email</b></label>
                            <input disabled required type="email" class="form-control border-info " name="email" id="email" value="{{$student[0]->email}}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="my-1" style="color: #01adaa;" ><b>Password</b></label>
                            <input disabled type="password" class="form-control border-info " name="pass" id="pass" value="{{$student[0]->password}}"/>
                        </div>
                        </div>
                        

                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label for="name" class="my-1" style="color: #01adaa;"><b>Roll No</b></label>
                                <input disabled required type="number" class="form-control border-info " name="roll_no" id="roll_no" value="{{$student[0]->roll_no}}"/>
                            </div>
                        
                        </div>
                        <div class="form-group form-button">
                            <input disabled type="submit" name="signup" id="update" class="btn btn-info mt-2 mx-auto" value="Save Changes"/>
                        </div>
            </div>
            
                        
            
        </div>
    </div>
    </div>

    <script>
        function myFunction() {
            document.getElementById("firstname").disabled = false; 
            document.getElementById("lastname").disabled = false; 
            document.getElementById("courses").disabled = false; 
            document.getElementById("roll_no").disabled = false; 
            document.getElementById("email").disabled = false; 
            document.getElementById("update").disabled = false; 
          
        }
      </script>

@stop