<?php  

//built-in functions of PHP
//We can use either count() or sizeof() function to count the total number of elements present in an array.
$ele = array("Ryan", "Ahana", "Ritvik", "Amaya"); 
$a=count($ele);
echo"Numbers of elements in array :".$a. "<br/>";


$ele = array(14, 89, 26, 90, 36, 48, 67, 75);  
$b = sizeof($ele);  
echo " Number of elements present in the array: ".$b."<br/>";  

//count elements in array
$ele = array(14, 89, 26, 90, 36, 48, 67);  
$c = sizeof($ele);  
echo " Number of elements present in the array: ".$c. "<br/>";  


// using 2D array
$snacks = array('drinks' =>array('mangojuice','cococola','milk'),
'sweet' =>array('gulbjamun','pedha','rasgulla'));
$d= count($snacks,1);
echo"elements in array".$d."<br/>";
$e= sizeof($snacks,1);
echo"elements in array" .$e."<br/>";
$f= sizeof($snacks,1);
echo "elements in 2D array:".$f;

?>