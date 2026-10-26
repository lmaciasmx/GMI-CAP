<?php

namespace App\Models\Reclutamiento;

use CodeIgniter\Model;

class CandidatoModel extends Model
{
    protected $table = 'reclutamiento.rh_postulaciones_chat';

    protected $primaryKey = 'id';

    protected $returnType = 'array';


    public function obtenerCandidatos($filtros = [], $pagina = 1, $limite = 20)
	{
		$builder = $this->db->table('reclutamiento.rh_postulaciones_chat p');

		$builder->select("
			p.id,
			p.folio,
			p.nombre,
			p.telefono,
			p.ubicacion,

			p.vacante_id,
			v.nombre AS vacante_nombre,

			p.fecha_cita,
			p.hora_cita,
			p.estatus_cita,

			p.estatus_seguimiento,
			p.motivo_seguimiento,

			p.estatus_seguimiento AS ultimo_seguimiento_tipo,
			p.motivo_seguimiento AS ultimo_seguimiento_descripcion,

			p.reclutador_id,
			r.Nombre AS reclutador_nombre
		");

		$builder->join(
			'reclutamiento.rh_vacantes v',
			'v.id = p.vacante_id',
			'left'
		);

		$builder->join(
			'reclutamiento.rh_reclutadores r',
			'r.id = p.reclutador_id',
			'left'
		);


		/*
		|--------------------------------------------------------------------------
		| Filtros
		|--------------------------------------------------------------------------
		*/
		if (!empty($filtros['buscar'])) {

			$buscar = $filtros['buscar'];

			$builder->groupStart()
				->like('p.nombre', $buscar)
				->orLike('p.telefono', $buscar)
				->orLike('p.folio', $buscar)
				->groupEnd();
		}

		if (!empty($filtros['estatus_cita'])) {
			$builder->where('p.estatus_cita', $filtros['estatus_cita']);
		}

		if (!empty($filtros['estatus_seguimiento'])) {
			$builder->where('p.estatus_seguimiento', $filtros['estatus_seguimiento']);
		}

		if (!empty($filtros['fecha'])) {
			$builder->where('p.fecha_cita', $filtros['fecha']);
		}


		/*
		|--------------------------------------------------------------------------
		| Total
		|--------------------------------------------------------------------------
		*/
		$total = $builder->countAllResults(false);

		$totalPaginas = $total > 0
			? (int)ceil($total / $limite)
			: 1;

		if ($pagina > $totalPaginas) {
			$pagina = $totalPaginas;
		}

		$offset = ($pagina - 1) * $limite;


		/*
		|--------------------------------------------------------------------------
		| Orden y paginación
		|--------------------------------------------------------------------------
		*/
		$builder->orderBy('p.fecha_cita', 'DESC');
		$builder->orderBy('p.hora_cita', 'ASC');

		$builder->limit($limite, $offset);

		$datos = $builder->get()->getResultArray();


		return [
			'datos' => $datos,

			'paginacion' => [
				'pagina'        => $pagina,
				'limite'        => $limite,
				'total'         => $total,
				'total_paginas' => $totalPaginas
			]
		];
	}
	public function obtenerAgendaHoy()
	{
		$hoy =
			date('Y-m-d');

		$builder =
			$this->db
				->table(
					'reclutamiento.rh_postulaciones_chat p'
				);


		$builder->select("
			p.id,
			p.folio,
			p.nombre,
			p.telefono,
			p.ubicacion,

			p.vacante_id,
			v.nombre AS vacante_nombre,

			p.fecha_cita,
			p.hora_cita,
			p.estatus_cita,

			p.estatus_seguimiento,
			p.motivo_seguimiento,

			p.reclutador_id,
			r.Nombre AS reclutador_nombre
		");


		$builder->join(
			'reclutamiento.rh_vacantes v',
			'v.id = p.vacante_id',
			'left'
		);


		$builder->join(
			'reclutamiento.rh_reclutadores r',
			'r.id = p.reclutador_id',
			'left'
		);


		$builder->where(
			'p.fecha_cita',
			$hoy
		);


		/*
		|--------------------------------------------------------------------------
		| Excluir citas canceladas
		|--------------------------------------------------------------------------
		*/
		$builder->groupStart();

			$builder->where(
				'p.estatus_cita !=',
				'cancelada'
			);

			$builder->orWhere(
				'p.estatus_cita IS NULL',
				null,
				false
			);

		$builder->groupEnd();


		$builder->orderBy(
			'p.hora_cita',
			'ASC'
		);


		return $builder
			->get()
			->getResultArray();
	}
	public function obtenerDetalle($id)
	{
		$builder = $this->db->table('reclutamiento.rh_postulaciones_chat p');

		$builder->select("
			p.*,
			v.nombre AS vacante_nombre,
			r.Nombre AS reclutador_nombre
		");

		$builder->join(
			'reclutamiento.rh_vacantes v',
			'v.id = p.vacante_id',
			'left'
		);

		$builder->join(
			'reclutamiento.rh_reclutadores r',
			'r.id = p.reclutador_id',
			'left'
		);

		$builder->where('p.id', $id);

		return $builder->get()->getRowArray();
	}
	public function obtenerRespuestasPostulacion($uuid)
	{
		$builder = $this->db->table('reclutamiento.rh_postulacion_respuestas r');

		$builder->select("
			r.PasoId,
			r.Respuesta,
			p.Pregunta,
			p.TipoCampo,
			p.TipoDato,
			p.Orden
		");

		$builder->join(
			'reclutamiento.rh_postulacion_pasos p',
			'p.Id = r.PasoId',
			'left'
		);

		$builder->where('r.UUID', $uuid);
		$builder->orderBy('p.Orden', 'ASC');

		return $builder->get()->getResultArray();
	}
	public function obtenerDocumentosDeclarados(int $postulacionId): array
	{
		return $this->db
			->table('reclutamiento.rh_documentos_requeridos dr')
			->select('
				dr.id,
				dr.nombre,
				dr.orden,
				COALESCE(pd.cuenta_con_documento, 0) AS cuenta_con_documento
			')
			->join(
				'reclutamiento.rh_postulacion_documentos pd',
				'pd.documento_id = dr.id
				AND pd.postulacion_id = ' . (int)$postulacionId,
				'left'
			)
			->where('dr.is_active', 1)
			->orderBy('dr.orden', 'ASC')
			->orderBy('dr.nombre', 'ASC')
			->get()
			->getResultArray();
	}
	public function obtenerConversacion(string $sessionId): array
	{
		$sessionId = trim($sessionId);

		if ($sessionId === ''){
			return [];
		}

		return $this->db
			->table('reclutamiento.rh_chat_messages')
			->select('id, role, message, payload, created_at')
			->where('session_id', $sessionId)
			->orderBy('id', 'ASC')
			->get()
			->getResultArray();
	}
	public function guardarSeguimiento(	int $postulacionId,	string $estatus,	string $descripcion,	int $eCodUsuario,	?int $reclutadorId = null	): bool {

		$db = $this->db;

		$db->transStart();

		$db->table('reclutamiento.rh_postulaciones_chat')
			->where('id', $postulacionId)
			->update([
				'estatus_seguimiento' => $estatus,
				'motivo_seguimiento' => $descripcion,
				'updated_at' => date('Y-m-d H:i:s')
			]);

		$db->table('reclutamiento.rh_candidato_seguimientos')
		->insert([
			'postulacion_id' => $postulacionId,
			'reclutador_id' => $reclutadorId,
			'eCodUsuario' => $eCodUsuario,
			'tipo' => $estatus,
			'descripcion' => $descripcion,
			'created_at' => date('Y-m-d H:i:s')
		]);

		$db->transComplete();

		return $db->transStatus();
	}
	public function obtenerReclutadorPorUsuario(int $eCodUsuario): ?int
	{
		if ($eCodUsuario <= 0){
			return null;
		}

		$row = $this->db
			->table('reclutamiento.rh_reclutadores')
			->select('id')
			->where('eCodUsuario', $eCodUsuario)
			->get()
			->getRowArray();

		return !empty($row['id'])
			? (int)$row['id']
			: null;
	}
}