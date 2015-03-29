<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                brute_force.php
 * Description:         ALGORITHM : Brute Force
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function brute_force($haystack, $size_haystack, $needle, $size_needle) {
	
   $positions = array();

	for($i = 0; $i < ( ($size_haystack - $size_needle) + 1 ); $i++) {

		$j = 0;

		while($i + $j < $size_haystack && $j < $size_needle && $haystack[ $i + $j ] == $needle[$j]) {
			$j++;
		}

		if(!($j<$size_needle)) {
			$positions[] = $i;
		}

	}

   return $positions;
}
