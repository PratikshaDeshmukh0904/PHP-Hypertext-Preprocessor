<?php

for($i=1;$i<=10;$i++)
{
    for($j=1;$j<=10;$j++)
    {
        echo "<tr>";
        $multiplication=$i * $j;
      echo"<td> $i*$j=$multiplication </td>";
      echo "</tr> ";
      echo"<hr>";
    }
    echo "<br>";
     
}



?>