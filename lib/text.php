<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                text.php
 * Description:         Text functions
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function lorem_ipsum() {
	if(LOCAL) {
		return file_get_contents(URL_LOREM_IPSUM_LOCAL);
	}
	else {
		return file_get_contents(URL_LOREM_IPSUM);
	}
}

// get n text of size i^2 ; i from 0 to n
function get_n_text($n, $text) {

	$texts = array();

	for($i = 0; $i < $n; ++$i) {
		$text_i = str_repeat($text . ' ', $i*$i);
		$texts[strlen($text_i)] = $text_i;
	}

	return $texts;
}

function alphabet_size($string) {
	return count(count_chars($string, 1));
}

function ascii_letters_of($string) {
	return array_keys(count_chars($string, 1));
}