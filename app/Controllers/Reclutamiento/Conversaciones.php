<?php

namespace App\Controllers\Reclutamiento;

use App\Controllers\BaseController;
use App\Models\Reclutamiento\ConversacionModel;

class Conversaciones extends BaseController
{
	public function index()
	{
		return view('Reclutamiento/Conversaciones/index');
	}

	public function listar()
	{
		$model = new ConversacionModel();

		$datos = $model->listar([
			'buscar' => trim((string)$this->request->getGet('buscar')),
			'fecha'  => trim((string)$this->request->getGet('fecha'))
		]);

		return $this->response->setJSON([
			'estado' => 'success',
			'datos'  => $datos
		]);
	}

	public function detalle()
	{
		$sessionId = trim((string)$this->request->getPost('session_id'));

		if ($sessionId === '') {
			return $this->response->setJSON([
				'estado' => false,
				'mensaje' => 'No se recibió la sesión.'
			]);
		}

		$model = new ConversacionModel();

		$mensajes = $model->obtenerConversacion($sessionId);

		$html = view(
			'Reclutamiento/Solicitudes/conversacion',
			[
				'mensajes' => $mensajes
			]
		);

		return $this->response->setJSON([
			'estado' => true,
			'html' => $html
		]);
	}
}