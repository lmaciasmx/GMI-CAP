<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GM Capital RH+ | Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0..1,0" />
        <link rel="icon" href="<?php echo base_url() ?>/assets/images/favicon.svg" type="image/x-icon" />

<link rel="stylesheet" type="text/css"href="<?php echo base_url()?>plugins/jquery-confirm-master/css/jquery-confirm.css"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
        /* Capa superpuesta azul con degradado sutil */
        .bg-overlay {
            background: linear-gradient(135deg, rgba(8, 51, 107, 0.88) 0%, rgba(0, 74, 153, 0.85) 100%);
        }
        /* Onda azul fluida de la izquierda */
        .wave-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 53%;
            height: 100%;
            background: #034285;
            background: linear-gradient(145deg, #023366 0%, #044b94 100%);
            clip-path: polygon(0 0, 82% 0, 100% 48%, 82% 100%, 0 100%);
            z-index: 2;
        }
        /* Pequeña onda decorativa en la esquina inferior izquierda */
        .sub-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 35%;
            height: 12%;
            background: #012245;
            clip-path: ellipse(80% 100% at 0% 100%);
            z-index: 3;
            opacity: 0.6;
        }
        /* Rotación sutil para el icono del ojo */
        .material-symbols-filled {
            font-variant-settings: 'FILL' 1;
        }
        /* Transición suave para el menú seleccionable */
        #system-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, border-color 0.2s;
        }
        #system-dropdown.open {
            max-height: 300px;
            border-color: #cbd5e1;
        }
    </style>
	<style>
	  
	  	[data-pc-direction=ltr] .bg-dark {
			--bs-bg-opacity: 1;
			background-color: rgb(0 0 0 / 70%) !important;
		}
		.card-body .loading-overlay {
		  position: absolute;
		  top: 0; left: 0;
		  width: 100%; height: 100%;
		  background: rgba(255, 255, 255, 0.7); /* Fondo semitransparente */
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  z-index: 10;
		}
		
	  </style>
