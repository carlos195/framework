<?php

ini_set('display_errors','on');//activamos la comprobacion errores

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',realpath(dirname(__FILE__)).DS);

define('APP',ROOT.'app'.DS);
define('APP_W',basename($_SERVER['SCRIPT_NAME']));
define('BASE_URL',basename(dirname($_SERVER['SCRIPT_NAME'])));
//echo $_SERVER['REQUEST_URI'];

require 'sys/core.php';

Core::init();

?>