<?php

ini_set('display_errors','on');//activamos la comprobacion errores

error_reporting(E_ALL);

include 'config.php';
//echo $_SERVER['REQUEST_URI'];

require 'sys/helper.php';

Core::init();

?>