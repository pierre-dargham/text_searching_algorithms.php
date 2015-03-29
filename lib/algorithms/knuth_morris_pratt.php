<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                knuth_morris_pratt.php
 * Description:         ALGORITHM : Knuth-Morris-Pratt
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function knuth_morris_pratt_prepare($needle, $size_needle) {
   $kmpNext = array();
   $kmpNext[0] = -1;
   $i = 0;
   $j = -1;

   while ($i < $size_needle) {
      while ($j > -1 && $needle[$i] != $needle[$j+1]) {
         $j = $kmpNext[$j];       
      }

      ++$i;
      ++$j;

      if($i == $size_needle || $needle[$i] != $needle[$j]) {
         $kmpNext[$i] = $j;
      }
      else {
         $kmpNext[$i] = $kmpNext[$j];
      }
   }

   return $kmpNext;
}

function knuth_morris_pratt($haystack, $size_haystack, $needle, $size_needle) {

   $kmpNext = knuth_morris_pratt_prepare($needle, $size_needle);
   $positions = array();

   $i = 0;
   $j = 0;

   while ($j < $size_haystack) {
      while ($i > -1 && $needle[$i] != $haystack[$j]) {
         $i = $kmpNext[$i];
      }

      $i++;
      $j++;

      if ($i >= $size_needle) {
         $positions[] = $j - $i;
         $i = $kmpNext[$i];
      }
   }

   return $positions;
}