<?php
$k=1;
foreach(range('A','Z') as $char){
    for($i=5;$i>$k;$i--)
    {
        echo "$char";
    }
    echo"<br>";
    $k=$k+1;
}


?>