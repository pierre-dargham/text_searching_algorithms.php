<?php

function registred_algorithms() {
	return array(
		'Brute Force' 			=> 'brute_force',
		'Morris-Pratt'			=> 'morris_pratt',
		'Knuth-Morris-Pratt' 	=> 'knuth_morris_pratt',
		'Shift-Or' 				=> 'shift_or',
		//'Shift-And' 			=> 'shift_and',
		'BNDM' 					=> 'bndm',
	);
}

define('DEBUG', true);

define('ABSPATH', dirname(__FILE__) . '/');

define('DATA_DIR', ABSPATH . 'data/');

define('LIB_DIR', ABSPATH . 'lib/');

define('ALGO_DIR', LIB_DIR . 'algorithms/');

define('TEMPLATES_DIR', ABSPATH . 'templates/');

define ('SEARCH_URL', 'http://127.0.0.1/text_searching_algorithms/');

define ('STYLESHEET_URL', './templates/style.css');

define('COLORIZE_START', '<span class="result">');

define('COLORIZE_END', '</span>');

define('URL_LOREM_IPSUM', 'http://loripsum.net/api/100/medium/plaintext');

define('URL_LOREM_IPSUM_LOCAL', 'http://127.0.0.1/text_searching_algorithms/data/lorem');

define('MULTI_SEARCH_NUMBER_ITERATION', 5);

define('MULTI_SEARCH_DEFAULT_NEEDLE', 'estate');

set_time_limit(1000);