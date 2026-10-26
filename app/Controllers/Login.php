<?php

namespace App\Controllers;

use App\Models\MLogin;
//use App\Models\MDatosempresa;
class Login extends BaseController
{
	public function __construct(){
		$this->db = \Config\Database::connect();
		$this->mlogin = new MLogin();
		$this->session=session();
	}
	public function index(){
		$request = \Config\Services::request();
		$data['sol']=$request->getGet('solicitud');
		//$this->session->set('codigoSol','');
		
		// if($sol!=''){
		// 	$this->session->set('codigoSol',$sol);
		// }
		return view('Login/index',$data);
	}
	function in01(){
		//define('CI_DEBUG', 0);
		$request = \Config\Services::request();
		$Correo=$request->getPost('correo');
		$sistema=$request->getPost('sistema');
		$cSol=$request->getPost('cSol');
		//$PASSWORD=hash('sha256',$request->getPost('password'));
		
		$PASSWORD=$request->getPost('password');
		
		$result=$this->mlogin->getDatosUsuario($Correo,$PASSWORD,$sistema);
		
		if(isset($result[0]->eCodUsuario)){
			    
					if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '' ){
						$IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
					}
					else{
						$IP=$_SERVER['REMOTE_ADDR'];
					}
					$UNIQID=uniqid();
					//$this->mlogin->insertUso($IP,$result[0]->eCodUsuario,$result[0]->Usuario.' '.$result[0]->Apellidos,$UNIQID);
					$this->session->set('LLAVE',$UNIQID);
					$this->session->set('sesion_inicio',1);
					$this->session->set('Usuario',$result[0]->Usuario.' '.$result[0]->Apellidos);
					$this->session->set('eCodUsuario',$result[0]->eCodUsuario);
					$this->session->set('Compania',$result[0]->Compania);
					$this->session->set('eCodCompania',($result[0]->eCodCompania));
					$this->session->set('RFC',$result[0]->RFC);
					$this->session->set('eCodRol',$result[0]->eCodRol);
					$this->session->set('email',$result[0]->email);
					$this->session->set('Rol',$result[0]->Rol);
					$this->session->set('bAdministrador',$result[0]->bAdministrador); 
					$this->session->set('sistema',$sistema); 
					$this->session->set('cSol',$cSol); 
					echo 1;
					
		}else{
			echo 0;
		}
	}
	function in02(){
		$request = \Config\Services::request();
		$Correo=$request->getPost('email');
		$PASSWORD=$request->getPost('password');
		$VERIFICACION=trim($request->getPost('verificacion'));
		$result=$this->mlogin->getDatosUsuario($Correo,$PASSWORD);
		$sistema=$request->getPost('sistema');
		$cSol=$request->getPost('cSol');
		
		//print_r($result);
		if(isset($result[0]->eCodUsuario)){
			if($result[0]->tocken==$VERIFICACION){
					if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '' ){
						$IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
					}
					else{
						$IP=$_SERVER['REMOTE_ADDR'];
					}
					$UNIQID=uniqid();
					$this->mlogin->insertUso($IP,$result[0]->eCodUsuario,$result[0]->Usuario.' '.$result[0]->Apellidos,$UNIQID);
					$this->session->set('LLAVE',$UNIQID);
					$this->session->set('sesion_inicio',1);
					$this->session->set('Usuario',$result[0]->Usuario.' '.$result[0]->Apellidos);
					$this->session->set('eCodUsuario',$result[0]->eCodUsuario);
					$this->session->set('Compania',$result[0]->Compania);
					$this->session->set('eCodCompania',($result[0]->eCodCompania));
					$this->session->set('RFC',$result[0]->RFC);
					$this->session->set('eCodRol',$result[0]->eCodRol);
					$this->session->set('email',$result[0]->email);
					$this->session->set('Rol',$result[0]->Rol);
					$this->session->set('bAdministrador',$result[0]->bAdministrador); 
					$this->session->set('sistema',$result[0]->sistema); 
					$this->session->set('cSol',$cSol); 
				
					$dataConfir=array(
						'bConfirmada'=>1
					);
					$result=$this->mlogin->actualizacionConfirm($dataConfir,$result[0]->eCodUsuario);
				
					/*$datos['Fecha_Hoy'] = date("d/m/Y");
					$datos['email']=$result[0]->email;
					$mensaje = 'El usuario:'.$result[0]->Usuario.' '.$result[0]->Apellidos.'<br> RFC ('.$result[0]->RFC.') ha iniciado sesión con el correo:'.$result[0]->email;
					$Titulo="Inicio de sesión";
					
					
					$email=\Config\Services::email();
									
					$email->setFrom('contacto@invoiice.com.mx');
					$email->setTo('alexis@invoiice.com.mx');
					$email->setSubject($Titulo);
					$email->setMessage($mensaje);
					$email->send();*/
					//echo $email->printDebugger();
				 	
					echo 1;
			}else{
				echo 0;
			}
		}else{
			echo  0;	
		}
		
	}
	function in03(){
		$request = \Config\Services::request();
		helper('captcha');
		$inputCaptcha = $this->request->getPost('captcha');
		// Valida con la función del helper
		if (!captcha_validate($inputCaptcha)) {
			// Si no coincide, regresa con error y conserva los datos del formulario
			echo 5; exit;
		}
		$emailres = $request->getPost('correor');		
		
		$PassRandom=$this->genRanStr(8);
		$ID=$this->mlogin->getVerificacionCuenta($emailres);
		if(isset($ID[0]->eCodUsuario)){
			$this->mlogin->insertContrasenanueva($PassRandom,$ID[0]->eCodUsuario);	
			if (filter_var($ID[0]->email, FILTER_VALIDATE_EMAIL)) {
				$datos['Fecha_Hoy'] = date("d/m/Y");
				$datos['email']=$ID[0]->email;
				$datos['PASSWORD']=$PassRandom;
				$mensaje = view('Login/sendmail', $datos);
				$Titulo="Reinicio de contraseña Invoice";
				$correo = \Config\Services::email();
				$correo->setFrom('contacto@invoiice.com.mx');
				$correo->setTo($datos['email']);
				$correo->setSubject($Titulo);
				$correo->setMessage($mensaje);
				if (!$correo->send()) {
					echo 2; exit;
				}
				echo 1; 
				
				
			}else{
				echo 9;
			}

		}else{
			echo 0;
		}
		

	}
	function forgot(){
		return view('Login/forgot.php');
	}
	function register(){
		return view('Login/register.php');
	}
	function genRanStr($length = 6) {
		$characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	function ClosedS(){
		$session=session();
		echo $session->destroy();
		
	}
	function changePassword(){
		$request = \Config\Services::request();
		$session=session();
		$PassAnterior=$request->getPost('PassAnterior');
		$newPass=$request->getPost('newPass');
		$repeatPass=$request->getPost('repeatPass');
		$bActual=$this->mlogin->getDatosUsuario($session->email,$PassAnterior);
		if(isset($bActual[0]->eCodUsuario)){
			if($newPass==$repeatPass){
				$val=$this->validarContrasena($newPass);
				if($val===true){
					$this->mlogin->insertContrasenanueva($newPass,$session->eCodUsuario);
					echo 1;
				}else{
					echo 4;
				}
			}else{
				echo 3; 
			}
		}else{
			echo 2;
		}
	} 
	function validarContrasena($password) {
		// Verificar longitud entre 1 y 7 caracteres
		if (strlen($password) < 7 || strlen($password) > 12) {
			return "La contraseña debe tener entre 1 y 7 caracteres."; 
			return 4;
		}

		// Al menos una letra
		if (!preg_match('/[a-zA-Z]/', $password)) {
			return "La contraseña debe contener al menos una letra.";
			return 4;
		}

		// Al menos un número
		if (!preg_match('/[0-9]/', $password)) {
			return "La contraseña debe contener al menos un número.";
			return 4; 
		}

		// Al menos un símbolo (cualquier cosa que no sea letra o número)
		if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
			return "La contraseña debe contener al menos un símbolo.";
			return 4;
		}

		// Si pasa todas las validaciones
		return true;
	}
	function changeDFiscal(){
		$Domicilio_Facturacion=($this->request->getPost('Domicilio_Facturacion') ? $this->request->getPost('Domicilio_Facturacion') :NULL);
		$NoExterior_Facturacion=($this->request->getPost('NoExterior_Facturacion') ? $this->request->getPost('NoExterior_Facturacion') :NULL);
		$NoInterior_Facturacion=($this->request->getPost('NoInterior_Facturacion') ? $this->request->getPost('NoInterior_Facturacion') :NULL);
		$Pais_Facturacion=($this->request->getPost('Pais_Facturacion') ? $this->request->getPost('Pais_Facturacion') :NULL);
		$CP_Facturacion=($this->request->getPost('CP_Facturacion') ? $this->request->getPost('CP_Facturacion') :NULL);
		$Estado_Facturacion=($this->request->getPost('Estado_FacturacionS') ? $this->request->getPost('Estado_FacturacionS') :$this->request->getPost('Estado_FacturacionI'));
		$Ciudad_Facturacion=($this->request->getPost('Ciudad_FacturacionS') ? $this->request->getPost('Ciudad_FacturacionS') :$this->request->getPost('Ciudad_FacturacionI'));
		$Localidad_Facturacion=($this->request->getPost('Localidad_FacturacionS') ? $this->request->getPost('Localidad_FacturacionS') :$this->request->getPost('Localidad_FacturacionI'));
		$Colonia_Facturacion=($this->request->getPost('Colonia_FacturacionS') ? $this->request->getPost('Colonia_FacturacionS') :$this->request->getPost('Colonia_FacturacionI'));
		$Telefono_Facturacion=($this->request->getPost('Telefono_Facturacion') ? $this->request->getPost('Telefono_Facturacion') :NULL);
		$tClaveRegimenFiscal=($this->request->getPost('tClaveRegimenFiscal') ? $this->request->getPost('tClaveRegimenFiscal'):NULL);
		
		$datos =[
			  'Domicilio_Facturacion' =>$Domicilio_Facturacion,
			  'NoExterior_Facturacion' =>$NoExterior_Facturacion,
			  'NoInterior_Facturacion' =>$NoInterior_Facturacion,
			  'Pais_Facturacion'=>$Pais_Facturacion,
			  'CP_Facturacion' =>$CP_Facturacion,
			  'Estado_Facturacion'=>$Estado_Facturacion,
			  'Ciudad_Facturacion'=>$Ciudad_Facturacion,
			  'Localidad_Facturacion'=>$Localidad_Facturacion,
			  'Colonia_Facturacion'=>$Colonia_Facturacion,
			  'Telefono_Facturacion'=>$Telefono_Facturacion,
			  'tClaveRegimenFiscal'=>$tClaveRegimenFiscal
			];
		echo $this->mdatosempresa->Actualizar($datos,$this->session->eCodCompania);
	}
}