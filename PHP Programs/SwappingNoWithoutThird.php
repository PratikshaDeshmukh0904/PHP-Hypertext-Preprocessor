<?php
$a=11;
$b=22;

echo "Before Swapping:<br>";
echo  "a=".$a." b=".$b ;
echo "<br>";

$a=$a+$b;
$b=$a-$b;
$a=$a-$b;
echo "After Swapping";
echo "<br>";
echo "a=".$a." b=".$b;
echo "<br>";

?>