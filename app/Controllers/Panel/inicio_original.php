<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

use App\Models\MAsignaciontimbres;
use App\Models\MSis;
use App\Models\MMeta;

class Inicio extends BaseController
{

	public function __construct(){
		$this->db = \Config\Database::connect();
		$this->masignaciontimbres = new MAsignaciontimbres();
		$this->msis = new MSis();
		$this->mmeta = new MMeta();
		$request = \Config\Services::request();
	}
	public function index(){
		$session=session();
		if((!$session->eCodUsuario)){
			?>
			<script>
			window.open("../","_self");
			</script>
			<?php
		}else{
			//echo $session->eCodUsuario;
			return view('Panel/index');
			
		}
		
	}
	function MostrarSeccionPadre(){
	
		$tCodSeccion=$this->request->getPost('tCodSeccion');
		?>
        <table border="0" width="95%" align="center"  style="margin-left: 55px; line-height: 20px; margin-top:-40px;"><?php
         	$data=$this->msis->getSeccionesPadresModuloHijos($tCodSeccion);
			$coun=0;
			foreach($data as $key){$coun++;?>
            <?php if($coun==1){?>   
          		<tr style="height: 200px;">
                <td style="width:50%; padding-bottom: 3%" >

                       <table border="0">
                       	<tr>
                        	<td valign="top"> <img src="<?php echo base_url().'img/icons/'.$key->icono?>" style="width: 140px;">
                            </td>
                            <td valign="top">
                            	<table style="margin-left: 10px;">
                                	<?php $data=$this->msis->getSeccionesPadresModuloHijosHijos($key->tCodSeccion);
									foreach($data as $keyy){?>
                                	<tr>
                                    	<td <?php 
										$tCodSecicon="'".$keyy->tCodSeccion."'";
										echo($keyy->Permiso==0 ? 'style="color:rgb(175, 176, 177);"' :'style="color:#000000;cursor:pointer;"')?> <?php echo($keyy->Permiso==1 ? ($keyy->bLink==1  ? '' :'onClick="AbrirSeccionFinal('.$tCodSecicon.');"' ):'')?> class="over"><?php echo ($keyy->bLink==1  ? '<a target="_new" href="'.base_url().'index.php/'.$keyy->url.'">'.$keyy->Nombre.'</a>':$keyy->Nombre)?></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </td>
                        </tr>
                        
                      </table>
               
                </td>
                <?php }?>
                <?php if($coun==2){ $coun=0;?>   
                <td>	<table border="0">
                            <tr>
                                <td valign="top"> <img src="<?php echo base_url().'img/icons/'.$key->icono?>" style="width: 130px;">
                                </td>
                                <td valign="top">
                                    <table style="margin-left: 15px;">
                                        <?php $data=$this->msis->getSeccionesPadresModuloHijosHijos($key->tCodSeccion);
                                        foreach($data as $keyy){?>
                                        <tr>
                                            <td <?php 
											$tCodSecicon="'".$keyy->tCodSeccion."'";
											echo($keyy->Permiso==0 ? 'style="color:rgb(175, 176, 177);"' :'style="color:#000000;cursor:pointer;"')?> <?php echo($keyy->Permiso==1 ? ($keyy->bLink==1  ? '' :'onClick="AbrirSeccionFinal('.$tCodSecicon.');"' ):'')?> class="over"><?php echo ($keyy->bLink==1  ? '<a target="_new" href="'.base_url().'index.php/'.$keyy->url.'">'.$keyy->Nombre.'</a>':$keyy->Nombre)?></td>
                                        </tr>
                                        <?php }?>
                                    </table>
                                </td>
                            </tr>
                      </table>
                </td>
                </tr>
               <?php }?>
            <?php }?>
        </table>
        <?php
	}
	function MostrarMenuMapaFinal(){
		$session=session();
		if(($session->eCodUsuario)){
		$tCodSeccion=$this->request->getPost('tCodSeccion');
		$data=$this->msis->getDatosMenuFinal($tCodSeccion);
		$tCodSeccionPadre="'".$data[0]->Padre."'";
		echo '<li ><a href="">Inicio</a></li>';
		echo '<li ><a style="cursor:pointer;" onclick="MostrarSecciones('.$tCodSeccionPadre.');">'.$data[0]->SeccionPadre.'</a></li>';
		echo '<li class="Active">'.$data[0]->Nombre.'</li>';
		}else{
			echo 100;
		}
		
	}
	function MostrarMenuMapa(){

		$tCodSeccion=$this->request->getPost('tCodSeccion');
		$data=$this->msis->getDatosMenu($tCodSeccion);
		
		echo '<li ><a href="">Inicio</a></li>';
		echo '<li class="Active">'.$data[0]->Nombre.'</li>';
		
	}
	function Mostrartitulos(){
		$tCodSeccion=$this->request->getPost('tCodSeccion');
		$data=$this->msis->getDatosMenu($tCodSeccion);
		echo '<h1>'.$data[0]->Nombre.'</h1>';
		echo '<small class="subtitle">'.$data[0]->Descripcion.'</small>';
		
	}
	function BotonesSecciones(){
		$tCodSeccion=$this->request->getPost('tCodSeccion');
		$data=$this->mmeta->getBotonesSecciones($tCodSeccion);
		foreach($data as $key){
			echo '<button onClick="'.$key->Funcion.'" type="button" class="btn vd_btn vd_bg-blue" style="padding: 4px;   font-size: 13px;">
				<span class="append-icon">
				<i class="'.$key->icono.'"></i></span>'.$key->boton.'
			  </button>  ';
		}		  
	}
	function cargarfiltros(){
		$tCodSeccion=$this->request->getPost('tCodSeccion');
		$data=$this->mmeta->getfiltroPermiso($tCodSeccion);
		if($data[0]->bFiltro==1){
			return view($tCodSeccion.'/filtros');
		}else{
			echo 0;
		}
	}
	function cerrarSesion(){
		$session=session();
		echo $session->destroy();
		
	}
}
