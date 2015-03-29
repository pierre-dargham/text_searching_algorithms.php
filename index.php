<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                index.php
 * Description:         Library for text searching algorithms in PHP
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

require_once(dirname(__FILE__) . '/' . 'config.php');
require_once(LIB_DIR . 'search.php');

if(isset($_GET['mode']) && $_GET['mode'] == 'multisearch') {

	$needle = MULTI_SEARCH_DEFAULT_NEEDLE;
	$n = MULTI_SEARCH_NUMBER_ITERATION;
	$haystacks = get_n_text($n, lorem_ipsum());

	$results = multi_search($needle, $haystacks);

	require_once(TEMPLATES_DIR . 'result_multi_search.php');
}
else if( isset($_POST['search']) && $haystack = check_post($_POST)) {

	$results = search($_POST['needle'], $haystack, $_POST['algorithm']);

	$text = colorize_results($_POST['needle'], $haystack, $results['positions'], $results['size_needle']);

	$time = $results['elapsed_time'];

	require_once(TEMPLATES_DIR . 'result.php');
}
else {
	require_once(TEMPLATES_DIR . 'search.php');
}