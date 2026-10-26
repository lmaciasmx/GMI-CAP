<?php
helper('captcha');
?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>Recuperación contraseña  | Invoiice</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Facturación electrónica, invoiice"
    />
    <meta name="author" content="invoiice" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?php echo base_url() ?>/assets/images/favicon.svg" type="image/x-icon" />
 <!-- [Google Font : Public Sans] icon -->
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
<!-- [phosphor Icons] https://phosphoricons.com/ -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/phosphor/duotone/style.css" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/tabler-icons.min.css" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/feather.css" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/fontawesome.css" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/material.css" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css" id="main-style-link" />
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style-preset.css" />
<link rel="stylesheet" type="text/css"href="<?php echo base_url()?>plugins/jquery-confirm-master/css/jquery-confirm.css"/>
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
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main v2">
      <div class="bg-overlay bg-dark"></div>
      <div class="auth-wrapper">
        <div class="auth-sidecontent"> <div class="auth-sidefooter">
  <img src="<?php echo base_url() ?>assets/images/logoLogin.svg" class="img-fluid" alt="images" />
  <hr class="mb-3 mt-4" />
  <div class="row">
    <div class="col my-1">
      <p class="m-0">Desarrollado por <a href="https://invoiice.com.mx" target="_blank"> Invoiice</a></p>
    </div>
    <div class="col-auto my-1">
      <ul class="list-inline footer-link mb-0">
<!--        <li class="list-inline-item"><a href="< ?php echo base_url() ?>/index.html">Home</a></li>-->
        <li class="list-inline-item"><a href="" target="_blank">Documentación</a></li>
        <li class="list-inline-item"><a href="https://wa.me/523133227637?text=Hola%20quiero%20más%20información" target="_blank">Soporte</a></li>
      </ul>
    </div>
  </div>
</div>
 </div>
        <div class="auth-form">
			
			  <div class="card my-5 mx-3">
				<div class="card-body" id="miCardBody1">
				 <form class="form-2"  method="post" role="form" id="register-form"  action="<?php echo base_url()?>Login/in03">
					<?= csrf_field() ?>
					<center> <img src="<?php echo base_url();?>assets/images/1.png" alt="images" class="img-fluid mb-3" style="width:75%"></center>
					<center><h4 class="f-w-500 mb-1">Recuperar Contraseña</h4>
				  <p class="mb-3">Regresar a <a href="../Login" class="link-primary">Iniciar Sesión</a></p></center>
				  <div class="mb-3">
					<label class="form-label">Correo electrónico</label>
					<input type="email" class="form-control" id="correor" name="correor" placeholder="Correo Electrónico" required>
				  </div>
				  <div class="mb-2 d-flex flex-column align-items-center">
					 <?= captcha_image() ?>

    					<input type="text" id="captcha" name="captcha" placeholder="Escribe el código" required class="form-control w-50 text-center mt-0">
					 
				  </div>
				 
				  
				  <div class="d-grid mt-4">
					<button type="submit" class="btn btn-primary">Enviar Correo</button>
				  </div>
					</form>
				</div>
			  </div>
			
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
	<script  src="https://code.jquery.com/jquery-3.7.1.js"  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
	<script src="https://cdn.jsdelivr.net/npm/jquery-easyui@1.5.21/js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>plugins/jquery-confirm-master/js/jquery-confirm.js"></script>  
	<link href="http://code.jquery.com/ui/1.14.1/themes/smoothness/jquery-ui.css" rel="Stylesheet">
	<script src="http://code.jquery.com/ui/1.14.1/jquery-ui.js" ></script>	
	<!-- Script de Google reCAPTCHA -->
