<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Baseunica extends BaseController
{
    public function index()
    {
       set_time_limit(0);
		ini_set('memory_limit', '1024M');

		$db = \Config\Database::connect();

		$archivo = FCPATH . 'uploads/5443_202412.csv';

		if (!file_exists($archivo)) {
			return $this->response->setJSON([
				'success' => false,
				'mensaje' => 'No se encontró el archivo CSV.'
			]);
		}

		$permitidos = ['P016', 'P017'];

		$handle = fopen($archivo, "r");

		if (!$handle) {
			return $this->response->setJSON([
				'success' => false,
				'mensaje' => 'No se pudo abrir el archivo.'
			]);
		}

		$insertados = 0;
		$fila = 0;

		while (($row = fgetcsv($handle, 10000, ",")) !== false) {

			$fila++;

			// Saltar encabezado
			if ($fila == 1) continue;

			if (empty(trim($row[0] ?? ''))) continue;

			$concepto = trim($row[2] ?? '');

			//  SOLO P016 Y P017
			if (!in_array($concepto, $permitidos)) {
				continue;
			}
			$codigo = $row[19] ?? '';
			$data = [
				'IdEmpleado'          => trim($row[0]),
				'TipoNomina'          => trim($row[1]),
				'Concepto'            => $concepto,
				'DescripcionConcepto' => trim($row[3]),
				'TipoConcepto'        => trim($row[4]),
				'Anio'                => trim($row[5]),
				'Mes'                 => trim($row[6]),
				'Periodo'             => trim($row[7]),
				'Unidad'              => trim($row[8]),
				'Fecha'               => $this->convertirFechaCSV($row[9] ?? ''),
				'Tipo'                => trim($row[10]),
				'Referencia'          => trim($row[11]),
				'Importe'             => str_replace(',', '', trim($row[12])),
				'Bimestre'            => trim($row[13]),

				'FechaPago'           => $this->convertirFechaCSV($row[14] ?? ''),

				'IdTimbrado'          => trim($row[15]),
				'FechaTimbrado'       => $this->convertirFechaCSV($row[16] ?? ''),

				'ClaveSAT'            => trim($row[17]),
				'CuentaContable'      => trim($row[18]),
			
				'CCOTexto'            => trim($row[19]),
				'CentrosCostos'		  =>trim(explode('-', $codigo)[0])
			];

			$db->table('workbeat.ca_datos_base')->insert($data);

			$insertados++;
		}

		fclose($handle);

		return $this->response->setJSON([
			'success'    => true,
			'insertados' => $insertados
		]);
    }
	private function convertirFechaCSV($fecha)
	{
		if (empty($fecha)) {
			return null;
		}

		// formato dd/mm/yyyy
		$date = \DateTime::createFromFormat('d/m/Y', trim($fecha));

		if ($date) {
			return $date->format('Y-m-d');
		}

		return null;
	}
    public function formato2()
    {
       set_time_limit(0);
		ini_set('memory_limit', '1024M');

		$db = \Config\Database::connect();

		$archivo = FCPATH . 'uploads/5441_20265.csv';

		if (!file_exists($archivo)) {
			return $this->response->setJSON([
				'success' => false,
				'mensaje' => 'No se encontró el archivo CSV.'
			]);
		}

		$permitidos = ['P016', 'P017'];

		$handle = fopen($archivo, "r");

		if (!$handle) {
			return $this->response->setJSON([
				'success' => false,
				'mensaje' => 'No se pudo abrir el archivo.'
			]);
		}

		$insertados = 0;
		$fila = 0;

		while (($row = fgetcsv($handle, 10000, ",")) !== false) {

			$fila++;

			// Saltar encabezado
			if ($fila == 1) continue;

			if (empty(trim($row[0] ?? ''))) continue;

			$concepto = trim($row[6] ?? '');

			//  SOLO P016 Y P017
			if (!in_array($concepto, $permitidos)) {
				continue;
			}
			$codigo = $row[29] ?? '';
			$data = [
				'IdEmpleado'          => trim($row[0]),
				'TipoNomina'          => trim($row[5]),
				'Concepto'            => $concepto,
				'DescripcionConcepto' => trim($row[7]),
				'TipoConcepto'        => trim($row[8]),
				'Anio'                => trim($row[9]),
				'Mes'                 => trim($row[10]),
				'Periodo'             => trim($row[11]),
				'Unidad'              => trim($row[12]),
				'Fecha'               => $this->convertirFechaCSV($row[13] ?? ''),
				'Tipo'                => trim($row[14]),
				'Referencia'          => trim($row[15]),
				'Importe'             => str_replace(',', '', trim($row[16])),
				'Bimestre'            => trim($row[21]),

				'FechaPago'           => $this->convertirFechaCSV($row[22] ?? ''),

				'IdTimbrado'          => trim($row[23]),
				'FechaTimbrado'       => $this->convertirFechaCSV($row[24] ?? ''),

				'ClaveSAT'            => trim($row[25]),
				'CuentaContable'      => trim($row[26]),
			
				'CCOTexto'            => trim($row[29]),
				'CentrosCostos'		  =>trim(explode('-', $codigo)[0])
			];

			$db->table('workbeat.ca_datos_base')->insert($data);

			$insertados++;
		}

		fclose($handle);

		return $this->response->setJSON([
			'success'    => true,
			'insertados' => $insertados
		]);
    }
}