<?php

function isLeap($year){
return (date('L',mktime(0,0,0,1,1,$year))==1);
}
//For Testing
for($year=1991;$year<2016;$year++)
{
if(isLeap($year))
{
echo "$year :LEAP YEAR <br/>\n";
}
else
{
echo "$year : NOT leap year <br/>\n";

}
}

?>