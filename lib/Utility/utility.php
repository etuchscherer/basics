<?php

/**
 * Miscellaneous functions and other
 * odds and ends that just got stuck 
 * in this file. 
 *
 * @author etuchscherer
 */
class utility {
  
  /**
   * Returns true if timestamp is yesterday.
   * Otherwise false.
   * @param  int $timestamp
   * @return bool
   */
  public static function isYesterday($timestamp) {
    return (date('d-m-Y', $timestamp) === date('d-m-Y', strtotime('yesterday')));
  }
  
  /**
   * Returns true if timestamp is today.
   * Otherwise false.
   * @param  int $timestamp
   * @return bool
   */
  public static function isToday($timestamp) {
    return (date('d-m-Y', $timestamp) === date('d-m-Y', time()));
  }
  
  /**
   * Formats an integer as us-formatted phone number.
   * @param  numeric $integer
   * @param  string  $sep <i>Optional</i> character used to separate number groups.
   * @return string
   */
  public static function formatPhoneNumberUS($phone, $sep = '-') {
    $replacement = '$1' . $sep . '$2' . $sep . '$3';
    return preg_replace('~(\d{3})[^\d]*(\d{3})[^\d]*(\d{4})$~', $replacement, $phone);
  }
  
  /**
   * Formats an integer for european styled phone numbers.
   * @param  number $phone
   * @param  string  $sep <i>Optional</i> character used to separate number groups.
   * @return string
   */
  public static function formatPhoneNumberInt($phone, $sep = '-') {
    $stripped     = preg_replace('/[^0-9]/', '', $phone);
    $replace3  = '$1' . $sep . '$2' . $sep . '$3';
    $replace4  = '$1' . $sep . '$2' . $sep . '$3' . $sep . '$4';
    
    switch (strlen($stripped)) {
      case  7: 
        return preg_replace('/([0-9]{2})([0-9]{2})([0-9]{3})/', $replace3, $stripped);
        break;
      case  8: 
        return preg_replace('/([0-9]{3})([0-9]{2})([0-9]{3})/', $replace3, $stripped);
        break;
      case  9: 
        return preg_replace('/([0-9]{3})([0-9]{2})([0-9]{2})([0-9]{2})/', $replace4, $stripped);
        break;
      case 10: 
        return preg_replace('/([0-9]{3})([0-9]{2})([0-9]{2})([0-9]{3})/', $replace4, $stripped);
        break;
    }
  }
}
