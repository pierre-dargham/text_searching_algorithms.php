<?php

require_once(ALGO_DIR . 'brute_force.php');
require_once(ALGO_DIR . 'morris_pratt.php');
require_once(ALGO_DIR . 'knuth_morris_pratt.php');
require_once(ALGO_DIR . 'shift_or.php');
require_once(ALGO_DIR . 'shift_and.php');
require_once(ALGO_DIR . 'bndm.php');
//require_once(ALGO_DIR . 'simon.php');

function run_algorithm($algorithm, $haystack, $size_haystack, $needle, $size_needle) {
	$algorithms = registred_algorithms();
	return call_user_func_array($algorithms[$algorithm], array($haystack, $size_haystack, $needle, $size_needle));
}