<?php

namespace App\Controllers\TiempoExtra;
use App\Controllers\BaseController;
use App\Models\MSolicitudes;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Inicio extends BaseController
{
	public function __construct(){
		$this->db = \Config\Database::connect();
		$this->msolicitudes = new MSolicitudes();
		
		$this->session=session();
	}
	public function index(){
		$data['Admin']=$this->msolicitudes->getTipoUsuario();
		
		

		$rs=$this->msolicitudes->getDepartamentos();
		$data['departamentos']=$rs;
		
		//valida tipo usuario 
		$eCodTipoUsuario=$this->msolicitudes->getTipoUsuarioTiempoExtra();
		$data['TipoSolicitante']='';
		$data['Tipo']='';
		if($eCodTipoUsuario==1){
			$data['Solicitante']='';
			$data['Tipo']='1';
			$solicitudes=$this->msolicitudes->getSolicitudesRealizadas();
		}
		if($eCodTipoUsuario==2){
			$data['Tipo']='2';
			$data['Jefe']='';
			$solicitudes=$this->msolicitudes->getSolicitudesAutorizadasandPendientes();
		}
		if($eCodTipoUsuario==3){
			$data['Tipo']='3';
			$data['Gerente']='';
			$solicitudes=$this->msolicitudes->getSolicitudesAutorizadasandPendientesgERENTE();
		}
		if($eCodTipoUsuario==4){
			$data['Tipo']='4';
			$solicitudes=$this->msolicitudes->getSolicitudesAutorizadasandPendientesDirector2();
			//print_r($solicitudes);
		}
		$data['eCodTipoUsuario']=$eCodTipoUsuario;
		$data['solicitudes']=$solicitudes;
		return view('Solicitudes/principal',$data);
		
		
	}
	
	function newSol(){
		//valida tipo usuario 
		$eCodTipoUsuario=$this->msolicitudes->getTipoUsuarioTiempoExtra();
		$data['TipoSolicitante']='';
		$data['Tipo']='';
		if($eCodTipoUsuario==1){
			$data['Solicitante']='';
			$data['Tipo']='1';
			$solicitudes=$this->msolicitudes->getSolicitudesRealizadas();
		}
		if($eCodTipoUsuario==2){
			$data['Tipo']='2';
			$data['Jefe']='';
			$solicitudes=$this->msolicitudes->getSolicitudesAutorizadasandPendientes();
		}
		if($eCodTipoUsuario==3){
			$data['Tipo']='3';
			$data['Gerente']='';
			$solicitudes=$this->msolicitudes->getSolicitudesAutorizadasandPendientesgERENTE();
		}
		if($eCodTipoUsuario==4){
			$data['Tipo']='4';
			$solicitudes=$this->msolicitudes->getSolicitudesAutorizadasandPendientesDirector2();
			//print_r($solicitudes);
		}
		$data['eCodTipoUsuario']=$eCodTipoUsuario;
		
		$eCodSolicitud=$this->request->getPost('eCodConsecutivo');
		$opcion=$this->request->getPost('opcion');
		$data['opcion']=$opcion;
		
		$departamentos=$this->msolicitudes->getDepartamentos();
		$data['departamentos']=$departamentos;
		
		$causas=$this->msolicitudes->getCausasTiempoExtra();
		$data['causas']=$causas;
		
		$centrocosto=$this->msolicitudes->getCentrosCostos();
		$data['centrocosto']=$centrocosto;
		
		
		if($eCodSolicitud!=''){
			
			$data['DetalleSolicitud']=$this->msolicitudes->getDetalleTiempoExtra($eCodSolicitud);
			$data['DatosSolicitud']=$this->msolicitudes->getDatosPrincipalesSolicitud($eCodSolicitud);
			//print_r($data['DatosSolicitud']);
			$data['eCodSolicitud']=$eCodSolicitud;
			if($eCodTipoUsuario==1){
				//$data['Jefes']=$this->msolicitudes->getJefesRevisores($eCodSolicitud);
			}
		}
		
		return view('Solicitudes/newsol',$data);
	}
	function getTrabjadorbyNumeroEmpleado(){
		
		$term=$this->request->getGet('term');
        $data=$this->msolicitudes->getTrabjadorbyNumeroEmpleado($term);
		return $this->response->setJSON($data);
	}
	function guardarTiempoExtra(){
		
		$teCodDepartamento=$this->request->getPost('teCodDepartamento');
		$tObservaciones=$this->request->getPost('tObservaciones');
		$fhFecha=$this->request->getPost('fhFecha');
		$Lista=$this->request->getPost('Lista');
		$codigoSolicitud=$this->request->getPost('codigoSolicitud');
		$TipoEnvio=$this->request->getPost('TipoEnvio');
		
		if($teCodDepartamento!='' && $fhFecha!='' && $Lista!='' && $codigoSolicitud==''){
			$dataInsertar=array(
				'eCodArea'=>$teCodDepartamento,
				'eCodSolicitante'=>$this->session->eCodUsuario,
				'fhFechaSolicitud'=>$fhFecha,
				'eCodEstatus'=>($TipoEnvio==2 ? 1 :NULL),
				'tObservaciones'=>$tObservaciones
			);
			if($eCodSolicitud=$this->msolicitudes->insertaSolicitud($dataInsertar)){
				
				$Lista=explode("*",$Lista);
				//print_r($Lista);
				
				foreach($Lista as $key2){
					if($key2!=''){
						$res=explode("|",$key2);
						
						if(isset($res[0]) && isset($res[1]) &&  isset($res[2]) &&  isset($res[3]) &&  isset($res[4]) && isset($res[5]) && isset($res[6]) &&  isset($res[7]) &&  isset($res[8]) &&  isset($res[9]) &&  isset($res[10])){
							$dataInser=array(
							  'NumeroEmpleado'=>$res[0],
							  'Hora_Entrada'=>$res[1],
							  'Hora_Salida'=>$res[2],
							  'TotalHoras'=>$res[3],
							 // 'eFolioComedor'=>$res[4],
							  'eCodCausa'=>$res[5],
							 // 'eCodDepartamento'=>$res[6],
							  'tCodCentroCosto'=>$res[7],
							  'tCodCentroCostoDestino'=>$res[8],
							  'tDescripcion'=>$res[9],
							  'eFirma'=>$res[10],
							  'fhFechaFirma'=>($res[11]!='' ? $res[11]:NULL),
							  'eCodSolicitud'=>$eCodSolicitud,
							  'fhFecha'=>$fhFecha,
							  'eCodAreaSolicitud'=>$teCodDepartamento
							);
							$this->msolicitudes->guardarTiempoExtra($dataInser);
						}
					}
				}

				return $this->response->setJSON([
					'error' => true,
					'codigo'=>$eCodSolicitud,
					'mensaje' => 'Solicitud generada con éxito'
				]);
			}else{
				return $this->response->setJSON([
					'error' => false,
					'mensaje' => 'Error al intentar registrar la solicitud'
				]);
			}
		}else{
			$dataUpdate=array(
				'eCodArea'=>$teCodDepartamento,
				'fhFechaSolicitud'=>$fhFecha,
				'eCodEstatus'=>($TipoEnvio==2 ? 1 :NULL),
				'tObservaciones'=>$tObservaciones
			);
			if($this->msolicitudes->UpdateSolicitud($dataUpdate,$codigoSolicitud)){
				//delete registros de esta solicitiud
				$this->msolicitudes->deteledetallebefortInsertTiempoExtra($codigoSolicitud);
				
				$Lista=explode("*",$Lista);
				//print_r($Lista);
				
				foreach($Lista as $key2){
					if($key2!=''){
						$res=explode("|",$key2);
						
						if(isset($res[0]) && isset($res[1]) &&  isset($res[2]) &&  isset($res[3]) &&  isset($res[4]) && isset($res[5]) && isset($res[6]) &&  isset($res[7]) &&  isset($res[8]) &&  isset($res[9]) &&  isset($res[10])){
							$dataInser=array(
							  'NumeroEmpleado'=>$res[0],
							  'Hora_Entrada'=>$res[1],
							  'Hora_Salida'=>$res[2],
							  'TotalHoras'=>$res[3],
							  'eFolioComedor'=>$res[4],
							  'eCodCausa'=>$res[5],
							//  'eCodDepartamento'=>$res[6],
							  'tCodCentroCosto'=>$res[7],
							  'tCodCentroCostoDestino'=>$res[8],
							  'tDescripcion'=>$res[9],
							  'eFirma'=>$res[10],
							  'fhFechaFirma'=>($res[11]!='' ? $res[11]:NULL),
							  'eCodSolicitud'=>$codigoSolicitud,
							  'fhFecha'=>$fhFecha,
							  'eCodAreaSolicitud'=>$teCodDepartamento
							);
							$this->msolicitudes->guardarTiempoExtra($dataInser);
						}
					}
				}

				return $this->response->setJSON([
					'error' => true,
					'codigo'=>$codigoSolicitud,
					'mensaje' => 'Solicitud actualizada con éxito'
				]);
			}else{
				return $this->response->setJSON([
					'error' => false,
					'mensaje' => 'Error al intentar actualizar la solicitud'
				]);
			}
		}	
		
	}
	function viwDeleteSTE(){
		$data['eCodConsecutivo']=$this->request->getPost('eCodConsecutivo');
		return view('Solicitudes/viwDeleteSTE',$data);
	}
	function deleteSolTEX(){
		
		$eCodConsecutivo=$this->request->getPost('eCodConsecutivo');
		echo $this->msolicitudes->DeleteSolTiempoExtra($eCodConsecutivo);
	}
	function AutorizarSolTEX(){
		
		$eCodConsecutivo=$this->request->getPost('eCodConsecutivo');
		$eCodEstatus=$this->request->getPost('eCodEstatus');
		$tMotivoRechazo=$this->request->getPost('tMotivoRechazo');
		
		if($eCodEstatus==2 || $eCodEstatus==3){
			$updata=array(
				'eCodEstatus'=>$eCodEstatus,
				'tMotivoRechazo'=>$tMotivoRechazo,
				'eCodJefe'=>$this->session->eCodUsuario
			);
		}
		if($eCodEstatus==4 || $eCodEstatus==5){
			$updata=array(
				'eCodEstatus'=>$eCodEstatus,
				'tMotivoRechazo2'=>$tMotivoRechazo,
				'eCodGerente'=>$this->session->eCodUsuario
			);
		}
		
		echo $this->msolicitudes->AutorizarSolTiempoExtra($eCodConsecutivo,$updata);
	}
	function viwRechazaSol(){
		$data['eCodConsecutivo']=$this->request->getPost('eCodConsecutivo');
		$data['eCodEstatus']=$this->request->getPost('estatus');
		return view('Solicitudes/viwRechazaSol',$data);
	}
	function viwAceptarSol(){
		$data['eCodConsecutivo']=$this->request->getPost('eCodConsecutivo');
		$data['eCodEstatus']=$this->request->getPost('estatus');
		return view('Solicitudes/viwAceptarSol',$data);
	}
	function viewValidaEmpleado(){
		$data['id']=$this->request->getPost('id');
		$data['NumeroEmpleado']=$this->request->getPost('NumeroEmpleado');
		return view('Solicitudes/viewValidaEmpleado',$data);
	}
	
	function getTodos(){
		$data['Tipo']=$this->request->getPost('TipoUsuario');
		$data['eCodTipoUsuario']=$this->request->getPost('TipoUsuario');
		$data['solicitudes']=$this->msolicitudes->getTodos($data['Tipo']);
		return view('Solicitudes/getTodos',$data);
	}
	function getPendientes(){
		$data['Tipo']=$this->request->getPost('TipoUsuario');
		$data['eCodTipoUsuario']=$this->request->getPost('TipoUsuario');
		$data['solicitudes']=$this->msolicitudes->getPendientes($data['Tipo']);
		return view('Solicitudes/getPendientes',$data);
	}
	function getPendientesJefe(){
		$data['Tipo']=$this->request->getPost('TipoUsuario');
		$data['eCodTipoUsuario']=$this->request->getPost('TipoUsuario');
		$data['solicitudes']=$this->msolicitudes->getPendientesJefe($data['Tipo']);
		return view('Solicitudes/getPendientesJefe',$data);
	}
	function getPendientesGerente(){
		$data['Tipo']=$this->request->getPost('TipoUsuario');
		$data['eCodTipoUsuario']=$this->request->getPost('TipoUsuario');
		$data['solicitudes']=$this->msolicitudes->getPendientesGerente($data['Tipo']);
		return view('Solicitudes/getPendientesGerente',$data);
	}
	function getAutorizadas(){
		$data['Tipo']=$this->request->getPost('TipoUsuario');
		$data['eCodTipoUsuario']=$this->request->getPost('TipoUsuario');
		$data['solicitudes']=$this->msolicitudes->getAutorizadas($data['Tipo']);
		return view('Solicitudes/getAutorizadas',$data);
	}
	function getRechazadas(){
		$data['Tipo']=$this->request->getPost('TipoUsuario');
		$data['eCodTipoUsuario']=$this->request->getPost('TipoUsuario');
		$data['solicitudes']=$this->msolicitudes->getRechazadas($data['Tipo']);
		return view('Solicitudes/getRechazadas',$data);
	}
	function excelTiempoExtra(){
		ob_clean();

		$eCodSolicitud = $this->request->getPost('idSol');


		$spreadsheet = IOFactory::load(
			ROOTPATH . 'public/FGP-26.xlsx'
		);

		$sheet = $spreadsheet->getActiveSheet();

		$result = $this->msolicitudes->getDetalleTiempoExtra($eCodSolicitud);
		$DatosSolicitud = $this->msolicitudes->getDatosPrincipalesSolicitud($eCodSolicitud);

		$sheet->setCellValue('M1', $DatosSolicitud[0]->fhFechaSolicitud ?? '');
		$sheet->setCellValue('M2', $DatosSolicitud[0]->Area ?? '');

		$sheet->getStyle('M1')->applyFromArray([
			'font' => [
				'bold' => true,
				'size' => 14
			],
			'alignment' => [
				'horizontal' => Alignment::HORIZONTAL_CENTER
			]
		]);

		$sheet->getStyle('M2')->applyFromArray([
			'font' => [
				'bold' => true,
				'size' => 14
			],
			'alignment' => [
				'horizontal' => Alignment::HORIZONTAL_CENTER
			]
		]);

		$fila = 6;
		$consecutivo = 0;

		foreach ($result as $key) {

			$consecutivo++;

			$sheet->setCellValue('A' . $fila, $consecutivo);
			$sheet->setCellValue('B' . $fila, $key->NumeroEmpleado);
			$sheet->setCellValue(
				'C' . $fila,
				trim(
					$key->NombreEmpleado . ' ' .
					$key->ApellidoPaterno . ' ' .
					$key->ApellidoMaterno
				)
			);
			$sheet->setCellValue('D' . $fila, $key->Hora_Entrada);
			$sheet->setCellValue('E' . $fila, $key->Hora_Salida);
			$sheet->setCellValue('F' . $fila, $key->TotalHoras);
			
			$sheet->setCellValue('G' . $fila, $key->tClaveCausa);
			$sheet->setCellValue('H' . $fila, $key->tCodCentroCosto);
			$sheet->setCellValue('I' . $fila, $key->tCodCentroCostoDestino);
			$sheet->setCellValue('J' . $fila, $key->tDescripcion);
			$sheet->setCellValue('L' . $fila, ($key->eFirma==1 ? 'SI' :'NO'));

			$fila++;
		}

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

		if (ob_get_length()) {
			ob_end_clean();
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="FGP-26.xlsx"');
		header('Cache-Control: max-age=0');
		header('Expires: 0');
		header('Pragma: public');

		$writer->save('php://output');
		exit;
	}
	function validardiashoras(){
		$fhFecha = $this->request->getPost('fhFecha');
		$NumeroEmpleado = $this->request->getPost('NumeroEmpleado');
		$TotalHorasNueva = $this->request->getPost('Horas');
		
		$DiasPermitidos  =$this->msolicitudes->getParametro(1);
		$HorasPermitidas =$this->msolicitudes->getParametro(2);
		
		// Obtener lunes y domingo de la semana
		$fecha = new \DateTime($fhFecha);
		
		$lunes = clone $fecha;
		$lunes->modify('monday this week');

		$domingo = clone $lunes;
		$domingo->modify('+6 days');
		
		$db = \Config\Database::connect();

		$sql = "
			SELECT
				SUM(d.TotalHoras) AS HorasSemana,
				COUNT(DISTINCT m.fhFechaSolicitud) AS DiasSemana
			FROM workbeat.de_registro_tiempo_extra d
			INNER JOIN workbeat.ma_solicitudes_tiempo_extra m
				ON m.eCodConsecutivo = d.eCodSolicitud
			WHERE d.NumeroEmpleado = ?
			  AND m.fhFechaSolicitud BETWEEN ? AND ?
		";
		$resultado = $db->query(
			$sql,
			[
				$NumeroEmpleado,
				$lunes->format('Y-m-d'),
				$domingo->format('Y-m-d')
			]
		)->getRow();
		
		$HorasSemana = (float)($resultado->HorasSemana ?? 0);
		$DiasSemana  = (int)($resultado->DiasSemana ?? 0);
		// Validar horas
		if (($HorasSemana + $TotalHorasNueva) > $HorasPermitidas) {
			return $this->response->setJSON([
				'success' => false,
				'mensaje' => "El empleado excede el límite semanal de {$HorasPermitidas} horas extra."
			]);
		}
		// Verificar si la fecha actual ya existe en la semana
		$existeFecha = $db->table('workbeat.de_registro_tiempo_extra d')
			->select('1')
			->join(
				'workbeat.ma_solicitudes_tiempo_extra m',
				'm.eCodConsecutivo = d.eCodSolicitud'
			)
			->where('d.NumeroEmpleado', $NumeroEmpleado)
			->where('m.fhFechaSolicitud', $fhFecha)
			->get()
			->getRow();

		// Si la fecha no existe, sería un nuevo día trabajado
		if (!$existeFecha && $DiasSemana >= $DiasPermitidos) {
			return $this->response->setJSON([
				'success' => false,
				'mensaje' => "El empleado ya alcanzó el máximo de {$DiasPermitidos} días con tiempo extra en esta semana."
			]);
		}
		return $this->response->setJSON([
				'success' => true,
				'mensaje' => ''
			]);
	}
	function sendmailSolicitud(){
		$eCodSolicitud=$this->request->getPost('eCodSolicitud');
		$datos=$this->msolicitudes->getDatosPrincipalesSolicitud($eCodSolicitud);
		//print_r($datos);exit;
		
		//buscamos el siguiente ivel para tomar el correo
		$datosNivel2=$this->msolicitudes->getDatosNivel2();
		if (filter_var($datosNivel2->email, FILTER_VALIDATE_EMAIL)) {
			 
			  $mensaje = '<html>
				<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,sans-serif;">
				<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:20px;">
					<tr>
						<td align="center">

							<table width="700" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

								<!-- Encabezado -->
								<tr>
									<td style="background:#0d6efd;color:#ffffff;padding:20px;">
										<h2 style="margin:0;">Solicitud de Tiempo Extra</h2>
										<p style="margin:5px 0 0 0;">Pendiente de autorización</p>
									</td>
								</tr>

								<!-- Contenido -->
								<tr>
									<td style="padding:25px;">

										<p>
											Se ha generado una nueva solicitud de tiempo extra que requiere su revisión.
										</p>

										<table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
	
											<tr style="background:#f8f9fa;">
												<td width="35%"><strong>Solicitud</strong></td>
												<td>TE-'.$datos[0]->eCodConsecutivo.'</td>
											</tr>
											<tr style="background:#f8f9fa;">
												<td width="35%"><strong>Solicitante</strong></td>
												<td>'.$this->session->Usuario.'</td>
											</tr>

											<tr>
												<td><strong>Fecha de Solicitud</strong></td>
												<td>'.$datos[0]->fhFechaSolicitud.'</td>
											</tr>

											<tr style="background:#f8f9fa;">
												<td><strong>Área de Solicitud</strong></td>
												<td>'.$datos[0]->Area.'</td>
											</tr>

											<tr>
												<td><strong>Descripción</strong></td>
												<td>'.$datos[0]->tObservaciones.'</td>
											</tr>

										</table>

										<br>

										<div style="background:#fff3cd;border-left:5px solid #ffc107;padding:15px;">
											<strong>Acción requerida:</strong><br>
											Favor de ingresar al sistema para revisar y autorizar esta solicitud.
										</div>

										<br>

										<center>
											<a href="http://consulta.gmar.mx/CAP/?solicitud='.$eCodSolicitud.'"
											   style="
											   background:#198754;
											   color:#ffffff;
											   text-decoration:none;
											   padding:12px 25px;
											   border-radius:5px;
											   display:inline-block;
											   font-weight:bold;">
												Revisar Solicitud
											</a>
										</center>

									</td>
								</tr>

								<!-- Pie -->
								<tr>
									<td style="background:#f8f9fa;padding:15px;color:#6c757d;font-size:12px;text-align:center;">
										Este correo fue generado automáticamente por Grupomar.<br>
										Favor de no responder a este mensaje.
									</td>
								</tr>

							</table>

						</td>
					</tr>
				</table>
				</body>
				</html>
				';

				$Titulo = "Solicitud de Tiempo Extra Pendiente de Autorización";

				$email = \Config\Services::email();

				$email->setFrom('balancedsc@grupomar.com', 'Sistema de Tiempo Extra');
				$email->setTo($datosNivel2->email);
				$email->setBCC('lmacias@grupomar.mx');
				$email->setSubject($Titulo);
				$email->setMessage($mensaje);
				$email->setMailType('html');

				$email->send();
									
		}
	}
	function sendmailSolicitudNivel2(){
		$eCodSolicitud=$this->request->getPost('eCodSolicitud');
		$Tipo=$this->request->getPost('tipo');
		$datos=$this->msolicitudes->getDatosPrincipalesSolicitud($eCodSolicitud);
	    $eCodTipoUsuario=$this->msolicitudes->getTipoUsuarioTiempoExtra();
		
		
		if($eCodTipoUsuario==2){
			if($Tipo==2){
				$datosNivel1=$this->msolicitudes->getDatosNivel1();
				if (filter_var($datosNivel1->email, FILTER_VALIDATE_EMAIL)) {
					$mensaje = '<html>
					<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,sans-serif;">
					<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:20px;">
					<tr>
					<td align="center">

					<table width="700" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

					<!-- Encabezado -->
					<tr>
					<td style="background:#dc3545;color:#ffffff;padding:20px;">
					<h2 style="margin:0;">Solicitud de Tiempo Extra</h2>
					<p style="margin:5px 0 0 0;">Solicitud rechazada</p>
					</td>
					</tr>

					<!-- Contenido -->
					<tr>
					<td style="padding:25px;">

					<p>
					La siguiente solicitud de tiempo extra ha sido <strong>rechazada</strong> por el jefe inmediato.
					</p>

					<table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">

					<tr style="background:#f8f9fa;">
					<td width="35%"><strong>Solicitud</strong></td>
					<td>TE-'.$datos[0]->eCodConsecutivo.'</td>
					</tr>

					<tr>
					<td width="35%"><strong>Jefe</strong></td>
					<td>'.$this->session->Usuario.'</td>
					</tr>

					<tr style="background:#f8f9fa;">
					<td><strong>Fecha de Solicitud</strong></td>
					<td>'.$datos[0]->fhFechaSolicitud.'</td>
					</tr>

					<tr>
					<td><strong>Área de Solicitud</strong></td>
					<td>'.$datos[0]->Area.'</td>
					</tr>

					<tr style="background:#f8f9fa;">
					<td><strong>Descripción</strong></td>
					<td>'.$datos[0]->tObservaciones.'</td>
					</tr>

					</table>

					<br>

					<!-- 🔴 MOTIVO DE RECHAZO -->
					<div style="background:#f8d7da;border-left:5px solid #dc3545;padding:15px;color:#721c24;">
					<strong>Motivo de rechazo:</strong><br>
					'.$datos[0]->tMotivoRechazo.'
					</div>

					<br>

					<div style="background:#f8f9fa;border-left:5px solid #6c757d;padding:15px;">
					El usuario puede revisar su solicitud y realizar las correcciones necesarias para reenviarla.
					</div>

					<br>

					<center>
					<a href="http://consulta.gmar.mx/CAP/?solicitud='.$eCodSolicitud.'"
					style="
					background:#dc3545;
					color:#ffffff;
					text-decoration:none;
					padding:12px 25px;
					border-radius:5px;
					display:inline-block;
					font-weight:bold;">
					Revisar Solicitud
					</a>
					</center>

					</td>
					</tr>

					<!-- Pie -->
					<tr>
					<td style="background:#f8f9fa;padding:15px;color:#6c757d;font-size:12px;text-align:center;">
					Este correo fue generado automáticamente por Grupomar.<br>
					Favor de no responder a este mensaje.
					</td>
					</tr>

					</table>

					</td>
					</tr>
					</table>
					</body>
					</html>';

					$Titulo = "Solicitud de Tiempo Extra Rechazada";

					$email = \Config\Services::email();

					$email->setFrom('balancedsc@grupomar.com', 'Sistema de Tiempo Extra');
					$email->setTo($datosNivel1->email);
					$email->setBCC('lmacias@grupomar.mx');
					$email->setSubject($Titulo);
					$email->setMessage($mensaje);
					$email->setMailType('html');

					$email->send();
				}
			}
			if($Tipo==1){
				$datosNivel3=$this->msolicitudes->getDatosNivel3();
				
				if (filter_var($datosNivel3->email, FILTER_VALIDATE_EMAIL)) {
					$mensaje = '<html>
					<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,sans-serif;">
					<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:20px;">
						<tr>
							<td align="center">

								<table width="700" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

									<!-- Encabezado -->
									<tr>
										<td style="background:#0d6efd;color:#ffffff;padding:20px;">
											<h2 style="margin:0;">Solicitud de Tiempo Extra</h2>
											<p style="margin:5px 0 0 0;">Pendiente de autorización gerencial</p>
										</td>
									</tr>

									<!-- Contenido -->
									<tr>
										<td style="padding:25px;">

											<p>
												La siguiente solicitud de tiempo extra ha sido revisada y autorizada por la jefatura correspondiente y se encuentra pendiente de su autorización.
											</p>

											<table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
		
												<tr style="background:#f8f9fa;">
													<td width="35%"><strong>Solicitud</strong></td>
													<td>TE-'.$datos[0]->eCodConsecutivo.'</td>
												</tr>
												<tr style="background:#f8f9fa;">
													<td width="35%"><strong>Solicitante</strong></td>
													<td>'.$this->session->Usuario.'</td>
												</tr>

												<tr>
													<td><strong>Fecha de Solicitud</strong></td>
													<td>'.$datos[0]->fhFechaSolicitud.'</td>
												</tr>

												<tr style="background:#f8f9fa;">
													<td><strong>Área de Solicitud</strong></td>
													<td>'.$datos[0]->Area.'</td>
												</tr>

												<tr>
													<td><strong>Descripción</strong></td>
													<td>'.$datos[0]->tObservaciones.'</td>
												</tr>

											</table>

											<br>

											<div style="background:#d1ecf1;border-left:5px solid #0dcaf0;padding:15px;">
												<strong>Acción requerida:</strong><br>
												Esta solicitud ya cuenta con la autorización de jefatura y requiere su revisión y autorización gerencial para continuar con el proceso.
											</div>

											<br>

											<center>
												<a href="http://consulta.gmar.mx/CAP/?solicitud='.$eCodSolicitud.'"
												   style="
												   background:#198754;
												   color:#ffffff;
												   text-decoration:none;
												   padding:12px 25px;
												   border-radius:5px;
												   display:inline-block;
												   font-weight:bold;">
													Revisar Solicitud
												</a>
											</center>

										</td>
									</tr>

									<!-- Pie -->
									<tr>
										<td style="background:#f8f9fa;padding:15px;color:#6c757d;font-size:12px;text-align:center;">
											Este correo fue generado automáticamente por Grupomar.<br>
											Favor de no responder a este mensaje.
										</td>
									</tr>

								</table>

							</td>
						</tr>
					</table>
					</body>
					</html>
					';
				
					$Titulo = "Solicitud de Tiempo Extra Pendiente de Autorización";

					$email = \Config\Services::email();

					$email->setFrom('balancedsc@grupomar.com', 'Sistema de Tiempo Extra');
					$email->setTo($datosNivel3->email);
					$email->setBCC('lmacias@grupomar.mx');
					$email->setSubject($Titulo);
					$email->setMessage($mensaje);
					$email->setMailType('html');

					$email->send();
				}
			}
		}
		if($eCodTipoUsuario==3){
			if($Tipo==2){
				$datosNivel2=$this->msolicitudes->getDatosNivel2byGerente();
				$datosNivel1=$this->msolicitudes->getDatosNivel1byGerente();
				if (filter_var($datosNivel2->email, FILTER_VALIDATE_EMAIL)) {
					$mensaje = '<html>
					<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,sans-serif;">
					<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:20px;">
					<tr>
					<td align="center">

					<table width="700" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

					<!-- Encabezado -->
					<tr>
					<td style="background:#dc3545;color:#ffffff;padding:20px;">
					<h2 style="margin:0;">Solicitud de Tiempo Extra</h2>
					<p style="margin:5px 0 0 0;">Solicitud rechazada</p>
					</td>
					</tr>

					<!-- Contenido -->
					<tr>
					<td style="padding:25px;">

					<p>
					La siguiente solicitud de tiempo extra ha sido <strong>rechazada</strong> por gerencia.
					</p>

					<table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">

					<tr style="background:#f8f9fa;">
					<td width="35%"><strong>Solicitud</strong></td>
					<td>TE-'.$datos[0]->eCodConsecutivo.'</td>
					</tr>

					<tr>
					<td width="35%"><strong>Jefe</strong></td>
					<td>'.$this->session->Usuario.'</td>
					</tr>

					<tr style="background:#f8f9fa;">
					<td><strong>Fecha de Solicitud</strong></td>
					<td>'.$datos[0]->fhFechaSolicitud.'</td>
					</tr>

					<tr>
					<td><strong>Área de Solicitud</strong></td>
					<td>'.$datos[0]->Area.'</td>
					</tr>

					<tr style="background:#f8f9fa;">
					<td><strong>Descripción</strong></td>
					<td>'.$datos[0]->tObservaciones.'</td>
					</tr>

					</table>

					<br>

					<!-- 🔴 MOTIVO DE RECHAZO -->
					<div style="background:#f8d7da;border-left:5px solid #dc3545;padding:15px;color:#721c24;">
					<strong>Motivo de rechazo:</strong><br>
					'.$datos[0]->tMotivoRechazo2.'
					</div>

					<br>

					<div style="background:#f8f9fa;border-left:5px solid #6c757d;padding:15px;">
					El usuario puede revisar su solicitud y realizar las correcciones necesarias para reenviarla.
					</div>

					<br>

					<center>
					<a href="http://consulta.gmar.mx/CAP/?solicitud='.$eCodSolicitud.'"
					style="
					background:#dc3545;
					color:#ffffff;
					text-decoration:none;
					padding:12px 25px;
					border-radius:5px;
					display:inline-block;
					font-weight:bold;">
					Revisar Solicitud
					</a>
					</center>

					</td>
					</tr>

					<!-- Pie -->
					<tr>
					<td style="background:#f8f9fa;padding:15px;color:#6c757d;font-size:12px;text-align:center;">
					Este correo fue generado automáticamente por Grupomar.<br>
					Favor de no responder a este mensaje.
					</td>
					</tr>

					</table>

					</td>
					</tr>
					</table>
					</body>
					</html>';

					$Titulo = "Solicitud de Tiempo Extra Rechazada";

					$email = \Config\Services::email();

					$email->setFrom('balancedsc@grupomar.com', 'Sistema de Tiempo Extra');
					$email->setTo($datosNivel2->email,$datosNivel1->email);
					$email->setBCC('lmacias@grupomar.mx');
					$email->setSubject($Titulo);
					$email->setMessage($mensaje);
					$email->setMailType('html');

					$email->send();
				}
			}
			if($Tipo==1){
				$datosNivel2=$this->msolicitudes->getDatosNivel2byGerente();
				$datosNivel1=$this->msolicitudes->getDatosNivel1byGerente();
				if (filter_var($datosNivel1->email, FILTER_VALIDATE_EMAIL)) {
					$mensaje = '<html>
					<body style="margin:0;padding:0;background:#f4f6f9;font-family:Arial,sans-serif;">
					<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f9;padding:20px;">
						<tr>
							<td align="center">

								<table width="700" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

									<!-- Encabezado -->
									<tr>
										<td style="background:#0d6efd;color:#ffffff;padding:20px;">
											<h2 style="margin:0;">Solicitud de Tiempo Extra</h2>
											<p style="margin:5px 0 0 0;">Aprobación final completada</p>
										</td>
									</tr>

									<!-- Contenido -->
									<tr>
										<td style="padding:25px;">

											<p>
												 Le informamos que la siguiente solicitud de tiempo extra ha sido autorizada en su totalidad y ha concluido satisfactoriamente el flujo de aprobación.
											</p>

											<table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
		
												<tr style="background:#f8f9fa;">
													<td width="35%"><strong>Solicitud</strong></td>
													<td>TE-'.$datos[0]->eCodConsecutivo.'</td>
												</tr>
												<tr style="background:#f8f9fa;">
													<td width="35%"><strong>Solicitante</strong></td>
													<td>'.$this->session->Usuario.'</td>
												</tr>

												<tr>
													<td><strong>Fecha de Solicitud</strong></td>
													<td>'.$datos[0]->fhFechaSolicitud.'</td>
												</tr>

												<tr style="background:#f8f9fa;">
													<td><strong>Área de Solicitud</strong></td>
													<td>'.$datos[0]->Area.'</td>
												</tr>

												<tr>
													<td><strong>Descripción</strong></td>
													<td>'.$datos[0]->tObservaciones.'</td>
												</tr>

											</table>

											<br>

											<div style="background:#d1e7dd;border-left:5px solid #198754;padding:15px;">
												<strong>Solicitud autorizada:</strong><br>
												La solicitud cuenta con todas las autorizaciones requeridas y ha finalizado el proceso de aprobación.
											</div>

											<br>

											<center>
												<a href="http://consulta.gmar.mx/CAP/?solicitud='.$eCodSolicitud.'"
												   style="
												   background:#198754;
												   color:#ffffff;
												   text-decoration:none;
												   padding:12px 25px;
												   border-radius:5px;
												   display:inline-block;
												   font-weight:bold;">
													Ver Solicitud
												</a>
											</center>

										</td>
									</tr>

									<!-- Pie -->
									<tr>
										<td style="background:#f8f9fa;padding:15px;color:#6c757d;font-size:12px;text-align:center;">
											Este correo fue generado automáticamente por Grupomar.<br>
											Favor de no responder a este mensaje.
										</td>
									</tr>

								</table>

							</td>
						</tr>
					</table>
					</body>
					</html>
					';

					$Titulo = "Solicitud de Tiempo Extra TE-" . $datos[0]->eCodConsecutivo . " Autorizada";

					$email = \Config\Services::email();

					$email->setFrom('balancedsc@grupomar.com', 'Sistema de Tiempo Extra');
					$email->setTo($datosNivel2->email,$datosNivel1->email);
					$email->setBCC('lmacias@grupomar.mx');
					$email->setSubject($Titulo);
					$email->setMessage($mensaje);
					$email->setMailType('html');

					$email->send();
				}
			}
		}
	}
}