<?php

	class mHome extends Model{

		function __construct(){
			parent::__construct();
			
		}

		/*Realizamos sentencias SQL de login que retorna un 1 si es Admin, un 2 si es usuario normal y un 0 si no es valido*/
		function login($email,$password){
			try{
		     	$sql = "SELECT * FROM usuarios WHERE email=:email AND password=:password";
		     	$this -> query($sql);
		     	$this -> bind(":email",$email);
		     	$this -> bind(":password",$password);
		     	$this -> execute();
		     	$user = $this -> single();

			     if($this -> rowCount() == 1){
			     	//Session::set('user',new Username($user['email'],$user['rol'],$user['nombre'],$user['id_usuario']));
				    Session::set('islogged',TRUE);
				    if($user[0]['rol'] == 1){
				    	return 1;
				    }else{
				    	return 2;
			           //Session::set('user',new user($user['email'],$user['rol'],$user['nombre'],$user['id_usuario']));
				    }
			     }else{
			         Session::set('islogged',FALSE);
			          return 0;
			     }
		    }catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   }
		}
	}