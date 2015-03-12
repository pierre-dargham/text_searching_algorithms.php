<?php

if ( !defined('DEBUG') )
	define('DEBUG', true);

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ( !defined('DATA_DIR') )
	define('DATA_DIR', ABSPATH . '../data/');

set_time_limit(1000);