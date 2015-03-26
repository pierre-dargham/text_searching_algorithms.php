<?php

/**
 * File:         		text_searching_algorithms.php
 * Description:         Library for text searching algorithms in PHP
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
 *
 *
 *	=======================================================
 *
 *	- Implementation of following algorithms and concepts -
 *
 *	=======================================================
 *
 *	1. Morris-Pratt
 *	* @see http://en.wikipedia.org/wiki/Knuth%E2%80%93Morris%E2%80%93Pratt_algorithm
 *
 *	2. Knut-Morris-Pratt
 *	* @see http://en.wikipedia.org/wiki/Knuth%E2%80%93Morris%E2%80%93Pratt_algorithm
 *
 *	3. Simon
 *	* @see http://www-igm.univ-mlv.fr/~lecroq/string/node9.html
 *
 *	4. BNDM
 *	* @see http://www-igm.univ-mlv.fr/~lecroq/string/bndm.html
 *
 *	5. Aho–Corasick
 *	* @see http://en.wikipedia.org/wiki/Aho%E2%80%93Corasick_string_matching_algorithm
 *
 *	6. Wu-Manber
 *	* @see http://en.wikipedia.org/wiki/Bitap_algorithm
 *
 *	7. Thompson
 *	* @see http://en.wikipedia.org/wiki/Thompson%27s_construction_algorithm
 *
 *	8. Levenshtein distance
 *	* @see http://en.wikipedia.org/wiki/Levenshtein_distance
 *
 *	9. Needleman–Wunsch
 *	* @see http://en.wikipedia.org/wiki/Needleman%E2%80%93Wunsch_algorithm
 *
 *	10. Smith–Waterman
 *	* @see http://en.wikipedia.org/wiki/Smith%E2%80%93Waterman_algorithm
 *
 *
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