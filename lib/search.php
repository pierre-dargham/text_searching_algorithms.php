<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                search.php
 * Description:         Search functions
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

require_once(LIB_DIR . 'tools.php');
require_once(LIB_DIR . 'text.php');
require_once(LIB_DIR . 'algorithms.php');

function search($needle, $haystack, $algorithm, $time_precision = 5) {

	$size_haystack = strlen($haystack);
	$size_needle = strlen($needle);

	$start_time = microtime(true);

	$positions = run_algorithm($algorithm, $haystack, $size_haystack, $needle, $size_needle);

	$elapsed_time = round(microtime(true) - $start_time, $time_precision);

	return array(
		'positions' 	=> $positions,
		'elapsed_time' 	=> $elapsed_time,
		'size_haystack' => $size_haystack,
		'size_needle' 	=> $size_needle,
	);
}

function multi_search($needle, $haystacks)  {

	$algorithms = registred_algorithms();

	$search_results = array();

	foreach($algorithms as $algo_name => $func) {
	    $search_results[$algo_name] = search_n_text($needle, $haystacks, $algo_name);
	}

	$count = check_results_positions($search_results);

	return array(
		'categories' 	=> get_js_categories($haystacks),
		'series'		=> get_js_series($search_results),
		'count'			=> $count,
	);
}

function search_n_text($needle, $haystacks, $algorithm) {

	$times = array();
	$results = array();

	foreach($haystacks as $haystack) {
		$result = search($needle, $haystack, $algorithm);
		$times[strlen($haystack)] = $result['elapsed_time'];
		$results[] = $result;
	}

	return array(
		'results' 	=> $results,
		'times'		=> $times
	);
}

function search_n_times($n, $needle, $haystack, $algorithm) {
	$times = array(
		'0' => '0'
	);

	$results = array();

	for($i = 0; $i < $n; ++$i) {
		$text = str_repeat($haystack . ' ', $i*$i);
		$result = search($needle, $text, $algorithm);
		$times[strlen($text)] = $result['elapsed_time'];
		$results[] = $result;
	}

	return array(
		'results' 	=> $results,
		'times'		=> $times
	);
}

function check_results_positions($search_results) {

	$count = array();

	for($i = 0; $i < MULTI_SEARCH_NUMBER_ITERATION; ++$i) {
		$prev = 0;
		foreach($search_results as $algo => $search_result) {

			$result = $search_result['results'][$i]['positions'];
			sort($result);

			if($prev != 0) {
				if(!( (empty($result) && empty($prev)) || ($result == $prev) ) ) {
					die('ERROR / ALGORITHMS : Results are differents');
				}
			}

			$prev = $result;
		}

		$count[] = count($prev);
	}

	return $count;
}