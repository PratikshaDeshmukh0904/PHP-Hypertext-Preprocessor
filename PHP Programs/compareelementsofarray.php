<?php
$a=array(10,80,67,89,40,20);
$b=count($a);
for($i=0;$i<$b-1;$i=$i+1)
{
  for( $j=$i+1;$j<$b;$j=$j+1)
{
if($a[$i]>$a[$j])
{
  $temp=$a[$i];
  $a[$i]=$a[$j];
  $a[$j]=$temp;
}
}
}
echo"The array elements are:"." <br>";
for($i=0;$i<$b;$i=$i+1)
{
  echo $a[$i]."<br>";

}
?>