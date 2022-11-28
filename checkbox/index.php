<!DOCTYPE html>
<html>
<head>
<title>Selecting Rows from MySQL Table using checkbox PHP, MySQLi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h2>Select User:</h2>
	<div>
	<form method="POST">
	<table border="1">
		<thead>
			<th><input type="checkbox" onclick="select_all()"></th>
			<th>staffname</th>
			<th>branchid</th>
			
		</thead>
		<tbody>
			
			<?php
			include('conn.php');
				$query=mysqli_query($conn,"select * from `staff`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="id[]"></td>
						<td><?php echo $row['staff_name']; ?></td>
						<td><?php echo $row['branchid']; ?></td>
						
						
					</tr>
					<?php
				}
			?>
			
		</tbody>
	</table>
	<br>
	<input type="submit" name="submit" value="Submit">
	<input type="submit" name="present" value="Present" onclick="myFunction()">
	<input type="submit" name="absent" value="absent">
	</form>
	</div>
	<div>
		<form action="" method="get">
		<h2>You Selected:</h2>
		<?php
			if (isset($_POST['submit'])){
				$var="";
    			//if($_POST["chk" ] as $chk) {
       			 	//$var='absent';
   				//}
				//else{
					//$var='present';
				//}
				foreach ($_POST['id'] as $id):
					
					if(isset($_POST['id']) ) {
						$var="Present";
						//Store the value of checkbox_attendance (Yes) into the database
					} else {
						//Store 'No' into the database
						$var="N";
					}

					
				
				$sq=mysqli_query($conn,"select staff_name,branchid from `staff` where id='$id'");
				$srow=mysqli_fetch_array($sq);

				$srow['staff_name']. "".$srow['branchid']. "";

				$a=array($srow['staff_name']. "");
				$e=array($srow['branchid']. "");

				$b=implode(" ",$a);
				$f=implode(" ",$e);

				echo $b."".$f;
				$date = date('Y-m-d');
				$s = "INSERT INTO data (name,branchid,attendance,date) values ('".$b."','".$f."','".$var."','".$date."')";
				$c=mysqli_query($conn,$s);

				endforeach;
				
			}
		?>
<h1>Present Student</h1>

<table border="1" >
		<thead id="myDIV">
			
			<th>staffname</th>
			<th>branchid</th>
			
		</thead>
		<tbody>
			
			<?php
			if (isset($_POST['present'])){
			include('conn.php');
			$from_date = "2022-11-20";
            $to_date = "2022-11-28";
			

				$query1=mysqli_query($conn,"SELECT * FROM data WHERE date BETWEEN  '" . $from_date . "' AND  '" . $to_date . "'");
				//$ss=mysqli_query($conn," SELECT id,staff_name,branchid FROM staff WHERE staff_name NOT IN (SELECT name FROM data WHERE date BETWEEN  '" . $from_date . "' AND  '" . $to_date . "')");
				while($row1=mysqli_fetch_array($query1)){
					?>
					<tr>
						
						<td><?php echo $row1['name']; ?></td>
						<td><?php echo $row1['branchid']; ?></td>
						
						
					</tr>
					<?php
				}
			}
			?>
			
		</tbody>
	</table>
	<h1>Absent Student</h1>
	<table border="1">
		<thead>
			
			<th>staffname</th>
			<th>branchid</th>
			
		</thead>
		<tbody>
			
			<?php
			if (isset($_POST['absent'])){
			include('conn.php');
			$from_date = "2022-11-20";
            $to_date = "2022-11-28";
				//$query1=mysqli_query($conn,"SELECT * FROM data WHERE date BETWEEN  '" . $from_date . "' AND  '" . $to_date . "'");
				$ss=mysqli_query($conn," SELECT id,staff_name,branchid FROM staff WHERE staff_name NOT IN (SELECT name FROM data WHERE date BETWEEN  '" . $from_date . "' AND  '" . $to_date . "')");
				while($row1=mysqli_fetch_array($ss)){
					?>
					<tr>
						
						<td><?php echo $row1['staff_name']; ?></td>
						<td><?php echo $row1['branchid']; ?></td>
						
						
					</tr>
					<?php
				}
			}
			?>
			
		</tbody>
	</table>

	
		</form>
		<script>
			<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
		</script>
		<script>
			function select_all()
			{
				alert('a');
			}
		</script>

			<script>
				function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
			</script>
	</div>
</body>
</html>