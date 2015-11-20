<?php

class Request{

	static private $query=array();

	static function retrieve(){
		$array_query=explode('/',$_SERVER['REQUEST_URI']);
		array_shift($array_query); //extraemos el primer "/"
		
		if($array_query[0]==APP_W){ //en caso de root
			array_shift($array_query);
		}

		if(end($array_query)==""){ //quitamos espacios en blanco del final
			array_pop($array_query);
		}

		self::$query=$array_query; //retorna valor a stati $query
		var_dump($array_query);
	}

	static function getCont(){
		return array_shift(self::$query);
	}

	static function getAct(){
		return array_shift(self::$query);
	}

	static function getParams(){
		if(count(self::$query) > 0){
			return self::$query;
		}else{
			echo ('error');
		}
	}

}

?>