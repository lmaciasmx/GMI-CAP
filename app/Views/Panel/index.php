<?php

$CI2=new App\Models\MSis();
$session=session();

?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>GM Capital+ </title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="Capital RH Grupomar"
      content="Capital RH Grupomar"
    />
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.svg" type="image/x-icon" />
 <!-- [Google Font : Public Sans] icon -->
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
<!-- [phosphor Icons] https://phosphoricons.com/ -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/fonts/phosphor/duotone/style.css" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/fonts/tabler-icons.min.css" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/fonts/feather.css" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/fonts/fontawesome.css" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/fonts/material.css" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css" id="main-style-link" />
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style-preset.css" />
<link rel="stylesheet" type="text/css"href="<?php echo base_url()?>plugins/jquery-confirm-master/css/jquery-confirm.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
.pc-sidebar .m-header {
    height: 74px;
    display: flex;
    align-items: center;
    padding: 40px 61px;
}
.pc-sidebar {
    background: #023f81;
    width: 280px;
    position: fixed;
    top: 0;
    bottom: 0;
    z-index: 1026;
    overflow: hidden;
    box-shadow: var(--pc-sidebar-shadow);
    border-right: var(--pc-sidebar-border);
}
.pc-sidebar .card.pc-user-card {
    background: #023f81;
    margin: 0;
    box-shadow: none;
    border-radius: 0px;
    border-top: 1px solid var(--pc-sidebar-submenu-border-color);
}
</style>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body class="layout-3" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  
   <div     
   id="exampleModalLive"                      
   class="modal fade"                      
   tabindex="-1"                      
   role="dialog"   
   aria-labelledby="exampleModalLiveLabel">
   </div>
	  
	  <div     
   id="exampleModalLive2"                      
   class="modal fade"                      
   tabindex="-1"                      
   role="dialog"   
   aria-labelledby="exampleModalLiveLabel2">
   </div>
	  
	 <div     
   id="exampleModalLive3"                      
   class="modal fade"                      
   tabindex="-1"                      
   role="dialog"   
   aria-labelledby="exampleModalLiveLabel3">
   </div>
	  
	 <div     
   id="exampleModalLive4"                      
   class="modal fade"                      
   tabindex="-1"                      
   role="dialog"   
   aria-labelledby="exampleModalLiveLabel4">
   </div>
	  
	<div     
   id="exampleModalLive5"                      
   class="modal fade"                      
   tabindex="-1"                      
   role="dialog"   
   aria-labelledby="exampleModalLiveLabel5">
   </div>
   
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../Panel/inicio" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="<?php echo base_url()?>assets/images/logotime.png" alt="logo image" class="logo-lg" />
       
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label data-i18n="MENU PRINCIPAL">Menu Principal</label>
          <i class="ph-duotone ph-gauge"></i>
        </li>
        <?php if( $session->eCodRol=='537' || $session->eCodRol=='539' || $session->eCodRol=='540'){?>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-gauge"></i>
            </span>
            <span class="pc-mtext" data-i18n="Tiempo Extra">Tiempo Extra</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            
            </a>
            <ul class="pc-submenu">
            <li style="cursor:pointer;" class="pc-item"><a onClick="CargaSeccion(1)" class="pc-link"  data-i18n="Solicitudes">Solicitudes</a></li>
            
            </ul>
          </li>
        <?php }?>
        <?php if($session->eCodRol=='539' || $session->eCodRol=='540'){?>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-gauge"></i>
            </span>
            <span class="pc-mtext" data-i18n="Reportes">Reportes</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            
            </a>
            <ul class="pc-submenu">
              <li style="cursor:pointer;" class="pc-item"><a onClick="CargaSeccion(6)" class="pc-link"  data-i18n="Semanal">Semanal</a></li>
            <li style="cursor:pointer;" class="pc-item"><a onClick="CargaSeccion(2)" class="pc-link"  data-i18n="Semanal WB">Semanal WB</a></li>
            <li style="cursor:pointer;" class="pc-item"><a onClick="CargaSeccion(3)" class="pc-link"  data-i18n="Dirección WB">Dirección WB</a></li>
            <li style="cursor:pointer;" class="pc-item"><a onClick="CargaSeccion(4)" class="pc-link"  data-i18n="Resumen Acumulados WB">Resumen Acumulados WB</a></li>
            </ul>
          
          </li>
        <?php }?>
        <?php if($session->eCodRol=='540'){?>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
            <span class="pc-micon">
              <i class="ph-duotone ph-gauge"></i>
            </span>
            <span class="pc-mtext" data-i18n="Procesos">Procesos</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            
            </a>
            <ul class="pc-submenu">
            <li style="cursor:pointer;" class="pc-item"><a onClick="CargaSeccion(5)" class="pc-link"  data-i18n="Envio de Incidencias">Envio de Incidencias</a></li>
            </ul>
          
          </li>
        <?php }?>
        <?php if ((int)$session->eCodRol === 542) { ?>

          <li class="pc-item pc-hasmenu">

            <a href="#!" class="pc-link">
              <span class="pc-micon">
                <i class="ph-duotone ph-users-three"></i>
              </span>

              <span class="pc-mtext" data-i18n="Reclutamiento">
                Reclutamiento
              </span>

              <span class="pc-arrow">
                <i data-feather="chevron-right"></i>
              </span>
            </a>

            <ul class="pc-submenu">

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(20)" class="pc-link">
                  Dashboard
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(21)" class="pc-link">
                  Solicitudes
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(22)" class="pc-link">
                  Candidatos
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(23)" class="pc-link">
                  Agenda
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(24)" class="pc-link">
                  Seguimiento
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(25)" class="pc-link">
                  Vacantes
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(26)" class="pc-link">
                  Transporte
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(27)" class="pc-link">
                  Catálogos
                </a>
              </li>

              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(28)" class="pc-link">
                  Reportes
                </a>
              </li>
              <li style="cursor:pointer;" class="pc-item">
                <a onClick="CargaSeccion(29)" class="pc-link">
                  Conversaciones
                </a>
              </li>
            </ul>

          </li>

          <?php } ?>

      </ul>
     
    </div>
    <div class="card pc-user-card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
            <img src="<?php echo base_url()?>/assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle" />
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="dropdown">
              <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                <div class="d-flex align-items-center">
                  <div class="flex-grow-1 me-2">
                    <h6 class="mb-0"><?php echo substr(($session->Usuario), 0, -12)?></h6>
                    <small><?php echo $session->email?></small>
                  </div>
                  <div class="flex-shrink-0">
                    <div class="btn btn-icon btn-link-secondary avtar">
                      <i class="ph-duotone ph-windows-logo"></i>
                    </div>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu">
                <ul>
                  
                  <li>
                    <a class="pc-user-links">
                      <i class="ph-duotone ph-gear"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  
                  <li>
                    <a class="pc-user-links" onClick="ClosedS();">
                      <i class="ph-duotone ph-power" ></i>
                      <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->
 <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
   <li class="pc-h-item d-none d-md-inline-flex">
	  <div class="d-flex align-items-center gap-3">
		
	   

		<!-- Texto bienvenida -->
		<div class="d-flex flex-column">
		  <span class="fw-bold text-dark" style="font-size: 24px;">
		
		  </span>

		 
		</div>

	  </div>
	</li>
   
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <!--<li class="dropdown pc-h-item d-none d-md-inline-flex">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph-duotone ph-sun-dim"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
          <i class="ph-duotone ph-moon"></i>
          <span>Dark</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
          <i class="ph-duotone ph-sun-dim"></i>
          <span>Light</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change_default()">
          <i class="ph-duotone ph-cpu"></i>
          <span>Default</span>
        </a>
      </div>
    </li>-->
   
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <img src="<?php echo base_url()?>/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Profile</h5>
        </div>
        <div class="dropdown-body">
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
            <ul class="list-group list-group-flush w-100">
              <li class="list-group-item">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <img src="<?php echo base_url()?>assets/images/user/avatar-2.jpg" alt="user-image" class="wid-50 rounded-circle" />
                  </div>
                  <div class="flex-grow-1 mx-2">
					  <span class="badge bg-primary"><?php echo (($session->Compania))?></span>
                    <h6 class="mb-0"><?php echo ($session->Usuario)?></h6>
                    <a class="link-primary" href="mailto:<?php echo $session->email?>"><?php echo $session->email?></a>
                  </div>
                
                </div>
              </li>
              <li class="list-group-item">
                <a onClick="ClosedS();" style="cursor: pointer" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-power"></i>
                    <span>Cerrar Sesión</span>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </li>
  </ul>
