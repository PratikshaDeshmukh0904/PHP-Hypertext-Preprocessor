 <?php
header('Content-Type: application/json');
class FB
{
function __construct($Username,$MobileNo,$Country,$State,$City,$Password,$ConfirmPassword)
{
$this->connect();
$this->storeInDB($Username,$MobileNo,$Country,$State,$City,$Password,$ConfirmPassword);
}
 function connect()
{
$this->link = mysqli_connect('182.50.133.77','prabudh','Prabudh@123') or die('Cannot connect to the DB');
mysqli_select_db($this->link,'prabudhbharat') or die('Cannot select the DB');
}	
function storeInDB($Username,$MobileNo,$Country,$State,$City,$Password,$ConfirmPassword)
	{
		$query ="insert into CwprsRegistration set Username='".$Username."',MobileNo='".$MobileNo."',Country= '".$Country."',State= '".$State."',City= '".$City."',Password= '".$Password."',ConfirmPassword= '".$ConfirmPassword."'";

		$results = mysqli_query($this->link , $query);
		 
		echo 'resigtration successfully';
	}
	
	
}
if($_GET['Username'] != '' and $_GET['MobileNo'] != ''and $_GET['Country'] != '' and $_GET['State'] != '' and $_GET['City'] != '' and $_GET['Password'] != '' and $_GET['ConfirmPassword'] != '')
{
 	$FB=new FB($_GET['Username'],$_GET['MobileNo'],$_GET['Country'],$_GET['State'],$_GET['City'],$_GET['Password'],$_GET['ConfirmPassword']);
}
?>
