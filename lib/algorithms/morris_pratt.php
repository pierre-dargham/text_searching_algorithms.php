<?php

function morris_pratt_prepare($needle, $size_needle) {
	$mpNext = array();
	$i = 0;
	$j = -1;
	$mpNext[0] = -1;

	while ($i < $size_needle) {
		while ($j > -1 && $needle[$i] != $needle[$j]) {
			$j = $mpNext[$j];      	
		}
		$mpNext[++$i] = ++$j;
	}

	return $mpNext;
}


function morris_pratt($haystack, $size_haystack, $needle, $size_needle) {

   $mpNext = array();
   $positions = array();

   $mpNext = morris_pratt_prepare($needle, $size_needle);

   $i = 0;
   $j = 0;

   while ($j < $size_haystack) {
      while ($i > -1 && $needle[$i] != $haystack[$j]) {
		$i = $mpNext[$i];     	
      }

      $i++;
      $j++;
      if ($i >= $size_needle) {
         $positions[] = $j - $i;
         $i = $mpNext[$i];
      }
   }

   return $positions;
}