</div>
 </div>
</header>
<!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <!--<div class="pc-submenu-list-wrapper">
        <ul class="pc-submenu-list list-unstyled mb-0">
          <li><a class="active" href="#">Compact</a></li>
          <li><a href="#">Creative</a></li>
          <li><a href="#">Horizontal</a></li>
          <li><a href="#">Tab</a></li>
          <li><a href="#">Vertical</a></li>
          <li><a href="#">Layout 3</a></li>
        </ul>
      </div>-->

      <div class="pc-content" id="ContenidoSeccion">
        
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        
        <!-- [ Main Content ] end -->
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
      <div class="footer-wrapper container-fluid">
        <div class="row">
          <div class="col-sm-6 my-1">
            <p class="m-0">Desarrollado por Grupomar</a></p>
          </div>
          <div class="col-sm-6 ms-auto my-1">
            <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
              <li class="list-inline-item"><a href="../index.html">Home</a></li>
              <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
              <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
 <!-- Required Js -->
<script  src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="  crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/simplebar.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/js/plugins/i18next.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/i18nextHttpBackend.min.js"></script>
<script src="<?php echo base_url()?>assets/js/multi-lang.js"></script>
<script src="<?php echo base_url()?>assets/js/icon/custom-font.js"></script>
<script src="<?php echo base_url()?>assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/theme.js"></script>

