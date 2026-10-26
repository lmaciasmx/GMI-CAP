<script>
function AbrirConversacion(id)
{
	$(".mega-ul").append('<li class="one-big-icon mega-li mgl-10"> <a href="index.php" class="mega-link" data-action="click-trigger"> <span class="mega-icon"><img alt="example image" src="img/avatar/avatar-10.jpg"></span> <span class="badge vd_bg-red">3</span></a>');
}
</script>
<div class="vd_navbar vd_nav-width vd_navbar-chat vd_bg-black-80 <?php if (isset($current_navbar)) {echo($current_navbar);} ?>  <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-left") {echo($navbar_left_extra_class);} ?> <?php if (isset($current_navbar) && $current_navbar=="vd_navbar-right") {echo($navbar_right_extra_class);} ?>">
	<div class="navbar-tabs-menu clearfix">
			<span class="expand-menu" data-action="expand-navbar-tabs-menu">
            	<span class="menu-icon menu-icon-left">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>
            	<span class="menu-icon menu-icon-right">
            		<i class="fa fa-ellipsis-h"></i>
                    <span class="badge vd_bg-red">
                        20
                    </span>                    
                </span>                
            </span>  
            <div class="menu-container">               
        		 <?php include("templates/navbars/tabs-search.tpl.php") ?>  
            </div>        
                                                 
    </div>
	<div class="navbar-menu clearfix">
    	<div class="content-list content-image content-chat">
            <ul class="list-wrapper no-bd-btm pd-lr-10">
                <li class="group-heading vd_bg-black-20">CONECTADOS</li>
                <?
					$UserCon=$udm->UsuariosConectadosChat();
					if($UserCon){
					foreach($UserCon as $key){
						 if($key{'BANDERA'}==0){
						?>
						<li>  
                    	<a href="#"> 
                            <div class="menu-icon"><img src="<?=($key{'tFoto'} ? 'fotosUsuarios/'.$key{'tFoto'} :'img/avatar/avatar.jpg')?>" alt="example image"></div> 
                            <div class="menu-text"><?=utf8_encode($key{'tNombre'})?>
                                <div class="menu-info">
                                    <span class="menu-date"><?=utf8_encode($key{'tPuesto'})?> </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-green">&nbsp;</span></div> 
                    	</a>
                	</li>
						<?
						 }}}
				?>
               <!-- <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar.jpg" alt="example image"></div> 
                            <div class="menu-text">Jessylin
                                <div class="menu-info">
                                    <span class="menu-date">Administrator </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-green">&nbsp;</span></div> 
                    </a>
                </li>
                <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-2.jpg" alt="example image"></div> 
                            <div class="menu-text">Rodney Mc.Cardo
                                <div class="menu-info">
                                    <span class="menu-date">Designer </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-grey">&nbsp;</span></div> 
                    </a>
                </li>
                <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-3.jpg" alt="example image"></div> 
                            <div class="menu-text">Theresia Minoque
                                <div class="menu-info">
                                    <span class="menu-date">Engineering </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-green">&nbsp;</span></div> 
                    </a>
                </li>-->
                <li class="group-heading vd_bg-black-20">DECONECTADOS</li>
                 <?
					$UserDescon=$udm->UsuariosDesConectadosChat();
					foreach($UserDescon as $keyy){ 
					 if($keyy{'BANDERA'}==1){
					?><li onclick="AbrirConversacion(<?=$keyy{'eCodUsuario'}?>);">  
                            <a href="#" data-action="click-trigger"> 
                                    <div class="menu-icon"><img src="<?=($keyy{'tFoto'} ? 'fotosUsuarios/'.$keyy{'tFoto'} :'img/avatar/avatar.jpg')?>" alt="example image"></div> 
                                    <div class="menu-text"><?=utf8_encode($keyy{'tNombre'})?>
                                        <div class="menu-info">
                                            <span class="menu-date"><?=utf8_encode($keyy{'tPuesto'})?> </span>                                                         
                                        </div>
                                    </div>
                                    <div class="menu-badge"><span class="badge status vd_bg-grey">&nbsp;</span></div> 
                            </a>
                        </li> 
                    <?                   	
					}}
					?>                                                                                
               <!-- <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-4.jpg" alt="example image"></div> 
                            <div class="menu-text">Greg Grog
                                <div class="menu-info">
                                    <span class="menu-date">Developer </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-grey">&nbsp;</span></div> 
                    </a>
                </li> 
                <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-5.jpg" alt="example image"></div> 
                            <div class="menu-text">Stefanie Imburgh
                                <div class="menu-info">
                                    <span class="menu-date">Dancer</span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="vd_grey font-sm"><i class="fa fa-mobile"></i></span></div> 
                    </a>
                </li> 
                <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-6.jpg" alt="example image"></div> 
                            <div class="menu-text">Matt Demon
                                <div class="menu-info">
                                    <span class="menu-date">Musician </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="vd_grey font-sm"><i class="fa fa-mobile"></i></span></div> 
                    </a>
                </li>
                <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-7.jpg" alt="example image"></div> 
                            <div class="menu-text">Jeniffer Anastasia
                                <div class="menu-info">
                                    <span class="menu-date">Senior Developer </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-green">&nbsp;</span></div> 
                    </a>
                </li>                    
                <li>  
                    <a href="#"> 
                            <div class="menu-icon"><img src="img/avatar/avatar-8.jpg" alt="example image"></div> 
                            <div class="menu-text">Daniel Dreamon
                                <div class="menu-info">
                                    <span class="menu-date">Sales Executive </span>                                                         
                                </div>
                            </div>
                            <div class="menu-badge"><span class="badge status vd_bg-green">&nbsp;</span></div> 
                    </a>
                </li> -->

            </ul>
        </div>

            
    </div>
    <div class="navbar-spacing clearfix">
    </div>
</div>