<?php

namespace App\Controllers\Reclutamiento;

use App\Controllers\BaseController;
use App\Models\Reclutamiento\CandidatoModel;
use App\Models\Reclutamiento\CandidatoSeguimientoModel;

class Candidatos extends BaseController
{
    public function index()
    {
        return view(
            'Reclutamiento/Candidatos/index'
        );
    }


    public function listar()
	{
		$model = new CandidatoModel();

		$filtros = [
			'buscar'              => trim((string)$this->request->getGet('buscar')),
			'estatus_cita'        => trim((string)$this->request->getGet('estatus_cita')),
			'estatus_seguimiento' => trim((string)$this->request->getGet('estatus_seguimiento')),
			'fecha'               => trim((string)$this->request->getGet('fecha'))
		];

		$pagina = max(1, (int)$this->request->getGet('pagina'));
		$limite = 20;

		$resultado = $model->obtenerCandidatos($filtros, $pagina, $limite);

		return $this->response->setJSON(['estado' => 'success', 'datos' => $resultado['datos'], 'paginacion' => $resultado['paginacion']]);
	}


    public function resumen()
    {
        $db =
            \Config\Database::connect();

        $hoy =
            date('Y-m-d');


        /*
        |--------------------------------------------------------------------------
        | Citas de hoy
        |--------------------------------------------------------------------------
        */
        $citasHoy =
            $db
                ->table(
                    'reclutamiento.rh_postulaciones_chat'
                )
                ->where(
                    'fecha_cita',
                    $hoy
                )
                ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | Confirmadas
        |--------------------------------------------------------------------------
        */
        $confirmadas =
            $db
                ->table(
                    'reclutamiento.rh_postulaciones_chat'
                )
                ->where(
                    'fecha_cita',
                    $hoy
                )
                ->where(
                    'estatus_cita',
                    'confirmada'
                )
                ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | Pendientes de confirmar
        |--------------------------------------------------------------------------
        */
        $pendientes =
            $db
                ->table(
                    'reclutamiento.rh_postulaciones_chat'
                )
                ->where(
                    'fecha_cita',
                    $hoy
                )
                ->groupStart()
                    ->where(
                        'estatus_cita IS NULL',
                        null,
                        false
                    )
                    ->orWhere(
                        'estatus_cita',
                        'programada'
                    )
                ->groupEnd()
                ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | Requieren revisión
        |--------------------------------------------------------------------------
        */
        $requierenRevision =
            $db
                ->table(
                    'reclutamiento.rh_postulaciones_chat'
                )
                ->where(
                    'estatus_seguimiento',
                    'requiere_revision'
                )
                ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | Reagendadas
        |--------------------------------------------------------------------------
        */
        $reagendadas =
            $db
                ->table(
                    'reclutamiento.rh_postulaciones_chat'
                )
                ->where(
                    'fecha_cita',
                    $hoy
                )
                ->where(
                    'estatus_cita',
                    'reagendada'
                )
                ->countAllResults();


        return $this->response
            ->setJSON([
                'estado' => 'success',

                'datos' => [
                    'citas_hoy' =>
                        $citasHoy,

                    'confirmadas' =>
                        $confirmadas,

                    'pendientes' =>
                        $pendientes,

                    'requieren_revision' =>
                        $requierenRevision,

                    'reagendadas' =>
                        $reagendadas
                ]
            ]);
    }


    public function seguimientos($postulacionId)
    {
        $model =
            new CandidatoSeguimientoModel();

        $datos =
            $model->obtenerPorPostulacion(
                $postulacionId
            );


        return $this->response
            ->setJSON([
                'estado' => 'success',
                'datos'  => $datos
            ]);
    }
	public function agendaHoy()
	{
		$model =
			new CandidatoModel();


		$datos =
			$model->obtenerAgendaHoy();


		return $this->response
			->setJSON([
				'estado' => 'success',
				'datos'  => $datos
			]);
	}
	public function detalle($id)
	{
		$model = new CandidatoModel();

		$candidato = $model->obtenerDetalle((int)$id);

		if (!$candidato){
			return $this->response->setJSON(['estado' => false, 'mensaje' => 'No se encontró el candidato.']);
		}

		$documentosDeclarados = $model->obtenerDocumentosDeclarados((int)$id);

		$html = view(
			'Reclutamiento/Candidatos/detalle',
			[
				'candidato' => $candidato,
				'documentosDeclarados' => $documentosDeclarados
			]
		);

		return $this->response->setJSON(['estado' => true, 'html' => $html]);
	}
	public function conversacion()
	{
		$sessionId = trim((string)$this->request->getPost('session_id'));

		if ($sessionId === ''){
			return $this->response->setJSON(['estado' => false, 'mensaje' => 'No se recibió la sesión de la conversación.']);
		}

		$model = new CandidatoModel();

		$mensajes = $model->obtenerConversacion($sessionId);

		$html = view(
			'Reclutamiento/solicitudes/conversacion',
			['mensajes' => $mensajes]
		);

		return $this->response->setJSON(['estado' => true, 'html' => $html]);
	}
	public function guardarSeguimiento()
	{
		$id = (int)$this->request->getPost('id');
		$estatus = trim((string)$this->request->getPost('estatus'));
		$descripcion = trim((string)$this->request->getPost('descripcion'));

		if ($id <= 0){
			return $this->response->setJSON(['estado' => false, 'mensaje' => 'Candidato no válido.']);
		}

		if ($estatus === ''){
			return $this->response->setJSON(['estado' => false, 'mensaje' => 'Selecciona un estatus de seguimiento.']);
		}

		$model = new CandidatoModel();
		$eCodUsuario = (int)($this->session->eCodUsuario ?? 0);
		$reclutadorId = $model->obtenerReclutadorPorUsuario($eCodUsuario);

		if (!$reclutadorId){
			return $this->response->setJSON([
				'estado' => false,
				'mensaje' => 'El usuario actual no está relacionado con un reclutador.'
			]);
		}

		$resultado = $model->guardarSeguimiento(
			$id,
			$estatus,
			$descripcion,
			$eCodUsuario,
			$reclutadorId
		);

		if (!$resultado){
			return $this->response->setJSON(['estado' => false, 'mensaje' => 'No fue posible registrar el seguimiento.']);
		}

		return $this->response->setJSON(['estado' => true, 'mensaje' => 'Seguimiento registrado correctamente.']);
	}
	
}