</head>
<body class="w-full min-h-screen flex flex-col justify-between relative overflow-hidden bg-[#f4f7fa]">

    <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('https://www.grupomar.com/wp-content/uploads/2023/09/cover-video-grupomar.webp');">
        <div class="absolute inset-0 bg-overlay"></div>
    </div>

    <div class="wave-container hidden lg:block"></div>
    <div class="sub-wave hidden lg:block"></div>

    <div class="relative z-10 w-full min-h-screen max-w-[1280px] mx-auto px-6 lg:px-16 flex items-center justify-center lg:justify-between">
    
        <div class="hidden lg:flex lg:w-1/2 flex-col items-center lg:items-start text-white text-center lg:text-left select-none">
		
           <div class="flex items-center mb-2">
				<img 
					src="<?php echo base_url()?>/assets/images/LOGO2.png" 
					alt="GM Capital RH+ Logo"
					class="w-full max-w-[320px] object-contain drop-shadow-[0_6px_12px_rgba(0,0,0,0.45)]"
				/>
			</div>

            

            <div class="w-full max-w-[380px] h-[1.5px] bg-white/30 my-4"></div>

            <p class="text-lg lg:text-xl font-light text-slate-200 max-w-md leading-snug">
                Gestión inteligente de nuestro capital más importante: <span class="font-semibold text-white">las personas.</span>
            </p>

            <div class="flex items-center justify-between w-full max-w-[420px] mt-12 pt-6 border-t border-white/20">
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-3xl text-[#00b4d8] mb-2">group</span>
                    <span class="text-xs font-semibold tracking-wider uppercase text-slate-300">Talento</span>
                </div>
                <div class="w-[1px] h-8 bg-white/10"></div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-3xl text-[#00b4d8] mb-2">schedule</span>
                    <span class="text-xs font-semibold tracking-wider uppercase text-slate-300">Tiempo</span>
                </div>
                <div class="w-[1px] h-8 bg-white/10"></div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-3xl text-[#00b4d8] mb-2">analytics</span>
                    <span class="text-xs font-semibold tracking-wider uppercase text-slate-300">Eficiencia</span>
                </div>
                <div class="w-[1px] h-8 bg-white/10"></div>
                <div class="flex flex-col items-center">
                    <span class="material-symbols-outlined text-3xl text-[#00b4d8] mb-2">verified_user</span>
                    <span class="text-xs font-semibold tracking-wider uppercase text-slate-300">Confianza</span>
                </div>
            </div>
        </div>

        <div id="miCardBody1" class="w-full max-w-[480px] bg-white rounded-[32px] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] p-8 lg:p-11 border border-slate-100 mx-auto card-body">
		<div class="text-center mb-8">
    <h2 class="text-2xl lg:text-3xl font-bold text-slate-800 tracking-tight">Bienvenido a</h2>
    <h3 class="text-3xl lg:text-4xl font-extrabold text-[#023E7D] mt-1 font-montserrat">
        GM Capital <span class="text-[#0077b6]">RH+</span>
    </h3>
    <p class="text-sm text-[#64748B] font-normal mt-2.5 tracking-wide">Inicia sesión para continuar</p>
</div>

             <form class="form-2"  method="post" role="form" id="register-form"  action="<?php echo base_url()?>Login/in01">
				<input type="hidden" id="cSol" name="cSol" value="<?php echo $sol?>">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Correo electrónico</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xl">mail</span>
                        <input id="correo" name="correo" required type="email" placeholder="ejemplo@grupomar.com" 
                            class="w-full pl-11 pr-4 py-2.5 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700 placeholder-slate-400 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Contraseña</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock</span>
                        <input id="password" name="password" required type="password" placeholder="Ingresa tu contraseña" 
                            class="w-full pl-11 pr-10 py-2.5 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700 placeholder-slate-400 text-sm">
                        <span class="material-symbols-outlined absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xl cursor-pointer hover:text-slate-600">visibility</span>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Sistema</label>
                    <div class="relative">
                        <div id="dropdown-trigger" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl flex items-center justify-between bg-white text-slate-500 cursor-pointer select-none text-sm transition-all">
                            <div class="flex items-center gap-2.5">
                                <span class="material-symbols-outlined text-xl text-slate-400">apps</span>
                                <span id="selected-text">Selecciona un sistema</span>
                            </div>
                            <span id="chevron-icon" class="material-symbols-outlined text-xl text-slate-400 transition-transform">expand_more</span>
                        </div>
                        
                        <div id="system-dropdown" class="absolute left-0 right-0 mt-1 bg-white border border-transparent rounded-xl shadow-lg z-20 divide-y divide-slate-100">
    
							<div class="p-3.5 flex items-center gap-4 hover:bg-slate-50 cursor-pointer transition-colors option-item" data-value="17" data-value2="GM Reclutamiento+">
								<div class="bg-[#0056b3] text-white w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
									<span class="material-symbols-outlined text-xl">person_search</span>
								</div>
								<div class="flex-1 min-w-0">
									<h4 class="text-sm font-bold text-slate-800 leading-tight">GM Reclutamiento+</h4>
									<p class="text-xs text-slate-400 mt-0.5 truncate">Sistema de reclutamiento y selección</p>
								</div>
							</div>
							
							<div class="p-3.5 flex items-center gap-4 hover:bg-slate-50 cursor-pointer transition-colors option-item" data-value="16" data-value2="GM Tiempo Extra+">
								<div class="bg-[#14b8a6] text-white w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
									<span class="material-symbols-outlined text-xl">schedule</span>
								</div>
								<div class="flex-1 min-w-0">
									<h4 class="text-sm font-bold text-slate-800 leading-tight">GM Tiempo Extra+</h4>
									<p class="text-xs text-slate-400 mt-0.5 truncate">Sistema de tiempo extra y control de horas</p>
								</div>
							</div>

						</div>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs pt-4">
                    <label class="flex items-center gap-2 text-slate-500 cursor-pointer select-none">
						<input type="checkbox" class="w-4 h-4 rounded-md border-slate-300 text-[#023E7D] focus:ring-[#023E7D] focus:ring-offset-0 appearance-none checked:bg-[#023E7D] checked:border-[#023E7D] border bg-white transition-colors relative checked:after:content-['✓'] checked:after:absolute checked:after:text-white checked:after:text-[10px] checked:after:font-bold checked:after:left-[3px] checked:after:top-[-1px]">
						Recordarme en este dispositivo
					</label>
                    <a href="#" class="text-[#023E7D] font-semibold hover:underline">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="w-full bg-[#023E7D] hover:bg-[#012a55] text-white font-semibold py-3 rounded-xl shadow-md transition-colors flex items-center justify-center gap-2 mt-4 text-sm">
                    <span class="material-symbols-outlined text-lg">lock</span>
                    Iniciar sesión
                </button>
				<input type="hidden" id="sistema" name="sistema" value="0">
            </form>

            <div class="mt-8 pt-5 border-t border-slate-100 text-center text-[13px]">
    <p class="text-[#64748B] font-medium tracking-wide">¿Necesitas ayuda?</p>
    <p class="text-[#334155] mt-1.5 font-normal">
        Contacta al área de Sistemas o <a href="#" class="text-[#023E7D] font-bold hover:underline ml-0.5">Soporte RH</a>
    </p>
</div>
        </div>
    </div>

    <div class="relative z-10 w-full text-center py-4 text-xs text-slate-400/80 bg-white/5 lg:bg-transparent lg:text-slate-400 border-t border-white/5 lg:border-none">
        © 2026 Grupomar. Todos los derechos reservados.
    </div>
<script  src="<?php echo base_url() ?>/assets/js/jquery-3.7.1.js"  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="  crossorigin="anonymous"></script>
	<script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/i18next.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/i18nextHttpBackend.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/icon/custom-font.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/theme.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/multi-lang.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/feather.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>plugins/jquery-confirm-master/js/jquery-confirm.js"></script>  
	<link href="<?php echo base_url() ?>/assets/css/jquery-ui.css" rel="Stylesheet">
	<script src="<?php echo base_url() ?>/assets/js/jquery-ui.js" ></script>	
    <script>
        const trigger = document.getElementById('dropdown-trigger');
        const dropdown = document.getElementById('system-dropdown');
        const chevron = document.getElementById('chevron-icon');
        const selectedText = document.getElementById('selected-text');
        const options = document.querySelectorAll('.option-item');

        // Alternar apertura y cierre al pulsar el selector
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = dropdown.classList.contains('open');
            if (isOpen) {
                closeDropdown();
            } else {
                dropdown.classList.add('open');
                chevron.style.transform = 'rotate(180deg)';
                trigger.classList.add('border-blue-500', 'ring-2', 'ring-blue-100');
            }
        });

        // Escuchar selección de las opciones
        options.forEach(option => {
            option.addEventListener('click', () => {
                const value = option.getAttribute('data-value2');
                selectedText.innerText = value;
                selectedText.classList.remove('text-slate-500');
                selectedText.classList.add('text-slate-800', 'font-medium');
                closeDropdown();
            });
        });

        // Cerrar si se hace clic afuera
        document.addEventListener('click', () => {
            closeDropdown();
        });

        function closeDropdown() {
            dropdown.classList.remove('open');
            chevron.style.transform = 'rotate(0deg)';
            trigger.classList.remove('border-blue-500', 'ring-2', 'ring-blue-100');
        }
    </script>
	<script type="text/javascript">
		$('.option-item').on('click', function () {
			$('.option-item').removeClass('selected');
			$(this).addClass('selected');
			console.log('Seleccionado:', $(this).data('value'));
			$("#sistema").val($(this).data('value'));
			
		});
		$(document).ready(function() {
				
			$('#register-form').form({
				onSubmit:function(){
					 const selectedOption = document.querySelector('.option-item.selected');

					if (!selectedOption) {

						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'red',
							typeAnimated: true,
							title: 'Alerta',
							content: '<center>Selecciona el sistema o módulo al que deseas registrarte.</center>',
							buttons: {
								cerrar: function () {
								}
							},
						});

						return false; // evita enviar el formulario
					}

					console.log('Seleccionado:', selectedOption.dataset.value);

					return true;
				}, 
				success:function(data){
					if(data==0){
						
						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'red',
							typeAnimated: true,
							title: 'Usuario o contraseña incorrecto',
							content: '<center>Verifique que sus datos esten bien. Si el problema persiste favor de reportarlo a soporte@grupomar.com</center>',
							buttons: {
								cerrar: function () {
								}
							},
						});
					}
					
					if(data==1){
						window.open('panel/inicio','_parent');
					}
					if(data==2){
						const selectedOption = document.querySelector('.option-item.selected');
						alert(selectedOption.dataset.value);
						return false;
						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'red',
							typeAnimated: true,
							title: 'Código de Activación',
							content: '<div id="miCardBody2"><center>Ingresa tú código de confirmación, esta información fué enviada al correo proporcionado cuando realizaste tú registro<br><br><input type="text" id="verificacion" name="verificacion" style="height: 39px; width: 250px;  font-size: 16px; text-align: center;   color: #4a4949;   font-family: Arial,Helvetica,sans-serif; font-weight: bold;" class="form-control"><a style="color: #fb20a1; cursor: pointer; text-decoration: underline;" onclick="renCode();">Reenviar Código de Activación<a/></center><div>',
							buttons: {
								enviar: function () {
									ShowS('miCardBody2');
									if($("#verificacion").val()!=''){
										
										var parametros='email='+$("#correo").val()+'&password='+$("#password").val()+'&verificacion='+$("#verificacion").val()+'&sistema='+selectedOption.dataset.value;
										 $.ajax({
												type:"POST",
												url: "<?php echo base_url().'Login/in02';?>",
												cache: false,
												async: true,
												dataType: 'html',
												data:parametros,
												success:function(html){
													if(html==1){
														//window.open('panel/inicio','_parent');
													}else{
														HideS('miCardBody2');
														$.confirm({
															boxWidth: '370px',
															useBootstrap: false,
															type:'red',
															typeAnimated: true,
															title: 'Código Incorrecto',
															content: '<center>código de verificación incorrecto, favor de verificar este dato, te recomendamos copiar y pegar</center>',
															buttons: {
																cerrar: function () {
																}
															},
														});
													}
												}
										});
									}else{
										HideS('miCardBody2');
										$(".container" ).effect( "shake" );
										$.confirm({
											boxWidth: '370px',
											useBootstrap: false,
											type:'red',
											typeAnimated: true,
											title: 'Alerta',
											content: 'El Código de activación es incorrecto.',
											buttons: {
												cerrar: function () {
												}
											},
										});
										return false;


									}
								},
								cerrar: function () {
								}
							},
						});
					}
					if(data==3){
						
						$.confirm({
							boxWidth: '370px',
							useBootstrap: false,
							type:'red',
							typeAnimated: true,
							title: 'Error no controlado',
							content: '<center>Ocurrio un error al intentar iniciar sesión</center>',
							buttons: {
								cerrar: function () {
								}
							},
						});
					}
					
				}
			});
			
			
			
		});

		function renCode(){
			
			var c=$("#correo").val();
			$.confirm({
				boxWidth: '370px',
				useBootstrap: false,
				type:'red',
				typeAnimated: true,
				title: 'Reenvío de Código de Activación',
				content: '<center>Se enviará un código de Activación al correo registrado, favor de verificar en su bandeja de entrada o SPAM, si aún no recibe ningun código le pedimos se ponga en contacto a soporte@grupomar.com <br><br><input type="text" id="correoreenvio" name="correoreenvio" style="height: 39px; width: 250px;  font-size: 16px; text-align: center;   color: #4a4949;   font-family: Arial,Helvetica,sans-serif; font-weight: bold;" readonly value="'+c+'" class="form-control"></center>',
				buttons: {
					enviar: function () {
						 ShowS('miCardBody2');
						 var parametros='email='+$("#correoreenvio").val();
						 $.ajax({
							type:"POST",
							url: "<?php echo base_url().'Registro/getCodigoReenvio';?>",
							cache: false,
							async: true,
							dataType: 'html',
							data:parametros,
							success:function(html){
								if(html==1){
									HideS('miCardBody2');
									$.confirm({
										boxWidth: '370px',
										useBootstrap: false,
										type:'green',
										typeAnimated: true,
										title: 'Código de Activación',
										content: '<center>El código de activación fue enviado al correo proporcionado de manera correcta, favor de verificar su bandeja de correo electrónico, recomendamos revisar en correo no deseados en ocasiones algunas cuentas son bloqueadas!. </center>',
										buttons: {
											cerrar: function () {
											}
										},
									});
								}
								if(html==0){
									HideS('miCardBody2');
									$.confirm({
										boxWidth: '370px',
										useBootstrap: false,
										type:'red',
										typeAnimated: true,
										title: 'Alerta de sistema',
										content: '<center>Upss algo salió mal, favor de intentar de nuevo, si el problema persiste favor de ponerse en contacto con el área de soporte!. </center>',
										buttons: {
											cerrar: function () {
											}
										},
									});
								}
								if(html==2){
									HideS('miCardBody2');
									$.confirm({
										boxWidth: '370px',
										useBootstrap: false,
										type:'red',
										typeAnimated: true,
										title: 'Alerta de sistema',
										content: '<center>El correo proporcionado no se encuentra registrado en nuestra base de datos, verifica que lo estes ingresando bien. </center>',
										buttons: {
											cerrar: function () {
											}
										},
									});
								}
							}
						});
					},
					cerrar:function(){

					}
				}
			});
		}
		function ShowS(ID) {
		  const cardBody = document.getElementById(ID);
		  const overlay = document.createElement('div');
		  overlay.classList.add('loading-overlay');
		  overlay.innerHTML = `
			<div class="spinner-border text-primary" role="status">
			  <span class="visually-hidden">Cargando...</span>
			</div>
		  `;
		  cardBody.appendChild(overlay);
		}

		function HideS(ID) {
		  const cardBody = document.getElementById(ID);
		  const overlay = cardBody.querySelector('.loading-overlay');
		  if (overlay) {
			overlay.remove();
		  }
		}
		</script>
</body>
</html>