<script type="text/javascript">
$(document).ready(function() {
	
		"use strict";
	
        var form_register_2 = $('#login-form');
        var error_register_2 = $('.alert-danger', form_register_2);
        var success_register_2 = $('.alert-success', form_register_2);

        form_register_2.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
				
                email: {
                    required: true,
                    email: true
                },				
                password: {
                    required: true,
					minlength: 6
                },
				
            },
			
			errorPlacement: function(error, element) {
				if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
					element.parent().append(error);
				} else if (element.parent().hasClass("vd_input-wrapper")){
					error.insertAfter(element.parent());
				}else {
					error.insertAfter(element);
				}
			}, 
			
            invalidHandler: function (event, validator) { //display error alert on form submit              
                error_register_2.fadeOut(500);
			    success_register_2.fadeOut(500);
            },

            highlight: function (element) { // hightlight error inputs
		
				$(element).addClass('vd_bd-red');
				$(element).parent().siblings('.help-inline').removeClass('help-inline hidden');
				if ($(element).parent().hasClass("vd_checkbox") || $(element).parent().hasClass("vd_radio")) {
					$(element).siblings('.help-inline').removeClass('help-inline hidden');
				}
				

            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            submitHandler: function (form) {
				
				$.ajax("seccion/login/controlador.php", {
				   "type": "post",   // usualmente post o get
				   "success": function(result) {
					 var Datos=jQuery.parseJSON(result);
					 if(result!=0){
						 if(result==-1){
							$("#errorMensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross" ></i></button><span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> El usuario ya se encuentra en linea, solo se permite una conexión. </div>');
						 }else{
							 if(Datos.eCodUsuario){
								$("#FotoUsuario").css('background-image','url(fotosUsuarios/'+Datos.tFoto+')');
								$("#llave").removeClass("icon-key");
								$(form).find('#login-submit').prepend('<i class="fa fa-spinner fa-spin mgr-10"></i>')/*.addClass('disabled').attr('disabled')*/;					
								success_register_2.show();
								$("#errorMensaje").html('');				
								setTimeout(function(){window.location.href = "index.php"},2000)	 ; 
							 }else{
								
								$("#FotoUsuario").css('background-image','');
								$("#llave").addClass("icon-key");
								
								$("#errorMensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross" ></i></button><span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Verifique que el usuario y contraseña sen correctos. </div>');
							 }
						 }
					 }else{
					 		$("#FotoUsuario").css('background-image','');
							$("#llave").addClass("icon-key");
							$("#errorMensaje").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross" ></i></button><span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Verifique que el usuario y contraseña sen correctos. </div>');
			   
					 }
				   },
				   "error": function(result) {
					 console.error("Este callback maneja los errores", result);
				   },
				   "data": {opcion: "ValidarCorreo",correo:$("#email").val(),password:$("#password").val(),recordar:$("#checkbox-1").prop("checked") ? true : false},
				   "async": true,
				});
				
				
								
            }
        });	
	
	
});
</script>