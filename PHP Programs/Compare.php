<?php
$a=array(10,20,30,40,60,59);
$b=count($a);

for($i=0;$i<$b-1;$i=$i+1)
{
    for($j=$i+1;$j<$b-1;$j=$j+1)
    {
        if($a[$i]>$a[$j])
        {
            $temp=$a[$i];
            $a[$i]=$a[$j];
            $a[$j]=$temp;
        }
    }
}
echo "the array elements are:"."<br>";
for($i=0;$i<$b;$i=$i+1)
{
    echo $a[$i]."<br>";
}



?>