<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Required meta tags always come first  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap Template</title>
    <!--  Font Awesome  -->
  
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link href="{{asset('css/bootstrap.min.css.map')}}" rel="stylesheet">
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
      <section id="features" class="mb-5 mt-5 pt-5 ">
 <form  method="post"  action="{{ route('store') }}">
   {{csrf_field()}}

  <div class="md-form">
  <input placeholder="Selected date" type="text" name="day" id="date-picker-example" class="form-control datepicker" required="" >
  <label for="date-picker-example"></label>
</div>
 <select class="browser-default custom-select" name="duration" id="duration" required>
    <option value="">Select Duration</option>
    @foreach ($durations as $duration) 
        <option value="{{$duration->id}}">
         {{$duration->duration}}
        </option>
    @endforeach
</select>
 
<select class="browser-default custom-select mt-3"  id="slot" required>
</select>
 

<p><input type="hidden" id="test3" name="slot" value="Mickey Mouse"></p>

  <button type="submit" class="btn btn-primary mt-3">Book</button>
</form>
   @if (Session::has('appointment'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h6 class="alert-heading"> Your Appointment will be on <p>{{ Session::get('appointment')->day }}</p> from  {{ Session::get('appointment')->time }} </h6>
         

        <button type="button" class="close" data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

@if ($errors->has('day'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('day') }}</strong>
                      </span>
                      @endif

</section>
</div>
</main>
   <input type="hidden" id="expert" name="expert" value="{{$expert->id}}">

   

    <!--  SCRIPTS  -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    


      

   
    </script>
<script type="text/javascript">
    $('.datepicker').pickadate({
// `true` defaults to 10.
selectYears: 4
})
       
   </script>
   <script>
        $('#duration').change(function(){
    var cid = $(this).val();
    if(cid){
    $.ajax({
       type:"get",
       url:"{{url('/slot')}}/"+cid ,

       success:function(res)
       {      
            if(res)
            {
                $("#slot").empty();

                $("#slot").append('<option>Select Slot</option>');
                $.each(res,function(key,value){
                    $("#slot").append('<option  value="'+key+'">'+value+'</option>');
                });
            }
       }
 
    });
    }
});
$('#state').change(function(){
    var sid = $(this).val();
    if(sid){
    $.ajax({
       type:"get",
       url:"{{url('/city')}}/"+sid, 
       success:function(res)
       {       
            if(res)
            {
                $("#city").empty();
                $("#city").append('<option>Select City</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
       }
 
    });
    }
}); 
   </script>

   <script >
     $('#slot').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    $("#test3").val($option.text());
    //Added with the EDIT
    var value = $option.val();//to get content of "value" attrib
    var text = $option.text();//to get <option>Text</option> content
});
   </script>

</body>
</html>
