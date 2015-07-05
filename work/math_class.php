<?php
# match_class by Christiaan Westerbeek (c_westerbeek@hotmail.com), 29 sept 2001
# This class contains only one function: numconv($systemin, $systemout, $number, $length)
# With numconv(.,.,.,.) you can convert a number from one numbersystem to another. Some examples:
# numconv(10,16,   255  , 4); returns     00ff : converts the decimal number 100 to the hexadecimal value. Output must be 4 characters long.
# numconv(16, 8,   abc34, 4); returns  2536064 : converts the hexadecimal number abc34 to the octal value. Output must be 4 characters long.
# numconv( 2, 8,   11101, 0); returns       35 : converts the binary number 11101 to the octal value. Output remains normal length.
# numconv( 6, 5,      20, 8); returns 00000022 : converts the six-system value 20 to the five-system value. Output must be 8 characters long.
# numconv( 2,10,   11101, 6); returns   000029 : converts the binary number 11101 to the decimal value. Output must be 6 characters long.
# numconv(10,30,59851949, 0); returns   2dqm4t : converts the decimal number 59851949 to the thirty-system value. Output remains normal length.

class math_class{
  var $returnval="";
  function numconv($systemin, $systemout, $number, $length) {
    if (!is_numeric($systemin) OR !is_numeric($systemout) OR $systemin<2 OR $systemin>36 OR $systemout<2 OR $systemout>36) {
      die("Define system-in and system-out only in numeric value between 2 and 36.");
    }
    if ($systemin!=10) { //don't need to calculate a decimal value from a decimal value
      $number=strtolower($number);
      $numlength=strlen($number); 
      $decnumber=0; 
      for($i=0; $i<$numlength; $i++){
        $operand=substr($number,-1-$i,1);
        if (ord($operand)>96 AND ord($operand)<123) { //is alfabetic
          $operand=ord($operand)-87;
        }
        if ($operand>=$systemin) {
          die("Illegal number.");
        }
        $decnumber+=$operand*pow($systemin,$i);
      }
    }
    else {
      $decnumber=$number;
    }
    if ($decnumber>214748367) {
      die("Number may not be higher than decimal 214748367");
    }
    settype($decnumber, "double");
    settype($systemout, "double");
    if ($systemout!=10) { //don't need to calculate a decimal value to a decimal value
      $this->returnval="";
      while ($decnumber>0) {
        $remainder=((double)$decnumber)%$systemout;
        if ($remainder<10)
          $this->returnval=$remainder.$this->returnval;
        else
          $this->returnval=chr($remainder+87).$this->returnval;
        $decnumber=floor($decnumber/$systemout);
      }
    }
    else {
      $this->returnval=$decnumber;
    }
    while (strlen($this->returnval)<$length) $this->returnval="0".$this->returnval;
    return $this->returnval;
  }
}

?>