<script src="<?php echo base_url()?>assets/js/plugins/feather.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>plugins/jquery-confirm-master/js/jquery-confirm.js"></script>

<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="Stylesheet">
<script src="<?php echo base_url() ?>assets/js/jquery-ui.js" ></script>	  
<script src="<?php echo base_url()?>assets/js/plugins/choices.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/dataTables.bootstrap5.min.js"></script>

<script src="<?php echo base_url()?>assets/js/plugins/apexcharts.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/datepicker-full.min.js"></script>
<!--<script src="< ?php echo base_url() ?>/js/ag-grid-community.min.noStyle.js"></script>
<script src="< ?php echo base_url() ?>/js/fancybox.umd.js"></script>-->

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>  
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
<input type="hidden" id="sistema" name="sistema" value="<?php echo $session->sistema?>">
<input type="hidden" id="cSol" name="cSol" value="<?php echo $session->cSol?>">
    <script>
      layout_sidebar_change('dark');
    </script>
	<script>

$(document).ready(function() {
	if($("#sistema").val()==16){
		CargaSeccion(1);
	}
  /*if($("#cSol").val()>0){
		muestraSolicitud($("#cSol").val());
	}*/

});
function CargaSeccion(seccion){
	
	if(seccion==1){
		
		
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/inicio",
		   dataType: 'html',
		   success:function(html){
			   $("#ContenidoSeccion").html(html);
			  // $("#carga").css("display",'none');
			  // MostrarMenuMapaFinal(seccion);
			  // botones(seccion);
		   }
		});
	}
	if(seccion==2){
		
		
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/reportes/reporte01",
		   dataType: 'html',
		   success:function(html){
			   $("#ContenidoSeccion").html(html);
			 
		   }
		});
	}
	if(seccion==3){
		
		
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/reportes/reporte02",
		   dataType: 'html',
		   success:function(html){
			   $("#ContenidoSeccion").html(html);
			 
		   }
		});
	}
	if(seccion==5){
		
		
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>procesos/inicio/generaTiempo",
		   dataType: 'html',
		   success:function(html){
			   $("#ContenidoSeccion").html(html);
			 
		   }
		});
	}
	if(seccion==6){
		
		
		$.ajax({
		   type:"POST",
		   url: "<?php echo base_url()?>tiempoextra/reportes/reporte06",
		   dataType: 'html',
		   success:function(html){
			   $("#ContenidoSeccion").html(html);
			 
		   }
		});
	}
	if(seccion==20){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/dashboard",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==21){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/solicitudes",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==22){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/candidatos",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==23){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/agenda",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==24){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/seguimiento",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==25){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/vacantes",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==26){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/transporte",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==27){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/catalogos",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}

	if(seccion==28){

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>reclutamiento/reportes",
			dataType: 'html',
			success:function(html){
				$("#ContenidoSeccion").html(html);
			}
		});
	}
  if(seccion==29){

    $.ajax({
      type:"POST",
      url: "<?php echo base_url()?>reclutamiento/conversaciones",
      dataType: 'html',
      success:function(html){
        $("#ContenidoSeccion").html(html);
      }
    });
  }
	
}
function botones(seccion){
	$.ajax({
	   type:"POST",
	   url: 'inicio/BotonesSecciones',
	   dataType: 'html',
	   data:'tCodSeccion='+seccion,
	   success:function(html){
		  $(".seccionbotones").html(html);		   
	   }
	});
}
function muestraSolicitud(id){
    var parametros='opcion=detalle';
    parametros+='&titulo=Detalle de trabajadores';
    parametros+='&eCodConsecutivo='+id;
    $.ajax({
      type:"POST",
      url: "<?php echo base_url()?>tiempoextra/inicio/newSol",
      dataType: 'html',
      data:parametros,
      success:function(html){
        $("#ContenidoSeccion").html(html);
        $("#cSol").val('');
      }
    });
}

