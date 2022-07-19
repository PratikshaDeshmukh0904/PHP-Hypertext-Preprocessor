<?php
$n=407;
$total=0;
$i=$n;
while($i!=0)
{
    $rem=$n%10;
    $total=$total+$rem*3;
    $i=$i/10;
}
if($num=$total){
    echo"$n is Armstrong Number";
}else{
    echo" $n is not Armstrong number";
}



?>