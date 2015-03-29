<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                algorithms.php
 * Description:         Load and run text searching algorithms
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

require_once(ALGO_DIR . 'brute_force.php');
require_once(ALGO_DIR . 'morris_pratt.php');
require_once(ALGO_DIR . 'knuth_morris_pratt.php');
require_once(ALGO_DIR . 'bndm.php');
require_once(ALGO_DIR . 'shift_or.php');

function run_algorithm($algorithm, $haystack, $size_haystack, $needle, $size_needle) {
	$algorithms = registred_algorithms();
	return call_user_func_array($algorithms[$algorithm], array($haystack, $size_haystack, $needle, $size_needle));
}