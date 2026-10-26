<?php

namespace App\Controllers;

use App\Services\LabelService;

class Label extends BaseController
{
    public function prueba()
    {
        $labelService = new LabelService();

        $data = [
			'bm'=>'maria de jesus',
            'codigo' => '7501234567890',
			'material'=>'ATUN ALETA AMARILLA 20-40',
			'tina'=>'205',
			'lote'=>'LT5-233434',
			'rsa'=>'12334',
			'sorteador'=>'luis mcias',
			'etiquetador'=>'entique rodriguez',
			'qr'=>'123',
			'folio'=>'F123',
			'tara'=>100,
			'peso'=>545.23
			
        ];
		
        $zpl = $labelService->generatePdf($data);

        // SOLO mostramos resultado
        return "<pre>{$zpl}</pre>";
    }
}