function ClosedS(){
	$.ajax({
	   type:"POST",
	   url: '<?php echo  base_url();?>Login/ClosedS',
	   dataType: 'html',
	   data:'error=1',
	   success:function(html){
		    $("#carga").css("display",'none');
		  	window.open("<?php echo  base_url();?>../","_self");
	   }
	});
}
function MostrarMenuMapaFinal(tCodSeccion){
	$.ajax({
	   type:"POST",
	   url: 'inicio/MostrarMenuMapaFinal',
	   dataType: 'html',
	   data:'tCodSeccion='+tCodSeccion,
	   success:function(html){
		 	var Data=JSON.parse(html);
		  	$(".menuseccion").html(' <li class="breadcrumb-item"><a>'+Data.nivel1+'</a></li>  <li class="breadcrumb-item"><a href="javascript: void(0)">'+Data.nivel2+'</a></li> <li class="breadcrumb-item" aria-current="page">'+Data.nivel3+'</li>');
	   		$(".title-seccion").html(' <h2 class="mb-0" id="title-seccion">'+Data.nivel3+' </h2>');
	   }
	});
}
function Profile(){
	$("#carga").css("display",'block');
	
	$.ajax({
	   type:"POST",
	   url: '<?php echo base_url();?>../Panel/inicio/profile',
	   dataType: 'html',
	   success:function(html){
		   $("#SeccionCompleta").html(html);
		   $("#carga").css("display",'none');
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
function Agregar(){
	let view=$(".vista").html();
	let seccion=$(".seccionactual").html();
	let tipo=$(".tipo").html();
	//funcion para agregar
		var opcion='alta';
		var id='';
		$.ajax({
			type:"POST",
			url: "<?php echo base_url();?>"+seccion+"/inicio/view",
			cache: false,
			async: true,
			dataType: 'html',
			data:'opcion='+opcion+'&id='+id,
			success:function(html){
				if(tipo==1){
					$('#exampleModalLive').html(html);
			   		$('#exampleModalLive').modal('show');
				}else{
					$("#ContenidoSeccion").html(html);
					$(".seccionbotones").html('');
				}
			}
		});
}
	
	  </script>	
  </body>
  <!-- [Body] end -->
</html>
