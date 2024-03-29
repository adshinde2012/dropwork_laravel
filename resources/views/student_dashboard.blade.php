@extends('base2')

@section('content')

<div data-spy="scroll"  data-offset="0">
        <!-- Image Slider-->
         <div class="card shadow col-md-11.5 mx-2 my-2 bg-white ">
         @foreach($student as $st)
        <a class="text-light mr-4" >Welcome, {{$st->first_name}} {{$st->last_name}}</a>
        @endforeach
           <div class="card col-md-8 mx-auto my-2 bg-white border-white">
           <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                 <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active" style="width: 10px; height: 10px; border-radius: 100%; background-color:#044736; margin-bottom: 20px;"></li>
                 <li data-target="#carouselExampleCaptions" data-slide-to="1" style="width: 10px; height: 10px; border-radius: 100%; background-color: #044736"></li>
                 <li data-target="#carouselExampleCaptions" data-slide-to="2" style="width: 10px; height: 10px; border-radius: 100%; background-color:#044736"></li>
               </ol>
               <div class="carousel-inner">
                 <div class="carousel-item active">
                   <img src="/images/home2.jpeg" class="d-block w-100 " style="height: 500px; opacity: 95%;" alt="{% static 'images/classmates2.png' %}">
                   <div class="carousel-caption d-none d-md-block ml-10" style ="position: absolute; top: 10%; transform: translateY(-10%);">
                     <h2 style="color: #044736 ;"><b>Submit Your Assignments</b></h2>
                     <p style="color: #044736;">Submit assignments in time will give you more score.</p>
                   </div>
                 </div>
                 <div class="carousel-item">
                   <img src="/images/homework8.png" class="d-block w-100" style="height: 500px; opacity: 95%;padding-top: 70px;padding-bottom: 40px;" alt="{% static 'images/classmates2.png' %}">
                   <div class="carousel-caption d-none d-md-block" style ="position: absolute; top: 10%; transform: translateY(-10%);">
                     <h2 style="color: #044736 ;"><b>Check Your Score</b></h2>
                     <p style="color: #044736 ;">Teacher will assign score for your assignments.</p>
                   </div>
                 </div>
                 <div class="carousel-item">
                   <img src="/images/teacher_work4.jpg" class="d-block w-100" style="height: 500px; opacity: 85%;" alt="{% static 'images/classmates2.png' %}">
                   <div class="carousel-caption d-none d-md-block" style ="position: absolute; top: 10%; transform: translateY(-10%);">
                     <h2 style="color: #044736 ;"><b>Third slide label</b></h2>
                     <p style="color: #044736 ;">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                   </div>
                 </div>
               </div>
               <a class="carousel-control-prev my-auto" style="background-color: #044736; width: 7%; height: 10%; " href="#carouselExampleCaptions" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next my-auto" style="background-color: #044736; width: 7%; height: 10%; " href="#carouselExampleCaptions" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a>
             </div>
           </div>
           </div>
       
         </div>

         <h3 class="card-header mt-3 text-center bg-white mx-auto border-white" style="color: #044736 ;width: 99%; ">My Subjects</h3>
         <div class="row mx-auto " style="width: 99%;" >
           @foreach ($subjects as $key => $value)
           <div class="shadow bg-white mt-3 mb-4 mx-auto rounded" style="width: 30%;">
                <h4 class="mt-3 text-center bg-white mx-auto " style="color: #044736 ;">{{$key}}</h4>
                <img src="/images/circle3.jpg" class="mx-auto d-flex justify-content-center" style = "width:50%; border-radius: 70%;"></img>
                
                <h4 class=" text-center bg-white mx-auto " style="color: #044736 ;">{{$value}} Assignments</h4>
           </div>
           @endforeach
           
         </div>
   
         <!-- contact us -->
         <div class="row mx-auto my-2 bg-info " style="width: 99%; " >
         
         <div class="col-md-5 mx-auto my-4 bg-info text-white">
           <h2 class="text-center  mb-3">Contact Us</h2>
           <p class=" text-white">We're very approachable and would love to speak to you. 
                     Feel free to call, send us an email, Tweet us or simply complete the enquiry form.</p>
           
           <div class="row">
             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-open-fill mt-1 mx-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/>
             </svg>
             <p >dropwork.submit@gmail.com</p>
           </div>
           <div class="row">
             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill mt-1 mx-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
             </svg>
             <p >+91 8140763107</p>
           </div>
           <p >Supported By : </p>
           <div class="row">
             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person-fill mt-1 mx-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
             </svg>
             <p >Hiren Trivedi</p>
             <p class="ml-5">Sandeep Rathod</p>
             <p class="ml-5">Aniket Shinde</p>
           </div>
         </div>
         <!-- have any question? -->
         <div class="col-md-5 mx-auto my-4 bg-info">
           <h2 class="text-center text-white" >Have Any Question?</h2>
           <form class="mt-3 ml-2">
             <div class="row ">
               <div class="form-group col-md-6">
                 <label class="text-white" for="inputEmail4">Full Name</label>
                 <input type="text" class="form-control" id="inputEmail4" placeholder="your name">
               </div>
               <div class="form-group col-md-6">
                 <label class="text-white" for="inputEmail4">Email</label>
                 <input type="email" class="form-control" id="inputEmail4" placeholder="email">
               </div>
             </div>
             <div class="form-group">
               <label class="text-white" for="inputAddress">Question</label>
               <input type="text" class="form-control" id="inputAddress" placeholder="write your question">
             </div>
             <button type="submit" class="btn btn-outline-light mt-3">Send Message</button>
           </form>
         </div>
           
         </div>
@stop