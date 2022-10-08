<?php
// connection
$server="localhost";    //127.0.0.1;
$username = "root";
$password = "";
$db = "";


$connection=new mysqli($server,$username,$password,$db);//store all connection in one variable

if($connection ->connect_error){
    die("Connection Not Successfully:".$connection->connect_error);
}


$firstname=$_POST['fname']
$middlename=$_POST['mname']
$lastname=$_POST['lname']
$mobile=$_POST['mobile']
$email=$_POST['email']

echo $firstname;
echo $middlename;
echo $lastname;
echo $mobile;
echo $email;

if($firstname != "" && $middlename != "" && $lastname != "" $mobile != "" $email != "")
{

$Query= "insert into tablename(firstname,middlename,lastname,mobileno,email) values('".$firstname."','".$middlename."','".$lastname."','".$mobile."','".$email."')";

if($connection->query($Query) === TRUE)
{
    echo "<script>alert('Data Inserted')</script>";
}
else{
    echo "Data Not Inserted Successfully".$connection->error;
}
}
else{
    echo"<script>alert('First Fill All Data')</script>";
}
$connection->close();
?>