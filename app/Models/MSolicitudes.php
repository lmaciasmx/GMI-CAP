<?php
namespace App\Models;

use CodeIgniter\Model;
  
class MSolicitudes extends Model{
	 
	//protected $db='db';
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->session = \Config\Services::session();
	}
	
	function getTipoUsuario(){
		$query="SELECT bAdminWorkbeat from ca_usuarios where eCodUsuario=".$this->session->eCodUsuario;
		$rs=$this->db->query($query)->getResult();
		return (isset($rs[0]->bAdminWorkbeat) ? $rs[0]->bAdminWorkbeat:0);
	}
	function getDepartamentos(){
		$query="SELECT * FROM workbeat.ca_departamentos_tiempos_extras";
		return $this->db->query($query)->getResult();
	}
	function getTipoUsuarioTiempoExtra(){//echo $this->session->eCodUsuario;exit;
		$Tipo=0;
		$query="SELECT eCodSolicitante from  workbeat.ma_solicitantes_revisores_tiempo_extra where eCodSolicitante=".$this->session->eCodUsuario." limit 1";
		$rs=$this->db->query($query)->getResult();
		if(isset($rs[0]->eCodSolicitante)){
			$Tipo=1;
		}else{
			$query="SELECT eCodRevisor from  workbeat.ma_solicitantes_revisores_tiempo_extra where eCodRevisor=".$this->session->eCodUsuario." limit 1";
			$rs=$this->db->query($query)->getResult();
			if(isset($rs[0]->eCodRevisor)){
				$Tipo=2;
			}else{
				$query="SELECT eCodRevisor2 from  workbeat.ma_solicitantes_revisores_tiempo_extra where eCodRevisor2=".$this->session->eCodUsuario." limit 1";
				$rs=$this->db->query($query)->getResult();
				if(isset($rs[0]->eCodRevisor2)){
					$Tipo=3;
				}else{
					$query="SELECT eCodRevisor3 from  workbeat.ma_solicitantes_revisores_tiempo_extra where eCodRevisor3=".$this->session->eCodUsuario." limit 1";
					$rs=$this->db->query($query)->getResult();
					if(isset($rs[0]->eCodRevisor3)){
						$Tipo=4;
					}else{

					}
				}
			}
		}
		return $Tipo;
	}
	function getSolicitudesRealizadas(){
		$query="SELECT 
			m.*,
			u.Nombre,
			u.Apellidos,
			de.tNombre AS Area,

			COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras

		FROM workbeat.ma_solicitudes_tiempo_extra m

		INNER JOIN dbmeta.ca_usuarios u 
			ON u.eCodUsuario = m.eCodSolicitante

		INNER JOIN workbeat.ca_departamentos_tiempos_extras de 
			ON de.eCodConsecutivo = m.eCodArea

		LEFT JOIN workbeat.de_registro_tiempo_extra d
			ON d.eCodSolicitud = m.eCodConsecutivo

		WHERE m.eCodSolicitante =".$this->session->eCodUsuario."

		GROUP BY m.eCodConsecutivo

		ORDER BY m.eCodConsecutivo DESC;";
		return $this->db->query($query)->getResult();
	}
	
	function getCausasTiempoExtra(){
		$query="SELECT * from  workbeat.ca_causas_tiempos_extras";
		return $this->db->query($query)->getResult();
	}
	function getCentrosCostos(){
		$query="SELECT distinct eCentroCosto as claveValor,concat(eCentroCosto,concat('-',tNombreCentroCosto)) as Valor FROM workbeat.ca_trabajadores where eCentroCosto is not null order by eCentroCosto ASC";
		return $this->db->query($query)->getResult();
	}
	function getTrabjadorbyNumeroEmpleado($term)
	{
		$sql = "SELECT 
					t.*,
					t.eCentroCosto as tClaveCentro,
					t.tNombreCentroCosto as CentroCosto 
				FROM workbeat.ca_trabajadores t 
				WHERE (
					t.NumeroEmpleado LIKE '%".$term."%' 
					OR t.NombreEmpleado LIKE '%".$term."%' 
					OR t.ApellidoPaterno LIKE '%".$term."%' 
					OR t.ApellidoMaterno LIKE '%".$term."%'
				)  
				AND t.EstatusRH = 1";

		$query = $this->db->query($sql);

		$row_set = [];

		if($query->getNumRows() > 0){

			foreach ($query->getResultArray() as $row){

				$row_set[] = array(
					"id" => trim($row["NumeroEmpleado"]),
					"label" => str_replace(
						"/",
						" ",
						$row["NumeroEmpleado"].' '.
						$row['NombreEmpleado'].' '.
						$row['ApellidoPaterno'].' '.
						$row['ApellidoMaterno']
					),
					"tClaveCentro" => $row['tClaveCentro']
				);

			}

		}

		return $row_set;
	}
	function insertaSolicitud($data){
		$db=$this->db->table('workbeat.ma_solicitudes_tiempo_extra');
		$db->set($data);
		$db->insert();
		return $this->db->insertID();
	}
	function guardarTiempoExtra($data){
		$db=$this->db->table('workbeat.de_registro_tiempo_extra');
		$db->set($data);
		return $db->insert();
	}
	function UpdateSolicitud($dataUpdate,$codigoSolicitud){
		$db=$this->db->table('workbeat.ma_solicitudes_tiempo_extra');
		$db->set($dataUpdate);
		$db->where('eCodConsecutivo',$codigoSolicitud);
		return $db->update();
	}
	function deteledetallebefortInsertTiempoExtra($codigoSolicitud){
		$db=$this->db->table('workbeat.de_registro_tiempo_extra');
		$db->where('eCodSolicitud',$codigoSolicitud);
		return $db->delete();
	}
	function getDetalleTiempoExtra($eCodConsecutivo){
		
		$query="select distinct de.*,t.NombreEmpleado,t.ApellidoPaterno,t.ApellidoMaterno,c.tNombre as Causa,c.tClave as tClaveCausa,
		t.eCentroCosto as CentroCosto,ori.eCentroCosto as CentroCostoDestino,de.tDescripcion,concat(t.eCentroCosto,concat('-',t.tNombreCentroCosto)) as CentroCostoCompleto,
		(select  concat(eCentroCosto,concat('-',tNombreCentroCosto)) as CentroCostoCompleto from workbeat.ca_trabajadores where eCentroCosto=de.tCodCentroCostoDestino limit 1 ) as CentroCostoDestino
		from workbeat.de_registro_tiempo_extra de 
		inner join workbeat.ca_trabajadores t on t.NumeroEmpleado=de.NumeroEmpleado
		inner join workbeat.ca_causas_tiempos_extras c on c.eCodConsecutivo=de.eCodCausa
		inner join workbeat.ca_trabajadores ori on ori.eCentroCosto=de.tCodCentroCostoDestino  
		where eCodSolicitud=$eCodConsecutivo";
		return $this->db->query($query)->getResult();
	}
	function getDatosPrincipalesSolicitud($eCodSolicitud){
		$query="select s.*,d.tNombre as Area,concat(concat(u.Nombre,' '),u.Apellidos) as Supervisor,(select concat(concat(Nombre,' '),Apellidos) from dbmeta.ca_usuarios where eCodUsuario=s.eCodJefe) as Jefe from workbeat.ma_solicitudes_tiempo_extra s
		inner join workbeat.ca_departamentos_tiempos_extras d on d.eCodConsecutivo=s.eCodArea
		INNER JOIN dbmeta.ca_usuarios u ON u.eCodUsuario = s.eCodSolicitante
		where s.eCodConsecutivo=$eCodSolicitud";
		return $this->db->query($query)->getResult();
	}
	function DeleteSolTiempoExtra($eCodConsecutivo){
		$db=$this->db->table('workbeat.de_registro_tiempo_extra');
		
		$db->where('eCodSolicitud',$eCodConsecutivo);
		$db->delete();
		
		$db=$this->db->table('workbeat.ma_solicitudes_tiempo_extra');
		$db->where('eCodConsecutivo',$eCodConsecutivo);
		return  $db->delete();
	}
	function getJefesRevisores($eCodSolicitud){
		$query="select u.* from workbeat.ma_solicitudes_tiempo_extra s
		inner join workbeat.ma_solicitantes_revisores_tiempo_extra d on d.eCodSolicitante=s.eCodSolicitante
		INNER JOIN dbmeta.ca_usuarios u ON u.eCodUsuario = d.eCodRevisor
		where s.eCodConsecutivo=$eCodSolicitud";
		return $this->db->query($query)->getResult();
	}
	function getSolicitudesAutorizadasandPendientes(){
		$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras FROM workbeat.ma_solicitudes_tiempo_extra m 
		inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
		inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
        inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
		LEFT JOIN workbeat.de_registro_tiempo_extra d
			ON d.eCodSolicitud = m.eCodConsecutivo
		where  m.eCodEstatus in (1,2,5,4,6) and  revi.eCodRevisor=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
		return $this->db->query($query)->getResult();
	}
	function AutorizarSolTiempoExtra($eCodConsecutivo,$dataUpdate){
		$db=$this->db->table('workbeat.ma_solicitudes_tiempo_extra');
		$db->set($dataUpdate);
		$db->where('eCodConsecutivo',$eCodConsecutivo);
		return $db->update();
	}
	function getSolicitudesAutorizadasandPendientesgERENTE(){
		$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,SUM(d.TotalHoras) AS TotalHoras
		FROM workbeat.ma_solicitudes_tiempo_extra m 
		inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
		inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
        inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
		LEFT JOIN workbeat.de_registro_tiempo_extra d
			ON d.eCodSolicitud = m.eCodConsecutivo
		where  m.eCodEstatus in (2,4) and  revi.eCodRevisor2=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
		return $this->db->query($query)->getResult();
	}
	
	function getTodos($Tipo){
		if($Tipo==1){
			$query="SELECT 
				m.*,
				u.Nombre,
				u.Apellidos,
				de.tNombre AS Area,

				COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
				SUM(d.TotalHoras) AS TotalHoras

			FROM workbeat.ma_solicitudes_tiempo_extra m

			INNER JOIN dbmeta.ca_usuarios u 
				ON u.eCodUsuario = m.eCodSolicitante

			INNER JOIN workbeat.ca_departamentos_tiempos_extras de 
				ON de.eCodConsecutivo = m.eCodArea

			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo

			WHERE m.eCodSolicitante =".$this->session->eCodUsuario." 

			GROUP BY m.eCodConsecutivo

			ORDER BY m.eCodConsecutivo DESC;";
			return $this->db->query($query)->getResult();
		}
		if($Tipo==2){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (1,2,5,4,6) and  revi.eCodRevisor=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
		}
		if($Tipo==3){
				$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,SUM(d.TotalHoras) AS TotalHoras
				FROM workbeat.ma_solicitudes_tiempo_extra m 
				inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
				inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
				inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
				LEFT JOIN workbeat.de_registro_tiempo_extra d
					ON d.eCodSolicitud = m.eCodConsecutivo
				where  m.eCodEstatus in (2,4) and  revi.eCodRevisor2=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
		}
	}
	function getPendientes($Tipo){
		if($Tipo==2){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (1) and  revi.eCodRevisor=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
		if($Tipo==3){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,SUM(d.TotalHoras) AS TotalHoras
			FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (2) and  revi.eCodRevisor2=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
	}
	function getPendientesJefe($Tipo){
		if($Tipo==1){
			$query="SELECT 
				m.*,
				u.Nombre,
				u.Apellidos,
				de.tNombre AS Area,

				COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
				SUM(d.TotalHoras) AS TotalHoras

			FROM workbeat.ma_solicitudes_tiempo_extra m

			INNER JOIN dbmeta.ca_usuarios u 
				ON u.eCodUsuario = m.eCodSolicitante

			INNER JOIN workbeat.ca_departamentos_tiempos_extras de 
				ON de.eCodConsecutivo = m.eCodArea

			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo

			WHERE m.eCodSolicitante =".$this->session->eCodUsuario." and m.eCodEstatus in (1)

			GROUP BY m.eCodConsecutivo

			ORDER BY m.eCodConsecutivo DESC;";
			return $this->db->query($query)->getResult();
		}
	}
	function getPendientesGerente($Tipo){
		if($Tipo==1){
			$query="SELECT 
				m.*,
				u.Nombre,
				u.Apellidos,
				de.tNombre AS Area,

				COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
				SUM(d.TotalHoras) AS TotalHoras

			FROM workbeat.ma_solicitudes_tiempo_extra m

			INNER JOIN dbmeta.ca_usuarios u 
				ON u.eCodUsuario = m.eCodSolicitante

			INNER JOIN workbeat.ca_departamentos_tiempos_extras de 
				ON de.eCodConsecutivo = m.eCodArea

			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo

			WHERE m.eCodSolicitante =".$this->session->eCodUsuario." and m.eCodEstatus in (2)

			GROUP BY m.eCodConsecutivo

			ORDER BY m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
		if($Tipo==2){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (2) and  revi.eCodRevisor=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
	}
	function getAutorizadas($Tipo){
		if($Tipo==1){
			$query="SELECT 
				m.*,
				u.Nombre,
				u.Apellidos,
				de.tNombre AS Area,

				COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
				SUM(d.TotalHoras) AS TotalHoras

			FROM workbeat.ma_solicitudes_tiempo_extra m

			INNER JOIN dbmeta.ca_usuarios u 
				ON u.eCodUsuario = m.eCodSolicitante

			INNER JOIN workbeat.ca_departamentos_tiempos_extras de 
				ON de.eCodConsecutivo = m.eCodArea

			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo

			WHERE m.eCodSolicitante =".$this->session->eCodUsuario." and m.eCodEstatus in (4)

			GROUP BY m.eCodConsecutivo

			ORDER BY m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
		if($Tipo==3){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,SUM(d.TotalHoras) AS TotalHoras
			FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (4) and  revi.eCodRevisor2=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
		}
		if($Tipo==2){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (4) and  revi.eCodRevisor=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
	}
	function getRechazadas($Tipo){
		if($Tipo==2){
			$query="SELECT m.*,u.Nombre,u.Apellidos,de.tNombre Area,COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
			SUM(d.TotalHoras) AS TotalHoras FROM workbeat.ma_solicitudes_tiempo_extra m 
			inner join dbmeta.ca_usuarios u on u.eCodUsuario=m.eCodSolicitante
			inner join workbeat.ca_departamentos_tiempos_extras de on de.eCodConsecutivo=m.eCodArea
			inner join workbeat.ma_solicitantes_revisores_tiempo_extra revi on revi.eCodSolicitante=m.eCodSolicitante
			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			where  m.eCodEstatus in (5) and  revi.eCodRevisor=".$this->session->eCodUsuario." group by m.eCodConsecutivo order by m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
		if($Tipo==1){
			$query="SELECT 
				m.*,
				u.Nombre,
				u.Apellidos,
				de.tNombre AS Area,

				COUNT(DISTINCT d.NumeroEmpleado) AS TotalEmpleados,
				SUM(d.TotalHoras) AS TotalHoras

			FROM workbeat.ma_solicitudes_tiempo_extra m

			INNER JOIN dbmeta.ca_usuarios u 
				ON u.eCodUsuario = m.eCodSolicitante

			INNER JOIN workbeat.ca_departamentos_tiempos_extras de 
				ON de.eCodConsecutivo = m.eCodArea

			LEFT JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo

			WHERE m.eCodSolicitante =".$this->session->eCodUsuario." and m.eCodEstatus in (3,5)

			GROUP BY m.eCodConsecutivo

			ORDER BY m.eCodConsecutivo DESC";
			return $this->db->query($query)->getResult();
			
		}
	}
	function getParametro($Tipo){
		$query="select valor from workbeat.sis_parametros_tiempoextra where eCodConsecutivo=".$Tipo;
		$rs=$this->db->query($query)->getRow();
		return $rs->valor;
	}
	function getCentros(){
		$query="SELECT distinct CentrosCostos,CCOTexto FROM workbeat.ca_datos_base;";
		return $this->db->query($query)->getResult();
	}
	function getDatosNivel2(){
		$query="SELECT us.email,us.Nombre,us.apellidos FROM workbeat.ma_solicitantes_revisores_tiempo_extra t 
		inner join dbmeta.ca_usuarios us on us.eCodUsuario=t.eCodRevisor
		where eCodSolicitante=".$this->session->eCodUsuario." limit 1";
		return $this->db->query($query)->getRow();
	}
	function getDatosNivel2byGerente(){
		$query="SELECT us.email,us.Nombre,us.apellidos FROM workbeat.ma_solicitantes_revisores_tiempo_extra t 
		inner join dbmeta.ca_usuarios us on us.eCodUsuario=t.eCodRevisor
		where eCodRevisor2=".$this->session->eCodUsuario." limit 1";
		return $this->db->query($query)->getRow();
	}
	function getDatosNivel3(){
		$query="SELECT us.email,us.Nombre,us.apellidos FROM workbeat.ma_solicitantes_revisores_tiempo_extra t 
		inner join dbmeta.ca_usuarios us on us.eCodUsuario=t.eCodRevisor2
		where eCodRevisor=".$this->session->eCodUsuario." and eCodSolicitante=1 limit 1";
		return $this->db->query($query)->getRow();
	}
	function getDepartementobyClave($clave){
		$query="select tNombre from workbeat.ca_departamentos_tiempos_extras where eCodConsecutivo=".$clave;
		$rs=$this->db->query($query)->getRow();
		return $rs->tNombre;
	}
	
	function getDatosNivel1(){
		$query="SELECT distinct us.email,us.Nombre,us.apellidos FROM workbeat.ma_solicitantes_revisores_tiempo_extra t 
		inner join dbmeta.ca_usuarios us on us.eCodUsuario=t.eCodSolicitante
		where eCodRevisor=".$this->session->eCodUsuario." limit 1";
		return $this->db->query($query)->getRow();
	}
	function getDatosNivel1byGerente(){
		$query="SELECT distinct us.email,us.Nombre,us.apellidos FROM workbeat.ma_solicitantes_revisores_tiempo_extra t 
		inner join dbmeta.ca_usuarios us on us.eCodUsuario=t.eCodSolicitante
		where eCodRevisor2=".$this->session->eCodUsuario." limit 1";
		return $this->db->query($query)->getRow();
	}
}

?>