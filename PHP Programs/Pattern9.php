<?php
$k=1;
for($i=0;$i<5;$i++){
    for($j=0;$j<=$i;$j++){
        if($j%2==0)
        {
            $k=0;
        }else
        {
            $k=1;
        }
        echo $k."";
    }
    echo "<br>";
}
?>