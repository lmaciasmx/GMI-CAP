<?php

namespace App\Models\Reclutamiento;

use CodeIgniter\Model;

class CandidatoSeguimientoModel extends Model
{
    protected $table = 'reclutamiento.rh_candidato_seguimientos';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'postulacion_id',
        'tipo',
        'descripcion',
        'fecha_anterior',
        'hora_anterior',
        'fecha_nueva',
        'hora_nueva',
        'reclutador_id',
        'created_at'
    ];

    public function obtenerPorPostulacion($postulacionId)
    {
        return $this
            ->where('postulacion_id', $postulacionId)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();
    }

    public function obtenerUltimo($postulacionId)
    {
        return $this
            ->where('postulacion_id', $postulacionId)
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function registrar(
        $postulacionId,
        $tipo,
        $descripcion = null,
        $reclutadorId = null,
        array $datosAdicionales = []
    ) {

        $data = [
            'postulacion_id' => $postulacionId,
            'tipo'           => $tipo,
            'descripcion'    => $descripcion,
            'reclutador_id'  => $reclutadorId,
            'created_at'     => date('Y-m-d H:i:s')
        ];

        $camposPermitidos = [
            'fecha_anterior',
            'hora_anterior',
            'fecha_nueva',
            'hora_nueva'
        ];

        foreach ($camposPermitidos as $campo) {

            if (array_key_exists($campo, $datosAdicionales)) {
                $data[$campo] = $datosAdicionales[$campo];
            }
        }

        return $this->insert($data);
    }
}