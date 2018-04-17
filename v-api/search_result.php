<?php
include("dbtest.php");
$search =  $_REQUEST["search"];
$results = array();
$counter = 0;
$check = "select * from sample where image_labels='".$search."'";
$result = mysqli_query($conn,$check);
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$results[$counter] = $row["image_path"];
		$counter++;
	}
	$res = array('status'=>1,'search_result'=>$results);
	echo json_encode($res);
	// foreach($results as $res){
	// 	echo $res."</br>";
	// } 
}

else{
	$res = array('status'=>0);
	echo json_encode($res);
}


?>