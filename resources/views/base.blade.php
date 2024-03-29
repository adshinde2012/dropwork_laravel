
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropwork - Sign Up</title>

    <!-- Font Icon -->
    
    <link rel="stylesheet" type="text/css" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
    <style>
    .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
    </style>
    <!-- Main css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
    <body>
        <div data-spy="scroll"  data-offset="0" >
            <nav class="navbar navbar-expand-lg navbar-dark bg-info mx-2 my-2" style="font-size: large;">
            <!-- <img src="/images/logo3.jpeg" style="height: 70px;"> -->
              <a class="navbar-brand" href="#">Dropwork</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav mr-auto ">
                  <li class="nav-item active">
                    <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#">Contact Us</a>
                  </li>
                
                </ul>
                  
                <ul class="navbar-nav ml-3">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Login
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                      <a class="dropdown-item " href="/student_login">Login as Student</a>
                      <a class="dropdown-item" href="/teacher_login">Login As Teacher</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Register
                    </a>
                    <div class="dropdown-menu dropdown-menu-left" style="right: 0;left: auto; padding-left: 1px; padding-right: 1px;" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item " href="/register">Register as Student</a>
                      <a class="dropdown-item" href="/teacher_registration">Register As Teacher</a>
                    </div>
                  </li>
                </ul>
                
              </div>
            </div>

            
          </div>
        @yield('content')
        

        <!-- JS -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/static 'js/main.js"></script>
    </body>
</html>
