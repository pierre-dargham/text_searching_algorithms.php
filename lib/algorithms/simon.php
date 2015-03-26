<?php

function getTransition($needle, $size_needle, $p, $list, $c) {

   if ($p < $size_needle - 1 && $needle[$p + 1] == $c) {
      return($p + 1);
   }
   else if ($p > -1) {
      while (!empty($list[$p])) {
         if ($needle[$list[$p]] == $c) {
            return $list[$p];            
         }
         else {
            ++$p;             
         }
      }

      return -1;
   }

   return -1;
}
 
function preSimon($needle, $size_needle, &$list) {

   $list = array_fill(0, $size_needle - 2, NULL);

   $ell = -1;

   for ($i = 1; $i < $size_needle; ++$i) {

      $k = $ell;
      $cell = ($ell == -1 ? '' : $list[$k]);
      $ell = -1;

      if ($needle[$i] == $needle[$k + 1]) {
         $ell = $k + 1;
      }
      else {
         array_splice($list, $i - 1, 0, array($k + 1));
      }

      while ($cell===NULL) {
         $k = $cell;
         if ($needle[$i] == $needle[$k]) {
            $ell = $k;           
          }
         else {
            array_splice($list, $i - 1, 0, array($k));
         }
         $cell = cell->next;
      }

   }
   
   return $ell;
}


function simon($haystack, $size_haystack, $needle, $size_needle) { 

   $list = array();
   $positions = array();
 
   /* Preprocessing */
   $ell = preSimon($needle, $size_needle, $list);
 
   /* Searching */
   for ($state = -1, $j = 0; $j < $size_haystack; ++$j) {
      $state = getTransition($x, $size_needle, $state, $list, $haystack[$j]);
      if ($state >= $size_needle - 1) {
         $positions[] = $j - $size_needle + 1;
         $state = $ell;
      }
   }
   return $positions;
}