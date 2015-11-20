<?php
	require 'sys/request.php';
	class Core{

		static function init(){

			//echo CORE arranca app;
				//echo $_SERVER['REQUEST_URI'];
				Request::retrieve();
				$controller=Request::getCont();
				//echo $controller.'<br>';
				Coder::code($controller);
				die;
				$action=Request::getAct();
				//echo $action.'<br>';
				Coder::code($action);
				$params=Request::getParams();
				//print_r($params);
				Coder::codear($params);
		}
	}