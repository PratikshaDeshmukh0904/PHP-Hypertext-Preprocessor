<?php
//first method to associative array
$salaries =array ("aarti"=>200000, "pooja"=>608889,"amrita"=>300000);

echo"salary of aarti:".$salaries['aarti']."<br/>";
echo"salary of pooja:".$salaries['pooja']."<br/>";
echo"Salary of amrita:".$salaries['amrita']."<br/>";
echo "<br/>";
//second method to create array
$salaries['aarti'] = "high";
$salaries['pooja'] = "medium";
$salaries['anrita'] = "very high";

echo"salary of aarti is".$salaries['aarti']. "<br/>";
echo"salary of aarti is".$salaries['pooja']. "<br/>";
echo"salary of aarti is".$salaries['anrita']. "<br/>";


?>