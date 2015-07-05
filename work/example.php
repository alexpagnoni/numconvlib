<?php
  include ("math_class.php");
  $mathobject=new math_class;
  echo $mathobject->numconv(10,16,   255  , 4);
  echo "<BR>";
  echo $mathobject->numconv(16, 8,   abc34, 4);
  echo "<BR>";
  echo $mathobject->numconv( 2, 8,   11101, 0);
  echo "<BR>";
  echo $mathobject->numconv( 6, 5,      20, 8);
  echo "<BR>";
  echo $mathobject->numconv( 2,10,   11101, 6);
  echo "<BR>";
  echo $mathobject->numconv(10,30,59851949, 0);
  echo "<BR>";

?>
