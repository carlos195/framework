$(document).ready(function(){
	console.log("ready!");

	 $('.form-log').on('submit',function(){
	     console.log('click');
	     var postData = $(this).serialize();
	     var formURL = $(this).attr("action");
	     $.ajax({
	       url:formURL,
	       data:postData,
	       method:'post',
	       dataType:'json',
	       /*beforeSend: function(){
	           //loading_trans();
	       },*/
	       error: function(){
	          show_mesg('Error inici de sessió');
	       },
	       success: function(output){
	          console.log(output);
	          window.location.href=output.redirect; 
	       }
	    });
	    return false;
 	 });

	 $('.form-reg').on('submit',function(){
	     console.log('click');
	     var postData = $(this).serialize();
	     var formURL = $(this).attr("action");
	     $.ajax({
	       url:formURL,
	       data:postData,
	       method:'post',
	       dataType:'json',
	       beforeSend: function(){
	           //loading_trans();
	       },
	       error: function(){
	          show_mesg('Error registro');
	       },
	       success:function(output){
	          console.log(output);
	          window.location.href=output.redirect; 
	       }
	    });
	    return false;
 	 });

	 $("#form-delete").on('click',function(){
	 	  $('.form-admin').on('submit',function(){
			     var postData = $(this).serialize();
			     $.ajax({
			       url:"../M-master/admin/deleteuser",
			       data:postData,
			       method:'post',
			       dataType:'json',
			       success:function(output){
			          window.location.href=output.redirect; 
			       }
			    });
	 	 });
 	  });

	 var pathname = window.location.pathname;
	 aux_path = pathname.split('/');
	 
	 if(aux_path[aux_path.length-1] == 'admin'){
	     var postData = $(this).serialize();
	     $.ajax({
	       url:"../M-master/admin/listuser",
	       data:postData,
	       method:'post',
	       dataType:'json',
	       success:function(output){
	       	var tipo, poblacion;

	          for(i = 0; i < output.length; i++){
		          	if(output[i]['rol'] == 1){
		          		tipo = "Administrador";
		          	}else{
		          		tipo = "Usuario";
		          	}

		          	if(output[i]['poblacion'] == 1){
		          		poblacion = "Gava";
		          	}else if(output[i]['poblacion'] == 2){
		          		poblacion = "Viladecans";
		          	}else if(output[i]['poblacion'] == 4){
		          		poblacion = "Castelldefels";
		          	}else if(output[i]['poblacion'] == 5){
		          		poblacion = "Sitges";
		          	}else if(output[i]['poblacion'] == 6){
		          		poblacion = "Sant Boi";
		          	}

	          		$(".form-user").append("<tr><td>"+output[i]['id_usuario']+"</td><td>"+output[i]['email']+"</td><td>"+output[i]['nombre']+"</td><td>"+poblacion+"</td><td>"+tipo+"</td><td><input type='checkbox' name='usuario[]' value='"+output[i]['id_usuario']+"' /></td></tr>");
	      	  }
	      	  $(".form-user").append("<tr style='text-align:center;background-color:rgba(32,32,32,0.8);color:rgba(244,244,244,1);'><td style='text-align:end;' colspan='5'><input type='button' id='admin-todos' value='Seleccionar todos' /></td><td><input type='button' id='admin-quitar' value='Quitar todos' /></td></tr>");
		       	  
		       	  $("#admin-todos").on('click',function(){
						$('input[type=checkbox]').each(function(){ 
							this.checked = true; 
						});
				  });
				  $("#admin-quitar").on('click',function(){
						$('input[type=checkbox]').each(function(){ 
							this.checked = false; 
						});
				  });
	       }
	    });
	}

$("#form-insert").on('click',function(){
 	 $(".form-admin div label").remove();
 	 $(".form-admin div input").remove();
 	 $(".form-admin div select").remove();
 	 $(".form-admin div").append("<label>Email* </label><input type='text' name='newemail' /><label> Nombre* </label><input type='text' name='newnombre' /><label> Contraseña* </label><input type='text' name='newpassword' /><label> Poblacion* </label><select name='newpoblacion'><option value=''>Selecciona</option><option value='Gava'>Gava</option><option value='Viladecans'>Viladecans</option><option value='Castelldefels'>Castelldefels</option><option value='Sitges'>Sitges</option><option value='Sant Boi'>Sant Boi</option></select><label> Permisos* </label><select name='newrol'><option value=''>Selecciona</option><option value='administrador'>Administrador</option><option value='usuario'>Usuario</option></select><input type='submit' id='adduser' value='Añadir' /><input type='button' id='form-del' value='Cancelar' />");

	 $('.form-admin').on('submit',function(){
		     var postData = $(this).serialize();
		     $.ajax({
		       url:"../M-master/admin/newuser",
		       data:postData,
		       method:'post',
		       dataType:'json',
		       success:function(output){
		          window.location.href=output.redirect; 
		       }
		    });
	    //return false;
 	 });

 	 $("#form-del").on('click',function(){
		$(".form-admin div label").remove();
 		$(".form-admin div input").remove();
 		$(".form-admin div select").remove();
	 });
});

$("#form-update").on('click',function(){
 	 $(".form-admin div label").remove();
 	 $(".form-admin div input").remove();
 	 $(".form-admin div select").remove();
 	 $(".form-admin div").append("<label>Email </label><input type='text' name='upemail' /><label> Nombre </label><input type='text' name='upnombre' /><label> Permisos </label><select name='uprol'><option value=''>Selecciona</option><option value='administrador'>Administrador</option><option value='usuario'>Usuario</option></select><input type='submit' id='update' value='Actualizar' /><input type='button' id='form-del' value='Cancelar' />");
 	 
 	 $('.form-admin').on('submit',function(){
		     var postData = $(this).serialize();
		     $.ajax({
		       url:"../M-master/admin/updateuser",
		       data:postData,
		       method:'post',
		       dataType:'json',
		       success:function(output){
		          window.location.href=output.redirect; 
		       }
		    });
	    //return false;
 	 });

 	 $("#form-del").on('click',function(){
		$(".form-admin div label").remove();
 		$(".form-admin div input").remove();
 		$(".form-admin div select").remove();
	 });
});

$("#link-sesion").on('click',function(){
	$(".form-reg").hide(200);
	$(".form-log").toggle(200);
});

$("#link-registro").on('click',function(){
	$(".form-log").hide(200);
	$(".form-reg").toggle(200);
});

var show_mesg = function(str){
	$('body').append('<div class="message">' + str + '<div>');
	setTimeout(function(){
		$('.message').remove();
	},5000);
}

});