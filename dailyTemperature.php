<?php
header('Content-Type: application/json');
class FB{
 public $link='';
 function __construct($StationName,$Value1,$Value2){
  $this->connect();
  $this->storeInDB($StationName,$Value1,$Value2);
 }
 
 function connect(){
  $this->link = mysqli_connect('182.50.133.77','prabudh','Prabudh@123') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'prabudhbharat') or die('Cannot select the DB');
 }
 
 function storeInDB($StationName,$Value1,$Value2){

$sql="SELECT `AmbTemperature`,`Timestamp`,`Humidity` from weather_daily_data where StationName='".$StationName."' AND Timestamp BETWEEN '".$Value1."' AND '".$Value2."' order By Timestamp DESC";
$result=mysqli_query($this->link,$sql) or die("Sql query failed");
if(mysqli_num_rows($result)>0)
{
   
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $rows = array();
    foreach ($output as $row) {
		
		$abc = $row["Timestamp"];
		$timestamp = strtotime($abc);
        $new_date_format = date('m/d/Y H:i', $timestamp);
		$temp= $row["AmbTemperature"];
    $hum=$row["Humidity"];
		$finalvar=$temp.','.$hum.','.$new_date_format;
		#echo $finalvar;
		#$values = explode(,$temp,$temp);
		$fruits_ar = explode(",", $finalvar);
		
         $rows[] = array_values($fruits_ar);
    }   
     echo json_encode($rows,JSON_UNESCAPED_SLASHES);
}
else{
	echo json_encode(array('message' => 'No Record Found.','status'=>false));
}
  }
 
}
if($_GET['StationName'] != '' and $_GET['Value1'] != '' and $_GET['Value2'] != ''){

 $FB=new FB($_GET['StationName'],$_GET['Value1'],$_GET['Value2']);
}
?>
