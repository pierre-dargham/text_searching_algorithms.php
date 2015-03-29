<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                shift_or.php
 * Description:         ALGORITHM : Shift-Or
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function shift_or($haystack, $size_haystack, $needle, $size_needle) {

	$positions = array();
	$s = array();

    for ($i = 0; $i < 256; ++$i) {
      $s[$i] = ~0; 
    } 
    for ($lim = 0,  $i = 0, $j = 1; $i < $size_needle; ++$i, $j <<= 1) { 
      $s[ord($needle[$i])] &= ~$j; 
      $lim |= $j; 
    } 
    $lim = ~($lim>>1);

    /* Searching */ 
    for ($state = ~0, $j = 0; $j < $size_haystack; ++$j) {

    // shift AND 
    	//$state = (($state << 1) | 1) & $s[ord($haystack[$j])];
    // shift OR 	
      	$state =  ($state << 1) | $s[ord($haystack[$j])];
        

      if ($state < $lim) {
        $positions[] = $j - $size_needle + 1; 
      }
    }
  
   return $positions;
} 
