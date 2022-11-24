<?php

include 'DatabaseConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
	 $DefaultId = 0;
	 
 $ImageData = $_POST['image_path'];
 
 $ImageName = $_POST['image_name'];
 $ImageDescription=$_POST['image_description'];

 
 
 $ImagePath = "ECS/$ImageName";
 
 $ServerURL = "http://tsm.ecssofttech.com/$ImagePath";
 
 

 file_put_contents($ImagePath,base64_decode($ImageData));

 
 
 
 }else{
 echo "Not Uploaded";
 }

?>