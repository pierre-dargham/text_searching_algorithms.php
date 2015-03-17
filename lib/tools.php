<?php

require_once(LIB_DIR . 'morris_pratt.php');

function get_registred_algorithms() {
	return array(
		'morris_pratt' => 'MP',
	);
}

function search($needle, $haystack, $algorithm, $time_precision = 5) {

	$algorithms = get_registred_algorithms();

	$size_haystack = strlen($haystack);
	$size_needle = strlen($needle);

	$start_time = microtime(true);

	$positions = call_user_func_array($algorithms[$algorithm], array($haystack, $size_haystack, $needle, $size_needle));

	$elapsed_time = round(microtime(true) - $start_time, $time_precision);

	return array(
		'positions' 	=> $positions,
		'elapsed_time' 	=> $elapsed_time,
		'size_haystack' => $size_haystack,
		'size_needle' 	=> $size_needle,
	);
}

function colorize_results($pattern, $text, $positions, $size_word) {

	$style_offset = 0;
	$style_len = strlen(COLORIZE_START) + strlen(COLORIZE_END);
	$result = COLORIZE_START . $pattern . COLORIZE_END;

	foreach($positions as $position) {
		$text = substr_replace ($text, $result, $position + $style_offset, $size_word);
		$style_offset += $style_len;
	}

	return $text;
}

function lorem_ipsum() {
	return file_get_contents('http://loripsum.net/api/10/medium/plaintext');
}