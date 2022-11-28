	<?php
	class FB{
	 public $link='';
	 function __construct($id,$Name,$Mobile,$MailID,$State,$District,$Village,$Station1,$Crops,$Password){
	  $this->connect();
	  $this->storeInDB($id,$Name,$Mobile,$MailID,$State,$District,$Village,$Station1,$Crops,$Password);
	 }
	 
	 function connect(){
	  $this->link = mysqli_connect('loaclhost','root','') or die('Cannot connect to the DB');
	  mysqli_select_db($this->link,'databasename') or die('Cannot select the DB');
	 }
	 
	 function storeInDB($id,$Name,$Mobile,$MailID,$State,$District,$Village,$Station1,$Crops,$Password){
		 
	  $query = "Update tblAshayRegistration set `Name` ='".$Name."',`Mobile` ='".$Mobile."',`MailID` = '".$MailID."',`State` = '".$State."',`District` = '".$District."',`Village` = '".$Village."',`Station1`  = '".$Station1."',`Crops` = '".$Crops."',`Password` = '".$Password."' where `id`='".$id."'";
	  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
		if(mysqli_num_rows($result)>0)
		{
			$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
			echo json_encode($output);
		}
	}
	}
	if($_GET['id'] != '' ){
	 $FB=new FB($_GET['id'],$_GET['Name'],$_GET['Mobile'],$_GET['MailID'],$_GET['State'],$_GET['District'],$_GET['Village'],$_GET['Station1'],$_GET['Crops'],$_GET['Password']);
	}
	?>
