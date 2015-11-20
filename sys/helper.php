<?php

	spl_autoload_register(null,false);
	spl_autoload_register('MAutoload::SysLoader');

	class MAutoload{

		static function SysLoader($class){
			$filename=strtolower($class).'.php';//buscara el fichero en minuscula "request.php" y no "REQueST.php"
			$file=ROOT.'sys'.DS.$filename;
			if(!file_exists($file)){
				return false;
			}
			require $file;
		}
	}

	/**
	 *
	 * Coder
	 * makes var_dump easy
	 * @author Carlos
	 *
	 * */

	class Coder{
		static function code($var){
			echo '<pre>'.$var.'</pre>';
		}	

		static function codear($var){
			echo '<pre>'.var_dump($var).'</pre>';
		}
	}