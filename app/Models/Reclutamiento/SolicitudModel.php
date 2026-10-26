<?php

namespace App\Models\Reclutamiento;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table =
        'reclutamiento.rh_postulaciones_chat';

    protected $primaryKey =
        'id';

    protected $returnType =
        'array';

    protected $allowedFields = [
        'session_id',
        'vacante_id',
        'nombre',
        'tiene_telefono',
        'telefono',
        'edad',
        'ubicacion',
        'es_local',
        'trabajo_previo',
        'recomendado',
        'recomendado_nombre',
        'recomendado_nomina',
        'fechas_laboradas',
        'motivo_salida',
        'experiencia_principal',
        'experiencia_principal_otra',
        'lugar_experiencia',
        'lugar_experiencia_otro',
        'esfuerzo_fisico',
        'trabajo_de_pie',
        'actividades_servicios',
        'tiene_restriccion_fisica',
        'restriccion_fisica',
        'selfie',
        'fecha_cita',
        'hora_cita',
        'estatus_cita',
        'agenda_id',
        'documentos',
        'folio',
        'reclutador_id',
        'estado',
        'created_at',
        'updated_at'
    ];

    public function getSolicitudes(
        array $filtros = []
    ): array {

        $builder =
            $this->db
                ->table(
                    'reclutamiento.rh_postulaciones_chat p'
                );

        $builder->select([
            'p.id',
            'p.folio',
            'p.nombre',
            'p.telefono',
            'p.edad',
            'p.ubicacion',
            'p.es_local',
            'p.trabajo_previo',
            'p.recomendado',
            'p.vacante_id',
            'p.fecha_cita',
            'p.hora_cita',
            'p.estatus_cita',
            'p.estado',
            'p.created_at',
            'p.updated_at'
        ]);

        if (!empty($filtros['buscar'])) {

            $buscar =
                $filtros['buscar'];

            $builder->groupStart()
                ->like('p.nombre', $buscar)
                ->orLike('p.telefono', $buscar)
                ->orLike('p.folio', $buscar)
                ->groupEnd();
        }

        if (!empty($filtros['estado'])) {
            $builder->where(
                'p.estado',
                $filtros['estado']
            );
        }

        if (!empty($filtros['localidad'])) {
            $builder->where(
                'p.ubicacion',
                $filtros['localidad']
            );
        }

       

        if (!empty($filtros['fecha_desde'])) {
            $builder->where(
                'DATE(p.created_at) >=',
                $filtros['fecha_desde']
            );
        }

        if (!empty($filtros['fecha_hasta'])) {
            $builder->where(
                'DATE(p.created_at) <=',
                $filtros['fecha_hasta']
            );
        }

        $builder->orderBy(
            'p.created_at',
            'DESC'
        );

        return $builder
            ->get()
            ->getResultArray();
    }

    public function getSolicitud(
        int $id
    ): ?array {

        return $this
            ->where('id', $id)
            ->first();
    }

    public function getEstatusDisponibles(): array
    {
        return $this->db
            ->table('reclutamiento.rh_postulaciones_chat')
            ->select('estado')
            ->where('estado IS NOT NULL')
            ->groupBy('estado')
            ->orderBy('estado')
            ->get()
            ->getResultArray();
    }

    public function getLocalidades(): array
	{
		return $this->db
			->table('reclutamiento.locations')
			->select('id, name')
			->where('is_active', 1)
			->orderBy('name', 'ASC')
			->get()
			->getResultArray();
	}
	public function getSolicitudesDataTable(		array $filtros = []	): array {

		$columnasOrden = [

			0 => 'p.id',
			1 => 'p.estado',
			2 => 'p.folio',
			3 => 'p.nombre',
			4 => 'p.telefono',
			5 => 'p.ubicacion',
			6 => 'p.fecha_cita',
			7 => 'p.created_at'

		];

		$columnaOrden =
			$columnasOrden[
				$filtros['columna_orden'] ?? 7
			] ?? 'p.created_at';

		$direccionOrden =
			$filtros['direccion_orden'] ?? 'desc';


		/*
		|--------------------------------------------------------------------------
		| TOTAL GENERAL
		|--------------------------------------------------------------------------
		*/

		$total =
			$this->db
				->table('reclutamiento.rh_postulaciones_chat')
				->countAllResults();


		/*
		|--------------------------------------------------------------------------
		| CONSULTA FILTRADA
		|--------------------------------------------------------------------------
		*/

		$builder =
			$this->db
				->table(
					'reclutamiento.rh_postulaciones_chat p'
				);

		$builder->select([
			'p.id',
			'p.folio',
			'p.nombre',
			'p.telefono',
			'p.edad',
			'p.ubicacion',
			'p.es_local',
			'p.trabajo_previo',
			'p.recomendado',
			'p.fecha_cita',
			'p.hora_cita',
			'p.estado',
			'p.created_at'
		]);


		if (!empty($filtros['buscar'])) {

			$buscar =
				$filtros['buscar'];

			$builder
				->groupStart()
				->like('p.nombre', $buscar)
				->orLike('p.telefono', $buscar)
				->orLike('p.folio', $buscar)
				->orLike('p.ubicacion', $buscar)
				->groupEnd();
		}


		if (!empty($filtros['estado'])) {

			$builder->where(
				'p.estado',
				$filtros['estado']
			);
		}


		if (!empty($filtros['localidad'])) {

			$builder->where(
				'p.ubicacion',
				$filtros['localidad']
			);
		}


		if (!empty($filtros['fecha_desde'])) {

			$builder->where(
				'DATE(p.created_at) >=',
				$filtros['fecha_desde']
			);
		}


		if (!empty($filtros['fecha_hasta'])) {

			$builder->where(
				'DATE(p.created_at) <=',
				$filtros['fecha_hasta']
			);
		}


		/*
		|--------------------------------------------------------------------------
		| TOTAL FILTRADO
		|--------------------------------------------------------------------------
		*/

		$builderConteo =
			clone $builder;

		$filtrados =
			$builderConteo
				->countAllResults();


		/*
		|--------------------------------------------------------------------------
		| ORDEN + PAGINACIÓN
		|--------------------------------------------------------------------------
		*/

		$builder->orderBy(
			$columnaOrden,
			$direccionOrden
		);

		$builder->limit(
			(int)($filtros['length'] ?? 25),
			(int)($filtros['start'] ?? 0)
		);


		$resultados =
			$builder
				->get()
				->getResultArray();


		/*
		|--------------------------------------------------------------------------
		| FORMATO PARA DATATABLE
		|--------------------------------------------------------------------------
		*/

		$datos = [];

		foreach ($resultados as $item) {

			$datos[] = [

				'id' =>
					$item['id'],

				'acciones' =>
					$this->formatearAccionesSolicitud(
						$item
					),

				'estado' =>
					$this->formatearEstadoSolicitud(
						$item['estado']
					),

				'folio' =>
					$item['folio']
					?: '-',

				'candidato' =>
					$this->formatearCandidatoSolicitud(
						$item
					),

				'telefono' =>
					$item['telefono']
					?: '-',

				'ubicacion' =>
					$item['ubicacion']
					?: '-',

				'cita' =>
					$this->formatearCitaSolicitud(
						$item
					),

				'created_at' =>
					$this->formatearFechaHora(
						$item['created_at']
					)

			];

		}


		return [

			'total' =>
				$total,

			'filtrados' =>
				$filtrados,

			'datos' =>
				$datos

		];
	}
	private function formatearFechaHora(
		?string $fecha
	): string {

		if (!$fecha) {
			return '-';
		}

		return
			date(
				'd/m/Y',
				strtotime($fecha)
			) .
			'<br>' .
			'<small class="text-muted">' .
			strtolower(
				date(
					'g:i a',
					strtotime($fecha)
				)
			) .
			'</small>';
	}
	private function formatearAccionesSolicitud(
		array $item
	): string {

		return '
			<button
				type="button"
				class="btn btn-sm btn-light-primary d-inline-flex align-items-center gap-1"
				onclick="verSolicitud('.(int)$item['id'].')"
				title="Consultar solicitud">

				<i class="ph-duotone ph-eye"></i>
				<span></span>

			</button>
		';
	}
	private function formatearEstadoSolicitud(
		?string $estado
	): string {

		$estado =
			strtolower(
				trim((string)$estado)
			);

		switch ($estado) {

			case 'en_proceso':

				$clase =
					'estado-en-proceso';

				$icono =
					'ph-clock';

				$texto =
					'En proceso';

				break;


			case 'cita_programada':

				$clase =
					'estado-cita-programada';

				$icono =
					'ph-calendar-check';

				$texto =
					'Cita programada';

				break;


			case 'pendiente_evaluacion':

				$clase =
					'estado-pendiente-evaluacion';

				$icono =
					'ph-clipboard-text';

				$texto =
					'Pendiente evaluación';

				break;


			case 'finalizado':

				$clase =
					'estado-finalizado';

				$icono =
					'ph-check-circle';

				$texto =
					'Finalizado';

				break;


			case 'finalizado_menor_edad':

				$clase =
					'estado-finalizado-edad';

				$icono =
					'ph-minus-circle';

				$texto =
					'Finalizado menor edad';

				break;


			case 'finalizado_mayor_rango':

				$clase =
					'estado-finalizado-edad';

				$icono =
					'ph-minus-circle';

				$texto =
					'Finalizado mayor rango';

				break;


			case 'cancelado':

				$clase =
					'estado-cancelado';

				$icono =
					'ph-x-circle';

				$texto =
					'Cancelado';

				break;


			default:

				$clase =
					'estado-default';

				$icono =
					'ph-circle';

				$texto =
					$estado !== ''
						? ucfirst(
							str_replace(
								'_',
								' ',
								$estado
							)
						)
						: 'Sin estatus';
		}


		return '
			<span class="badge-postulacion '.$clase.'">

				<i class="ph-duotone '.$icono.'"></i>

				'.$texto.'

			</span>
		';
	}
	private function formatearCandidatoSolicitud(
		array $item
	): string {

		$html =
			'<div class="fw-semibold">' .
			esc(
				$item['nombre'] ?: 'Sin nombre'
			) .
			'</div>';

		$detalles = [];

		if (!empty($item['edad'])) {

			$detalles[] =
				(int)$item['edad'] .
				' años';
		}

		if ((int)($item['trabajo_previo'] ?? 0) === 1) {

			$detalles[] =
				'Reingreso';
		}

		if ((int)($item['recomendado'] ?? 0) === 1) {

			$detalles[] =
				'Recomendado';
		}

		if (!empty($detalles)) {

			$html .=
				'<small class="text-muted">' .
				esc(
					implode(
						' · ',
						$detalles
					)
				) .
				'</small>';
		}

		return $html;
	}
	private function formatearCitaSolicitud(
		array $item
	): string {

		if (empty($item['fecha_cita'])) {
			return '-';
		}

		$fecha =
			date(
				'd/m/Y',
				strtotime(
					$item['fecha_cita']
				)
			);

		$html = $fecha;

		if (!empty($item['hora_cita'])) {

			$html .=
				'<br><small class="text-muted">' .
				strtolower(
					date(
						'g:i a',
						strtotime(
							$item['hora_cita']
						)
					)
				) .
				'</small>';
		}

		return $html;
	}
	public function getResumenSolicitudes(
		array $filtros = []
	): array {

		$builder =
			$this->db
				->table(
					'reclutamiento.rh_postulaciones_chat p'
				);


		if (!empty($filtros['estado'])) {

			$builder->where(
				'p.estado',
				$filtros['estado']
			);
		}


		if (!empty($filtros['localidad'])) {

			$builder->where(
				'p.ubicacion',
				$filtros['localidad']
			);
		}


		if (!empty($filtros['fecha_desde'])) {

			$builder->where(
				'DATE(p.created_at) >=',
				$filtros['fecha_desde']
			);
		}


		if (!empty($filtros['fecha_hasta'])) {

			$builder->where(
				'DATE(p.created_at) <=',
				$filtros['fecha_hasta']
			);
		}


		$total =
			(clone $builder)
				->countAllResults();


		$enProceso =
			(clone $builder)
				->where(
					'p.estado',
					'en_proceso'
				)
				->countAllResults();


		$conCita =
			(clone $builder)
				->where(
					'p.fecha_cita IS NOT NULL'
				)
				->countAllResults();


		$reingresos =
			(clone $builder)
				->where(
					'p.trabajo_previo',
					1
				)
				->countAllResults();


		return [

			'total' =>
				$total,

			'en_proceso' =>
				$enProceso,

			'con_cita' =>
				$conCita,

			'reingresos' =>
				$reingresos

		];
	}
	public function getDetalleSolicitud(int $id): ?array
	{
		$builder =
		$this->db
		->table('reclutamiento.rh_postulaciones_chat p');

		$builder->select('
			p.id,
			p.session_id,
			p.nombre,
			p.tiene_telefono,
			p.telefono,
			p.edad,
			p.ubicacion,
			p.es_local,

			p.trabajo_previo,
			p.recomendado,
			p.recomendado_nombre,
			p.recomendado_nomina,
			p.fechas_laboradas,
			p.motivo_salida,

			p.experiencia_principal,
			p.experiencia_principal_otra,
			p.lugar_experiencia,
			p.lugar_experiencia_otro,

			p.esfuerzo_fisico,
			p.trabajo_de_pie,
			p.actividades_servicios,

			p.tiene_restriccion_fisica,
			p.restriccion_fisica,

			p.selfie,
			p.fecha_cita,
			p.hora_cita,
			p.estatus_cita,
			p.agenda_id,
			p.documentos,

			p.folio,
			p.reclutador_id,

			r.Nombre AS reclutador_nombre,
			r.Telefono AS reclutador_telefono,

			p.estado,
			p.created_at,
			p.updated_at
		');

		$builder->join(
			'reclutamiento.rh_reclutadores r',
			'r.id = p.reclutador_id',
			'left'
		);

		$builder->where(
			'p.id',
			$id
		);

		$resultado =
			$builder
				->get()
				->getRowArray();

		return $resultado ?: null;
	}
	public function getDocumentosDeclarados(int $postulacionId): array
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
			->where(
				'dr.is_active',
				1
			)
			->orderBy(
				'dr.orden',
				'ASC'
			)
			->orderBy(
				'dr.nombre',
				'ASC'
			)
			->get()
			->getResultArray();
	}
	public function getConversacionSolicitud(string $sessionId): array
	{
		$sessionId = trim($sessionId);

		if ($sessionId === '') {
			return [];
		}

		return $this->db
			->table('reclutamiento.rh_chat_messages')
			->select('
				id,
				role,
				message,
				payload,
				created_at
			')
			->where(
				'session_id',
				$sessionId
			)
			->orderBy(
				'id',
				'ASC'
			)
			->get()
			->getResultArray();
	}
}