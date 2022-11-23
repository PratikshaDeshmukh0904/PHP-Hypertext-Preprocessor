<?php
class FB{
 public $link='';
 	function __construct($businesscategory){
  $this->connect();
  	 $this->storeInDB($businesscategory);
 }
 
  function connect(){
  $this->link = mysqli_connect('sg2nlmysql3plsk.secureserver.net','TSM','Rahulecs@123') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'TSM') or die('Cannot select the DB');
 }
 
 	function storeInDB($businesscategory){	
	
$query = "select businessname,address,briefdiscription,photo1,id,mobile from digkbusiness where businesscategory ='".$businesscategory."'";
$result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
if(mysqli_num_rows($result)>0)
{
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}
else{

}
}

}
if($_GET['businesscategory'] != ''){
 $FB = new FB($_GET['businesscategory']);
}
?>

