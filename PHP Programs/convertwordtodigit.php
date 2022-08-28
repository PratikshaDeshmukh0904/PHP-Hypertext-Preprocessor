<?php
function word_digit($word){
    $warr=explode(';',$word);
    $result='';
    foreach($warr as $value)
    {
        switch(trim($value)){
            case 'zero':
                $result.='0';
                break;
            case 'one':
                $result.='1';
                break;
            case 'two':
                $result.='2';
                break;
            case 'three':
                $result.='3';
                break;
            case 'four':
                $result.='4';
                break;
            case 'five':
                $result.='5';
                break;


        }
    }
    return $result;
}
echo word_digit("zero;three;five;one")."\n";
echo"<br>";
echo word_digit("two;zero;one")."\n";


?>