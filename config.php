<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                config.php
 * Description:         Configuration and settings
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function registred_algorithms() {
	return array(
		'Brute Force' 			=> 'brute_force',
		'Morris-Pratt'			=> 'morris_pratt',
		'Knuth-Morris-Pratt' 	=> 'knuth_morris_pratt',
		'BNDM' 					=> 'bndm',
		'Shift-Or' 				=> 'shift_or',
	);
}

define('DEBUG', true);

define('LOCAL', false);

define('ABSPATH', dirname(__FILE__) . '/');

define('DATA_DIR', ABSPATH . 'data/');

define('LIB_DIR', ABSPATH . 'lib/');

define('ALGO_DIR', LIB_DIR . 'algorithms/');

define('TEMPLATES_DIR', ABSPATH . 'templates/');

define('STYLESHEET_URL', './templates/style.css');

define('COLORIZE_START', '<span class="result">');

define('COLORIZE_END', '</span>');

define('MULTI_SEARCH_NUMBER_ITERATION', 4);

define('MULTI_SEARCH_DEFAULT_NEEDLE', 'estestest');

define('URL_LOREM_IPSUM', 'http://loripsum.net/api/100/medium/plaintext');

define('URL_LOREM_IPSUM_LOCAL', 'http://127.0.0.1/text_searching_algorithms/data/lorem');

define('URL_JS_JQUERY', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');

define('URL_JS_JQUERY_LOCAL', 'http://127.0.0.1/text_searching_algorithms/lib/js/jquery.min.js');

define('URL_JS_HIGHCHARTS', 'http://code.highcharts.com/highcharts.js');

define('URL_JS_HIGHCHARTS_LOCAL', 'http://127.0.0.1/text_searching_algorithms/lib/js/highcharts.js');

set_time_limit(1000);