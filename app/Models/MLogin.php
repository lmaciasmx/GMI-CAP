<?php
namespace App\Models;

use CodeIgniter\Model;
  
class MLogin extends Model{
	
	//protected $db='db';
	public function __construct()
	{
		$this->db = \Config\Database::connect(); 
	}
	
	function getDatosUsuario($RFC,$PASSWORD,$sistema){
		
		$query="SELECT u.eCodUsuario,u.email,u.Nombre AS Usuario,u.Apellidos AS Apellidos,co.Nombre AS Compania,
		u.eCodCompania,ro.Nombre AS Rol,ro.eCodRol,u.bAdministrador,u.Trabajador,u.bSoporte,u.bAdminSoporte,u.tFoto,
        u.tocken,co.RFC,u.tocken
		FROM rel_usuarios_sistemas_roles rel
        INNER JOIN ca_usuarios u on u.eCodUsuario=rel.eCodUsuario
        INNER JOIN ca_companias co ON co.eCodCompania = u.eCodCompania
		
        INNER JOIN ca_roles ro ON ro.eCodRol = rel.eCodRol
        INNER JOIN ca_sistemas si ON si.eCodSistema = ro.eCodSistema
		WHERE si.eCodEstatus = 1 
        AND u.eCodEstatus = 1
        AND co.eCodEstatus = 1 
        AND ro.eCodEstatus = 1
        AND rel.eCodEstatus = 1 and si.eCodSistema=".$sistema."
        AND u.email = '".trim($RFC)."'
        AND u.password = '".base64_encode(trim($PASSWORD))."'";
		return $this->db->query($query)->getResult();
    }
	function getAllUsuarios(){
		$query="SELECT * from dbmeta.ca_usuarios";
		return $this->db->query($query)->getResult();
	}
	function updatePass($eCodUsuario, $passwordHash){
		$db=$this->db->table('ca_usuarios');
		$db->set($passwordHash);
		$db->where('eCodUsuario',$eCodUsuario);
		return $db->update();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function insertUso($IP,$USUARIO,$NOMBRE,$UNIQID){
		$query="INSERT INTO sis_uso_sistemas (Usuario,eCodUsuario,IP,llave) values ('$NOMBRE',$USUARIO,'$IP','$UNIQID')";
		$this->db->query($query);
		
	}
	function getVerificacionCuenta($email){
		$query="SELECT * FROM ca_usuarios WHERE email='".trim($email)."'";
		return $this->db->query($query)->getResult();
	}
	function insertContrasenanueva($Password,$eCodUsuario){
		$data=array(
			'password'=>md5($Password)
		);
		$db=$this->db->table('ca_usuarios');
		$db->where("eCodUsuario",$eCodUsuario);
		$db->set($data);
		$db->update();
	}
	function getEstatusPortal($eCodConsecutivo){
		$query="SELECT * FROM sis_confing WHERE eCodConsecutivo=".$eCodConsecutivo;
		return $this->db->query($query)->getResult();
	}
	function actualizacionConfirm($dataConfir,$eCodUsuario){
		$db=$this->db->table('ca_usuarios');
		$db->where("eCodUsuario",$eCodUsuario);
		$db->set($dataConfir);
		return $db->update();
	}
}

?>