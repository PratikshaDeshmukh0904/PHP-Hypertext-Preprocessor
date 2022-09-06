<?php

//First method of array creation
$arr1=array("one","two","three","four");

foreach($arr1 as $num)
{
    echo" value is $num <br/>";
}

echo"<br/>";
//second method of array creation
//$arr2=array("big","Medium","small");

$arr2[0]="big";
$arr2[1]="medium";
$arr2[2]="small";
$arr2[3]="tiny";


foreach($arr2 as $num2)
{
    echo" value is $num2 <br/>";
}
?>