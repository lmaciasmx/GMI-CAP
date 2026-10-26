<?php

namespace App\Controllers\Reclutamiento;

use App\Controllers\BaseController;
use App\Models\Reclutamiento\SolicitudModel;

class Solicitudes extends BaseController
{
    protected $solicitudModel;
    protected $session;

    public function __construct()
    {
        $this->session = session();

        $this->solicitudModel =
            new SolicitudModel();
    }

    private function validarAcceso(): bool
    {
        return (int)($this->session->eCodRol ?? 0) === 542;
    }

    public function index()
    {
        if (!$this->validarAcceso()) {
            return view(
                'Reclutamiento/error_acceso'
            );
        }

        $data = [];

        $data['estatus'] =
            $this->solicitudModel->getEstatusDisponibles();

        $data['localidades'] =
            $this->solicitudModel->getLocalidades();

        return view(
            'Reclutamiento/solicitudes/principal',
            $data
        );
    }

    public function listar()
	{
		if (!$this->validarAcceso()) {

			return $this->response->setJSON([
				'draw' => 0,
				'recordsTotal' => 0,
				'recordsFiltered' => 0,
				'data' => []
			]);
		}

		$draw =
			(int)$this->request->getPost('draw');

		$start =
			(int)$this->request->getPost('start');

		$length =
			(int)$this->request->getPost('length');

		$search =
			$this->request->getPost('search');

		$buscar =
			trim(
				(string)$this->request->getPost('buscar')
			);

		$order =
			$this->request->getPost('order');

		$columnaOrden =
			(int)($order[0]['column'] ?? 7);

		$direccionOrden =
			strtolower(
				(string)($order[0]['dir'] ?? 'desc')
			);

		if (!in_array($direccionOrden, ['asc', 'desc'], true)) {
			$direccionOrden = 'desc';
		}

		$filtros = [

			'buscar' =>
				$buscar,

			'estado' =>
				trim(
					(string)$this->request->getPost('estado')
				),

			'localidad' =>
				trim(
					(string)$this->request->getPost('localidad')
				),

			'fecha_desde' =>
				$this->request->getPost('fecha_desde'),

			'fecha_hasta' =>
				$this->request->getPost('fecha_hasta'),

			'start' =>
				$start,

			'length' =>
				$length,

			'columna_orden' =>
				$columnaOrden,

			'direccion_orden' =>
				$direccionOrden
		];

		$resultado =
			$this->solicitudModel
				->getSolicitudesDataTable(
					$filtros
				);

		return $this->response->setJSON([

			'draw' =>
				$draw,

			'recordsTotal' =>
				$resultado['total'],

			'recordsFiltered' =>
				$resultado['filtrados'],

			'data' =>
				$resultado['datos']

		]);
	}

    
	public function resumen()
	{
		if (!$this->validarAcceso()) {

			return $this->response->setJSON([
				'success' => false,
				'datos' => []
			]);
		}

		$filtros = [

			'estado' =>
				trim(
					(string)$this->request->getPost('estado')
				),

			'localidad' =>
				trim(
					(string)$this->request->getPost('localidad')
				),

			'fecha_desde' =>
				$this->request->getPost('fecha_desde'),

			'fecha_hasta' =>
				$this->request->getPost('fecha_hasta')

		];

		return $this->response->setJSON([

			'success' => true,

			'datos' =>
				$this->solicitudModel
					->getResumenSolicitudes(
						$filtros
					)

		]);
	}
	public function detalle()
	{
		$id =
			(int)$this->request->getPost('id');

		if ($id <= 0) {

			return $this->response->setJSON([
				'estado'  => false,
				'mensaje' => 'Solicitud no válida.'
			]);
		}


		$solicitudModel =
			new \App\Models\Reclutamiento\SolicitudModel();

		$solicitud =
			$solicitudModel->getDetalleSolicitud(
				$id
			);
		$documentosDeclarados =	$solicitudModel->getDocumentosDeclarados($id);

		if (!$solicitud) {

			return $this->response->setJSON([
				'estado'  => false,
				'mensaje' => 'No se encontró la solicitud.'
			]);
		}


		$data = [
			'solicitud' => $solicitud,
			'documentosDeclarados' => $documentosDeclarados
		];


		$html =
			view(
				'reclutamiento/solicitudes/detalle',
				$data
			);


		return $this->response->setJSON([
			'estado' => true,
			'html'   => $html
		]);
	}
	public function conversacion()
	{
		$sessionId =
			trim(
				(string)$this->request->getPost(
					'session_id'
				)
			);

		if ($sessionId === '') {

			return $this->response->setJSON([
				'estado'  => false,
				'mensaje' => 'No se recibió la sesión de la conversación.'
			]);
		}


		$solicitudModel =
			new \App\Models\Reclutamiento\SolicitudModel();


		$mensajes =
			$solicitudModel
				->getConversacionSolicitud(
					$sessionId
				);


		$data = [
			'mensajes' => $mensajes
		];


		$html =
			view(
				'reclutamiento/solicitudes/conversacion',
				$data
			);


		return $this->response->setJSON([
			'estado' => true,
			'html'   => $html
		]);
	}
	
}