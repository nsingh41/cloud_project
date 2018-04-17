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
        <style type="text/css">
      
        </style>
</head>
<body class="body-background">

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><h1>Brain Pop App </h1></a>

   <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Upload Images</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="search.php">Search Images</a>
    </li>
    
  </ul>
</nav> 
<div class="container-fluid" style="">
<!-- <h3 style="text-align: center;">Image Upload To Google DataBase</h3> -->
<div class="row">
<div class="col-sm-12" id="position">

<div class="card bg-light text-dark">
    <div class="card-body">
     <h3 style="text-align:center">Upload Image</h3>
  <div class="form-group" >
   <label class="custom-file-upload">
    <input type="file" class="form-control" id="file" name="file">
    Click Here to Upload
    </label>
  </div>
  <div class="alert alert-danger">
  
</div>	
<p style="text-align: center;" id="uploading">Uploading Image!</p>
<p style="text-align: center;" id="uploaded">Image Uploaded!</p>
    </div>
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
		$("#uploading").hide();
		$("#uploaded").hide();
    $(".alert").hide();
	$(document).on('change','#file',function(){
var name = document.getElementById("file").files[0].name;
var form_data = new FormData();
var ext = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
    $(".alert").show();
   $(".alert").html("Invalid Image File");
 }
 var oFReader = new FileReader();
 oFReader.readAsDataURL(document.getElementById("file").files[0]);
 var f = document.getElementById("file").files[0];
 var fsize = f.size||f.fileSize;
 if(fsize > 2000000)
 {
   $(".alert").show();
   $(".alert").html("Image File Size is very big");
   
 }
 else{
form_data.append("file",document.getElementById("file").files[0]);
$.ajax({
	url:"upload.php",
	 method : "POST",
    data : form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function(){
      $("#uploaded").hide();
    	$("#uploading").show();
    },
    success:function(res){
       var obj = jQuery.parseJSON(res);
$("#uploaded").show();
$("#uploaded").html("<h3>Uploaded Successfully</h3> <p>With Labels: "+obj.labels+"</p>");
$("#uploading").hide();

    }
})
 }

	})
});

</script>
</html>