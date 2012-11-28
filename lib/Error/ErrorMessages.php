<?php 

class ErrorMessages {
  
  /**
   * Returns a formatted string for an invalid parameter
   * Exception. 
   * @param  mixed   $var
   * @param  string  $expected
   * @param  string  $method
   * @param  integer $line 
   * @return string
   */
  public static function invalidParam($var, $expected, $method, $line) {
    "Missing or incorrect parameter in $method." .
    'Expecting a ' . $expected . ' on line: ' . $line . 
    ' but was passed ' . gettype($var) . ' with a value of ' .
    "\'$var'.";
  }
}