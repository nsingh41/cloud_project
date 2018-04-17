<?php
include('dbtest.php');
$i=0;
$images = array();
$get_images = "SELECT image_path FROM `sample` GROUP by image_path";
$result = mysqli_query($conn,$get_images);
if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_assoc($result)) {
	$images[$i] = $row["image_path"];
	$i++;	
	}
$arr = array("img"=>$images);
echo json_encode($arr);
}






?>