<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                bndm.php
 * Description:         ALGORITHM : BNDM
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function bndm($haystack, $size_haystack, $needle, $size_needle) {

  $positions = array();
  $s = array();

  for ($i = 0; $i < 256; ++$i) {
  	$s[$i] = 0;
  }

  $k = 1;
  for ($i = $size_needle-1; $i >= 0; --$i) {
    $s[ord($needle[$i])] |= $k;
    $k <<= 1;
  }

  $j = 0;
  while ($j <= $size_haystack - $size_needle){

    $i = $size_needle -1;
    $last = $size_needle;
    $d = ~0;

    while ($i >= 0 && $d!=0) {

      $d &= $s[ord($haystack[$j+$i--])];

      if ($d != 0) {
    	if ($i >= 0) {
      		$last = $i+1;
      	}
    	else {
      		$positions[] = $j;
       	}
       }
       $d <<= 1;
     }
     $j += $last;
   }

   return $positions;
  }