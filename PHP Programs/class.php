<?php
//write a simple php class which displays an introducatory message like "Hello All,i am ABC" ,where "ABC" is an argument value 
//of the method within the method within the class  

class user_message{
    public $message ='<b>"---Hello All ,I am </b>';
    public function introduce($name)
    {
        return $this->message.$name;
    }
}
$mymessage = New user_message();
echo $mymessage->introduce('<b>ABC--"</b>')."\n";
?>