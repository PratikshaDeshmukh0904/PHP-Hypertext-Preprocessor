<?php
$ct=0;
$n=0;
$i=1;
$j=1;

while($n<10)
{
    $J=1;
    $ct=0;

    while($j<=$i)
    {
    if($i%$J==0)
    $ct++; 
    $j++;
    }

if($ct == 2)
{
    echo $i;
    echo "";
    $n++;
}
  $i++;

}
?>