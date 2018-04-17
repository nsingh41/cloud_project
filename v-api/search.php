<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
	 <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
      
</head>
<body class="body-background-1">

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><h1>Brain Pop App </h1></a>

 <ul class="navbar-nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Upload Images</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="search.php">Search Images</a>
    </li>
    
  </ul>
</nav> 
<div class="container-fluid" style="">
<!-- <h3 style="text-align: center;">Image Upload To Google DataBase</h3> -->
<div class="row" >
<div class="col-sm-12 position" id="position" >

<div class="card bg-light text-dark" >
    <div class="card-body">
     <h3 style="text-align:center">Search Image</h3>
  <div class="form-group" >
   
    <input type="text" class="form-control" id="search" name="search">

  </div>
  	
<p style="text-align: center;" id="searching">Searching Image!</p>
<div class="loader" ></div>
<!-- <p style="text-align: center;" id="uploaded">Image Uploaded!</p> -->
    </div>
  </div>
  </div>
  </div>
  <div class="row" id="results" >
    <div class="container">
    <h3 style="text-align: center;">Search Results</h3>

    <hr>
<div class="row card" id="data">


</div>


    </div>


  </div>

  </div>
  <div class="footer">
 <p>Google Vision API</p>
  </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
  $("#searching").hide();
$(".loader").hide();

$("#data").hide();
$("#data-2").hide();

function get_images(){
$.ajax({
  url:'fetch_images.php',
  dataType:'json',
  success:function(res){
     $("#data").show();
     $("#data").html('');
    // var obj = jQuery.parseJSON(res);
    $.each(res.img, function(key,value){
      
       
      $("#data").append('<div class="col-md-3 col-6 search_images"><img src="'+value+'" class="img-fluid img-thumbnail"></div>');
    })
  }
})
}
get_images();




$(document).keyup('#search',function(){
var search = $("#search").val();
if(search==""){
  
  get_images();
}
else{
$.ajax({
  url:'search_result.php',
  type:'POST',
  data:{search:search},
  beforeSend:function(){
 
      $("#searching").show();
      $(".loader").show();
  },
  success:function(res){
          $("#searching").hide();
      $(".loader").hide();
    var obj = jQuery.parseJSON(res);
    // alert(obj.status);
    if(obj.status==1){
       $('html, body').animate({
        scrollTop: $("#data").offset().top
    }, 2000);
      $("#data").show();
       $("#data").html(''); 
      $.each(obj.search_result, function(key,value) {
         $("#data").html("");
      $("#data").append('<div class="col-md-3 col-6 search_images"><img src="'+value+'" class="img-fluid img-thumbnail"></div>');  

}); 
    }
    else if(obj.status==0){
       $('html, body').animate({
        scrollTop: $("#data").offset().top
    }, 2000);
      $("#data").show();
      
      $("#data").html('<p style="text-align:center;width:100%;">No Search Results....</p>');  

    }
    // $("#searching").show();
    // alert(res.length);
//   $.each(res, function(key,value) {
//   $("#searching").html(value.search_result);
// });     
  }
})
}
})

});

</script>
</html>