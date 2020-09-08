<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap Template</title>

    <!-- Font Awesome -->
   <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.0/css/all.css')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">

    <style>

  
  </style>

</head>

<body>

  <!--Main Navigation-->
  <header>

 <!--Navbar-->
    <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="{{route('home')}}"> Return Home</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
   

  

  </header>
 <main>
 <div class="container">

      <!--Section: Features v.1-->
      <section id="features" class="mb-5 mt-5">

 <div class="row">       
           @foreach($experts as $expert)
                <!--Grid column-->
                <div class="col-md-4 clearfix d-none d-md-block mt-5 ">
                  <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto pl-5">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg"
                        class="rounded-circle img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold mt-4 text-center">{{$expert->name}}</h4>
                    <h4 class=" font-weight-bold my-3 text-center">{{$expert->job}}</h4>
                     <h4 class=" font-weight-bold my-3 text-center">{{$expert->country}}</h4>
                    <h6 class=" blue-text font-weight-bold mt-4 text-center">working time : 
                      {{$expert->start_time}} => {{$expert->end_time}} </h6>
                   
                    <!--Review-->
                    <div class="text-center">
                       <a type="button" class="btn btn-info" href="{{url('book')}}/{{$expert->id}}">Book Now</a>
                    </div>
                  </div>
                </div>
                <!--Grid column-->
@endforeach

              </div>
 
</main>
 


</section>

 

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <!-- Tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

    

</body>

</html>
