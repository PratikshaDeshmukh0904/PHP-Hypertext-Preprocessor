<html>
<body>
<form method="post">
FirstName:<input type="text" name="Fname" ><br>
<br>
LastName:<input type="text"  name="Lname" ><br>
<br>
Dob:<input type="date" name="dob"><br>
<br>
MobileNo:<input type="text" name="mobileno" ><br>
<br>
Gender<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male<br>
<br>
Languages:<input type="checkbox" name="lang[]" value="c">C
           <input type="checkbox" name="lang[]" value="C++">C++
           <input type="checkbox" name="lang[]"  value="java">java
<br>
<br>

Course:<select name="course">
<option>Bsc</option>
<option>BCA</option>
<option>Msc</option>
<option>MCA</option>
</select>
<br>
<br>
<input type="submit" value="insert" name="insert">
</form>
<?php
$con=mysqli_connect("localhost","root","","php");
$sql="select * from crud";
$show=mysqli_query($con,$sql);
$row=mysqli_num_rows($show);
if($row!=0)
{
?>
<table border="1px solid" cellspacing="0" cellpadding="10">
<tr>
<th>RollNO</th>
<th>FirstName</th>
<th>Lastname</th>
<th>Dob</th>
<th>MobileNO</th>
<th>Gender</th>
<th>Language</th>
<th>Course</th>
<th colspan="2">Operation</th>
</tr>
<?php
while($res=mysqli_fetch_array($show))
{
?>
<tr>
<td><?php echo $res['id'] ?></td>
<td> <?php echo $res['fname'] ?></td>
<td> <?php echo $res['lname'] ?></td>
<td> <?php echo $res['dob'] ?></td>
<td> <?php echo $res['mobileno'] ?></td>
<td> <?php echo $res['gender'] ?></td>
<td> <?php echo $res['language'] ?></td>
<td> <?php echo $res['course'] ?></td>
<td><a href="Update.php" ? $Rollno= <?php echo $res ['id'] ?>">Update</a></td>
<td><a href="delete.php" ? $Rollno= <?php echo $res ['id'] ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
</body>
</html>

<?php

$con=mysqli_connect("localhost","root","","php");

if(isset($_POST['insert']))
{
$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
$dob=$_POST['dob'];
$mobileno=$_POST['mobileno'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$lang=$_POST['lang'];
$languages=implode("," ,$lang);

$sql2="insert into crud(fname,lname,dob,mobileno,gender,language,course)values('$fname','$lname','$dob','$mobileno','$gender','$languages','$course')";

$query=mysqli_query($con,$sql2);
if($query)
{
echo "<script language='javascript'>alert('Record Inserted')</script>";
}
else
{
echo"<script language='javascript'>alert('data not inserted successfully')</script>";
}
}
?>

