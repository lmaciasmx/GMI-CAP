<?php
namespace App\Models;

use CodeIgniter\Model;
  
class MSis extends Model{ 
	
	//protected $db='db';
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->session = \Config\Services::session();
	}
	
	function getSeccionesPadresModulo(){
		$query="SELECT distinct cs.* FROM dbbarcos.rel_usuarios_sistemas_roles rusr
		INNER JOIN dbbarcos.ca_roles ro on ro.eCodRol=rusr.eCodRol and ro.eCodSistema in(15)
        INNER JOIN dbbarcos.rel_roles_secciones rs on rs.eCodRol=ro.eCodRol
        INNER JOIN ca_sistemas si on ro.eCodSistema=si.eCodSistema
        INNER JOIN ca_usuarios us on us.eCodUsuario=rusr.eCodUsuario 
		AND rusr.eCodUsuario=".trim($this->session->eCodUsuario)."  
		INNER JOIN dbbarcos.ca_secciones cs on cs.tCodSeccion=rs.tCodSeccion
        INNER JOIN ca_companias co on co.eCodCompania=us.eCodCompania 
		WHERE us.eCodEstatus=1
		AND rusr.eCodEstatus=1
		AND co.eCodEstatus=1
		AND ro.eCodEstatus=1
		AND cs.eCodEstatus=1
		AND us.eCodUsuario=".trim($this->session->eCodUsuario)."  
		AND us.eCodCompania=".trim($this->session->eCodCompania)."  
		AND cs.tCodSeccionPadre is null or cs.tCodSeccionPadre=''
		ORDER BY cs.ePosicion ASC";
		return $this->db->query($query)->getResult();
	}
	function getSeccionesPadresModuloHijos($tCodSeccionPadre){
		$query="SELECT distinct cs.* FROM dbbarcos.rel_usuarios_sistemas_roles rusr
		INNER JOIN dbbarcos.ca_roles ro on ro.eCodRol=rusr.eCodRol and ro.eCodSistema in (15)
        INNER JOIN dbbarcos.rel_roles_secciones rs on rs.eCodRol=ro.eCodRol
        INNER JOIN ca_sistemas si on ro.eCodSistema=si.eCodSistema
        INNER JOIN ca_usuarios us on us.eCodUsuario=rusr.eCodUsuario 
		AND rusr.eCodUsuario=".trim($this->session->eCodUsuario)."  
		INNER JOIN dbbarcos.ca_secciones cs on cs.tCodSeccion=rs.tCodSeccion
        INNER JOIN ca_companias co on co.eCodCompania=us.eCodCompania 
		WHERE us.eCodEstatus=1
		AND rusr.eCodEstatus=1
		AND co.eCodEstatus=1
		AND ro.eCodEstatus=1
		AND cs.eCodEstatus=1
		AND us.eCodUsuario=".trim($this->session->eCodUsuario)."  
		AND us.eCodCompania=".trim($this->session->eCodCompania)."  
		AND cs.tCodSeccionPadre='".trim($tCodSeccionPadre)."'
		ORDER BY cs.ePosicion ASC";
		return $this->db->query($query)->getResult();
	}
	function getSeccionesPadresModuloHijosHijos($tCodSeccionPadre){
		$query="SELECT N1.*,per.eCodPermiso as Permiso FROM 
		(SELECT distinct cs.*,ro.eCodRol FROM dbbarcos.rel_usuarios_sistemas_roles rusr
		INNER JOIN dbbarcos.ca_roles ro on ro.eCodRol=rusr.eCodRol and ro.eCodSistema in(15)
        INNER JOIN dbbarcos.rel_roles_secciones rs on rs.eCodRol=ro.eCodRol
        INNER JOIN ca_sistemas si on ro.eCodSistema=si.eCodSistema
        INNER JOIN ca_usuarios us on us.eCodUsuario=rusr.eCodUsuario 
		AND rusr.eCodUsuario=".trim($this->session->eCodUsuario)."  
		INNER JOIN dbbarcos.ca_secciones cs on cs.tCodSeccion=rs.tCodSeccion
        INNER JOIN ca_companias co on co.eCodCompania=us.eCodCompania 
		WHERE us.eCodEstatus=1
		AND rusr.eCodEstatus=1
		AND co.eCodEstatus=1
		AND ro.eCodEstatus=1
		AND cs.eCodEstatus=1
		AND us.eCodUsuario=".trim($this->session->eCodUsuario)."  
		AND us.eCodCompania=".trim($this->session->eCodCompania)."  
		AND cs.tCodSeccionPadre='".trim($tCodSeccionPadre)."'
		ORDER BY cs.ePosicion ASC)N1  LEFT JOIN
   		dbbarcos.rel_secciones_permisos_roles per ON per.eCodRol = N1.eCodRol
        AND per.tCodSeccion = N1.tCodSeccion where eCodPermiso is null or eCodPermiso=1";
		return $this->db->query($query)->getResult();
	}
	function getDatosMenu($tCodSeccion){
		$query="SELECT *
		FROM dbbarcos.ca_secciones 
		where tCodSeccion='".trim($tCodSeccion)."'";
		return $this->db->query($query)->getResult();
	}
	function getDatosMenuFinal($tCodSeccion){
		$query="SELECT distinct cs.*,csss.Nombre as SeccionPadre,csss.tCodSeccion as Padre
		FROM dbbarcos.ca_secciones cs
		inner join dbbarcos.ca_secciones css on cs.tCodSeccionPadre=css.tCodSeccion
		inner join dbbarcos.ca_secciones csss on css.tCodSeccionPadre=csss.tCodSeccion
		where cs.tCodSeccion='".trim($tCodSeccion)."'";
		return $this->db->query($query)->getResult();
	}
	
	//esto esta pendiente
	function getBotonesSecciones($tCodSeccion){
		$query="SELECT * FROM (SELECT distinct 
			bo.*, case when bo.Nombre is not null then bo.Nombre else cb.tNombre end as boton,cb.Funcion,cb.icono,
			case when bo.eCodBoton=1 and rp.eCodPermiso=2 then 1 else 
			case when bo.eCodBoton=2 and rp.eCodPermiso=2 then 1 else
			case when bo.eCodBoton=3 and rp.eCodPermiso=3 then 1 else
			case when bo.eCodBoton=4 and rp.eCodPermiso=1 then 1 else
			case when bo.eCodBoton in (1,2,3,4,6) and rp.eCodPermiso=4 then 1 else
			0 end end end end end  as Permiso
		FROM
			rel_secciones_botones bo
				INNER JOIN
			ca_botones cb ON cb.eCodBoton = bo.eCodBoton
				INNER JOIN
			rel_secciones_permisos_roles rp ON rp.tCodSeccion = bo.tCodSeccion
				INNER JOIN
			ca_roles ro ON ro.eCodRol = rp.eCodRol
		WHERE
			cb.eCodBoton in (1,4,6)
			AND bo.tCodSeccion = '".trim($tCodSeccion)."'
			AND ro.eCodRol = ".trim($this->session->eCodRol)."
		ORDER BY bo.ePosicion ASC
		)n1 WHERE Permiso>0";
		return $this->db->query($query)->getResult();
	}
	function getBotonesSeccionesbyRegistro($tCodSeccion){
		$query="SELECT * FROM (SELECT distinct 
			bo.*, case when bo.Nombre is not null then bo.Nombre else cb.tNombre end as boton,cb.Funcion,cb.icono,
			case when bo.eCodBoton=1 and rp.eCodPermiso=2 then 1 else 
			case when bo.eCodBoton=2 and rp.eCodPermiso=2 then 1 else
			case when bo.eCodBoton=3 and rp.eCodPermiso=3 then 1 else
			case when bo.eCodBoton=4 and rp.eCodPermiso=1 then 1 else
			case when bo.eCodBoton=5 and rp.eCodPermiso=1 then 1 else
			case when bo.eCodBoton in (1,2,3,4,5) and rp.eCodPermiso=4 then 1 else
			0 end end end end end end  as Permiso
		FROM
			rel_secciones_botones bo
				INNER JOIN
			ca_botones cb ON cb.eCodBoton = bo.eCodBoton
				INNER JOIN
			rel_secciones_permisos_roles rp ON rp.tCodSeccion = bo.tCodSeccion
				INNER JOIN
			ca_roles ro ON ro.eCodRol = rp.eCodRol
		WHERE
			cb.eCodBoton in (2,3,5)
			AND bo.tCodSeccion = '".trim($tCodSeccion)."'
			AND ro.eCodRol = ".trim($this->session->eCodRol)."
		ORDER BY bo.ePosicion ASC
		)n1 WHERE Permiso>0";
		return $this->db->query($query)->getResult();
	}
	function getTotalMensajesNoLeeidos($eCodUsuario){
		$query="SELECT distinct eCodSoporte FROM ca_conversacion_soporte c where c.eCodUsuario=".$eCodUsuario;
		$data=$this->db->query($query)->getResult();
		$Total=0;
		foreach($data as $key){
			$query="select count(eCodconversacion) as Total
		 	from ca_conversacion_soporte where bVisto is null and eCodSoporte=".$key->eCodSoporte." and eCodUsuario<>".$eCodUsuario;
			$rs=$this->db->query($query)->getResult();
			$Total=$Total+(isset($rs[0]->Total) ? $rs[0]->Total :0);
		}
		return $Total;
	}
	function getconversaciones($eCodUsuario){
		$query="SELECT distinct eCodSoporte FROM ca_conversacion_soporte c where c.eCodUsuario=".$eCodUsuario;
		$data=$this->db->query($query)->getResult();
		$datos=array();
		$cont=0;
		foreach($data as $key){$cont++;
			$query="select *
		 	from ca_conversacion_soporte 
			where bVisto is null and eCodSoporte=".$key->eCodSoporte." and eCodUsuario<>".$eCodUsuario;
			$rs=$this->db->query($query)->getResult();
			foreach($rs as $key2){
				$query="select *
		 		from ca_usuarios 
				where eCodUsuario=".$key2->eCodUsuario;
				$rss=$this->db->query($query)->getResult();
				array_push ($datos,$key2->Mensaje.'|'.$key2->eCodSoporte.'|'.$key2->Fecha.'|'.$rss[0]->Nombre.' '.$rss[0]->Apellidos.'|'.$key2->eCodConversacion);
			}
			
		}
		return $datos;
	}
	function actualizarConfirmacion($data,$eCodConversacion){
		$this->db->where('eCodConversacion',$eCodConversacion);
		return $this->db->update('ca_conversacion_soporte',$data);
	}
	function getfiltroPermiso($tCodSeccion){
		$query="SELECT * FROM ca_secciones where tCodSeccion='".$tCodSeccion."'";
		return $this->db->query($query)->getResult();
	}
	function getPermisobySeccionManual($tCodSeccion,$eCodRol,$eCodPermiso){
			$query="select * FROM  rel_secciones_permisos_roles rp  INNER JOIN ca_roles ro ON ro.eCodRol = rp.eCodRol
			WHERE rp.tCodSeccion = '".$tCodSeccion."' AND ro.eCodRol =".$eCodRol." and rp.eCodPermiso=".$eCodPermiso;
	$RS=$this->db->query($query)->getResult();  
			return (isset($RS[0]->eCodPermiso) ? 1 :0);
	}
	function getDateTime(){
		$query="select current_timestamp() as Fecha";
		$rs=$this->db->query($query)->getResult();
		return $rs[0]->Fecha;
	}
}

?>