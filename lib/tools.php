<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                algorithms.php
 * Description:         Various functions for POST parameters and HTML-JS rendering
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

function check_post($post) {
	if(!isset($post['needle']) || empty($post['needle'])) {
		return false;
	}
	if(!isset($post['algorithm']) || empty($post['algorithm'])) {
		return false;
	}
	if(!isset($post['source']) || empty($post['source'])) {
		return false;
	}

	if ($post['source'] == 'lorem_ipsum') {
		return lorem_ipsum();
	}
	else if ( $post['source'] == 'user_text' && isset($post['user_text']) && !empty($post['user_text']) ) {
		return $post['user_text'];
	}
	else {
		return false;
	}
}

function colorize_results($pattern, $text, $positions, $size_word) {

	//if(empty($positions)) {
	//	return $text;
	//}

	$style_offset = 0;
	$style_len = strlen(COLORIZE_START) + strlen(COLORIZE_END);
	$result = COLORIZE_START . $pattern . COLORIZE_END;

	foreach($positions as $position) {
		$text = substr_replace ($text, $result, $position + $style_offset, $size_word);
		$style_offset += $style_len;
	}

	return $text;
}

function was_found($needle, $positions) {
    return was_found_n($needle, count($positions));
}

function was_found_n($needle, $nb_results) {
    if( $nb_results < 1) {
       return '<span class="not-found"><i>' . $needle . '</i> was not found' . '</span><br />';
    }
    else {
        return '<span class="found"><i>' . $needle . '</i> was found ' . $nb_results . ' times </span> <br />';
    }
}

function get_js_series($search_results) {
	$series = '';
	foreach($search_results as $algo => $results) {
	    $serie = '';
	    foreach($results['times'] as $len => $time) {
	            $serie .= $time . ', ';
	    }
	    $series .=        '{
	                    name: \''.$algo.'\',
	                    data: ['.$serie.']
	                }, ';
	}
	return $series;
}

function get_js_categories($haystacks) {
	$categories = '';
	foreach($haystacks as $len => $text) {
	    $categories .= '\'' . $len . '\', ';
	}
	return $categories;
}