<!--	<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
       
    <script>
      layout_change('light');
    </script>
       
    <script>
      layout_sidebar_change('light');
    </script>
      
    <script>
      change_box_container('false');
    </script>
     
    <script>
      layout_caption_change('true');
    </script>
       
    <script>
      layout_rtl_change('false');
    </script>
     
    <script>
      preset_change('preset-1');
    </script>
    
 <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
  <div class="offcanvas-header justify-content-between">
    <h5 class="offcanvas-title">Settings</h5>
    <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"
      ><i class="ti ti-x"></i
    ></button>
  </div>
  <div class="pct-body customizer-body">
    <div class="offcanvas-body py-0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="pc-dark">
            <h6 class="mb-1">Theme Mode</h6>
            <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
            <div class="row theme-color theme-layout">
              <div class="col-4">
                <div class="d-grid">
                  <button class="preset-btn btn active" data-value="true" onclick="layout_change('light');">

                    <span class="btn-label">Light</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button class="preset-btn btn" data-value="false" onclick="layout_change('dark');">
                    <span class="btn-label">Dark</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button
                    class="preset-btn btn"
                    data-value="default"
                    onclick="layout_change_default();"
                    data-bs-toggle="tooltip"
                    title="Automatically sets the theme based on user's operating system's color scheme."
                  >
                    <span class="btn-label">Default</span>
                    <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                      <i class="ph-duotone ph-cpu"></i>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item pc-sidebar-color">
          <h6 class="mb-1">Sidebar Theme</h6>
          <p class="text-muted text-sm">Choose Sidebar Theme</p>
          <div class="row theme-color theme-sidebar-color">
            <div class="col-6">
              <div class="d-grid">
                <button class="preset-btn btn" data-value="true" onclick="layout_sidebar_change('dark');">
                  <span class="btn-label">Dark</span>
                  <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button class="preset-btn btn active" data-value="false" onclick="layout_sidebar_change('light');">
                  <span class="btn-label">Light</span>
                  <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Accent color</h6>
          <p class="text-muted text-sm">Choose your primary theme color</p>
          <div class="theme-color preset-color">
            <a href="#!" class="active" data-value="preset-1"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-2"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-3"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-4"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-5"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-6"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-7"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-8"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-9"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-10"><i class="ti ti-check"></i></a>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Sidebar Caption</h6>
          <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
          <div class="row theme-color theme-nav-caption">
            <div class="col-6">
              <div class="d-grid">
                <button class="preset-btn btn active" data-value="true" onclick="layout_caption_change('true');">
                  <span class="btn-label">Caption Show</span>
                  <span class="pc-lay-icon"
                    ><span></span><span></span><span><span></span><span></span></span><span></span
                  ></span>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button class="preset-btn btn" data-value="false" onclick="layout_caption_change('false');">
                  <span class="btn-label">Caption Hide</span>
                  <span class="pc-lay-icon"
                    ><span></span><span></span><span><span></span><span></span></span><span></span
                  ></span>
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="pc-rtl">
            <h6 class="mb-1">Theme Layout</h6>
            <p class="text-muted text-sm">LTR/RTL</p>
            <div class="row theme-color theme-direction">
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn active" data-value="false" onclick="layout_rtl_change('false');">
                    <span class="btn-label">LTR</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn" data-value="true" onclick="layout_rtl_change('true');">
                    <span class="btn-label">RTL</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item pc-box-width">
          <div class="pc-container-width">
            <h6 class="mb-1">Layout Width</h6>
            <p class="text-muted text-sm">Choose Full or Container Layout</p>
            <div class="row theme-color theme-container">
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn active" data-value="false" onclick="change_box_container('false')">
                    <span class="btn-label">Full Width</span>
                    <span class="pc-lay-icon"
                      ><span></span><span></span><span></span><span><span></span></span
                    ></span>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button class="preset-btn btn" data-value="true" onclick="change_box_container('true')">
                    <span class="btn-label">Fixed Width</span>
                    <span class="pc-lay-icon"
                      ><span></span><span></span><span></span><span><span></span></span
                    ></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-grid">
            <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

  </body>
  <!-- [Body] end -->
</html>

<script type="text/javascript">
$(document).ready(function() {
		
	$('#register-form').form({
		onSubmit:function(){
			ShowS('miCardBody1');
		}, 
		success:function(data){
			HideS('miCardBody1');
			if(data==0){				
				$(".container" ).effect( "shake" );
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Correo Incorrecto',
					content: 'El usuario proporcionado no se encuentra dato de alta favor de verificarlo nuevamente o de reportarlo a soporte@invoiice.com.mx',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			
			if(data==1){
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'green',
					title: 'Éxito',
					content: '<center>Los datos de accesos fueron enviado de forma correcta, favor de verificar su cuenta de correo</center>',
					buttons:{
						cerrar: function(){
							window.open('../Login','_parent');
						}
					},
				});
			}
			if(data==2){
				$(".container" ).effect( "shake" );
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Reinicio de contraseña',
					content: 'Ocurrio un error al enviar sus datos, favor de intentarlo nuevamente',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			if(data==9){
				$(".container" ).effect( "shake" );
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Reinicio Contraseña',
					content: 'El usuario no cuenta con un correo registrado.',
					buttons: {
						cerrar: function () {
						}
					},
				});
			}
			if(data==5){
				$.confirm({
					boxWidth: '370px',
					useBootstrap: false,
					type:'red',
					typeAnimated: true,
					title: 'Error',
					content: '<center>CAPTCHA Incorrecta</center>',
					buttons: {
						cerrar: function () {
							$('#captcha-img').attr('src', '<?= site_url('captcha') ?>?' + Date.now());
							$("#captcha").val('');
						}
					},
				});
			}
		}
	});
	
	
	
});


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