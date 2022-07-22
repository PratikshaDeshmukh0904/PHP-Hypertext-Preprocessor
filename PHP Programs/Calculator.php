<?php
class MyCalculator{
    private $_fval , $_sval;
    public function __construct( $fval , $sval )
    {
        $this->_fval = $fval;
        $this->_sval = $sval;

    }
    public function add()
    {
        return $this->_fval + $this->_sval;
    }
    public function substract(){
        return $this->_fval - $this->_sval;
    }
    public function multiply(){
        return $this->_fval * $this->_sval;
    }
    public function divide(){
        return $this->_fval / $this->_sval;
    }
}
$mycalc = new MyCalculator(12, 6);
echo"<h3>Add</h3>";
echo $mycalc-> add()."<b>\n </b>";

echo"<h3>Substract</h3>";
echo $mycalc-> substract()." \n ";

echo"<h3>Multiplication</h3>";
echo $mycalc-> multiply()."\n";


echo"<h3>Divide</h3>";
echo $mycalc-> divide()."\n";
 ?>