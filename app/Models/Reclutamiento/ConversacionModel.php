<?php

namespace App\Models\Reclutamiento;

use CodeIgniter\Model;

class ConversacionModel extends Model
{
	protected $DBGroup = 'default';

	public function listar(array $filtros = []): array
{
	$db = \Config\Database::connect();

	$sql = "
		SELECT
			m.session_id,
			MIN(m.created_at) AS fecha_inicio,
			MAX(m.created_at) AS ultima_actividad,
			COUNT(*) AS total_mensajes,
			SUM(CASE WHEN m.role = 'user' THEN 1 ELSE 0 END) AS mensajes_usuario,

			CASE
				WHEN pc.session_id IS NULL THEN 'sin_postulacion'
				ELSE 'con_postulacion'
			END AS tipo_conversacion,

			(
				SELECT m1.message
				FROM reclutamiento.rh_chat_messages m1
				WHERE m1.session_id = m.session_id
				AND m1.role = 'user'
				ORDER BY m1.id ASC
				LIMIT 1
			) AS primer_mensaje,

			(
				SELECT m2.message
				FROM reclutamiento.rh_chat_messages m2
				WHERE m2.session_id = m.session_id
				AND m2.role = 'user'
				ORDER BY m2.id DESC
				LIMIT 1
			) AS ultimo_mensaje

		FROM reclutamiento.rh_chat_messages m

		LEFT JOIN (
			SELECT session_id, MAX(id) AS id_postulacion_chat
			FROM reclutamiento.rh_postulaciones_chat
			GROUP BY session_id
		) pc ON pc.session_id = m.session_id

		WHERE 1 = 1
	";

	$params = [];

	if (!empty($filtros['fecha'])) {
		$sql .= " AND DATE(m.created_at) = ?";
		$params[] = $filtros['fecha'];
	}

	if (!empty($filtros['tipo'])) {

		if ($filtros['tipo'] === 'con_postulacion') {
			$sql .= " AND pc.session_id IS NOT NULL";
		}

		if ($filtros['tipo'] === 'sin_postulacion') {
			$sql .= " AND pc.session_id IS NULL";
		}
	}

	if (!empty($filtros['buscar'])) {
		$sql .= "
			AND (
				m.session_id LIKE ?
				OR EXISTS (
					SELECT 1
					FROM reclutamiento.rh_chat_messages mb
					WHERE mb.session_id = m.session_id
					AND mb.message LIKE ?
				)
			)
		";

		$buscar = '%' . $filtros['buscar'] . '%';

		$params[] = $buscar;
		$params[] = $buscar;
	}

	$sql .= "
		GROUP BY
			m.session_id,
			pc.session_id

		ORDER BY MAX(m.created_at) DESC
	";

	return $db->query($sql, $params)->getResultArray();
}

	public function obtenerConversacion(string $sessionId): array
	{
		return \Config\Database::connect()
			->table('reclutamiento.rh_chat_messages')
			->where('session_id', $sessionId)
			->orderBy('id', 'ASC')
			->get()
			->getResultArray();
	}

	public function obtenerResumen(string $sessionId): ?array
	{
		$db = \Config\Database::connect();

		return $db
			->table('reclutamiento.rh_chat_messages')
			->select("
				session_id,
				MIN(created_at) AS fecha_inicio,
				MAX(created_at) AS ultima_actividad,
				COUNT(*) AS total_mensajes
			", false)
			->where('session_id', $sessionId)
			->groupBy('session_id')
			->get()
			->getRowArray();
	}
}