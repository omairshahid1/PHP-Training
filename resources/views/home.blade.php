@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
            <div class="col-md-12">  
                <chat-application v-bind:id="{{ Auth::user()->id }}"></chat-application> 
            </div>
</div>

@endsection
<script>
            window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
    </script>
    <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    <script src="{{ url('/public/js/laravel-echo-setup.js') }}" type="text/javascript"></script> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
<script>
$(document).ready(function(){
    
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".tbody .author").filter(function() {  
      $(this).parents('tr').toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#myInput2").on("keyup", function() { 
    var value = $(this).val().toLowerCase();
    $(".tbody .category").filter(function() { 
      $(this).parents('tr').toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });  

$('[name="book"]').change(function(){
   var _id = $(this).val();
   var _read = 0;  
   if($(this).is(':checked') == true){ 
     _read = 1;
   }

   var token =  $('[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': token
       }
    });
   $.ajax({
  url: "/markread",
  method: "POST",
  data:"id="+_id+"&read="+_read,
  success: function(html){
   console.log(html);
  },
  error: function(err){
    console.log(err);
  }
  });

})


$('[name="author"]').change(function(){
   var _id = $(this).val();
   var _fav = 0;  
   if($(this).is(':checked') == true){ 
    _fav = 1;
   }

   var token =  $('[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': token 
       }
    });
   $.ajax({
  url: "/markfav",
  method: "POST",
  data:"id="+_id+"&fav="+_fav,
  success: function(html){
   console.log(html);
  },
  error: function(err){
    console.log(err);
  }
  });

})


}); 
</script>
