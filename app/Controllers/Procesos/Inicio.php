<?php

namespace App\Controllers\Procesos;
use App\Controllers\BaseController;


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Inicio extends BaseController
{
	public function __construct(){
		$this->db = \Config\Database::connect();
		$this->session=session();
	}
	function generaTiempo(){
		return view('Procesos/index');
	}
	public function obtenerReporte()
	{
		$fhFecha = $this->request->getPost('fhSemana');


		$fechaInicio = date('Y-m-d', strtotime($fhFecha));
		$fechaFin = date('Y-m-d', strtotime($fhFecha . ' +6 days'));

		$sql = "
			SELECT
				'IN0046' AS Concepto,
				d.NumeroEmpleado,
				0 AS Valor,
				SUM(d.TotalHoras) AS Horas,
				'' AS Observaciones,
				m.fhFechaSolicitud AS Fecha
			FROM workbeat.ma_solicitudes_tiempo_extra m
			INNER JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			WHERE m.eCodEstatus=4 and DATE(m.fhFechaSolicitud) BETWEEN ? AND ?
			GROUP BY
				d.NumeroEmpleado,
				m.fhFechaSolicitud
			ORDER BY
				d.NumeroEmpleado,
				m.fhFechaSolicitud
		";

		$resultados = $this->db
			->query($sql, [$fechaInicio, $fechaFin])
			->getResultArray();

		return $this->response->setJSON([
			'data' => $resultados
		]);
	}
	function exportarExcel(){
		$fhFecha = $this->request->getPost('fhSemana');
		$fechaInicio = date('Y-m-d', strtotime($fhFecha));
		$fechaFin = date('Y-m-d', strtotime($fhFecha . ' +6 days'));

		$sql = "
			SELECT
				'IN0046' AS Concepto,
				d.NumeroEmpleado,
				0 AS Valor,
				SUM(d.TotalHoras) AS Horas,
				'' AS Observaciones,
				m.fhFechaSolicitud AS Fecha
			FROM workbeat.ma_solicitudes_tiempo_extra m
			INNER JOIN workbeat.de_registro_tiempo_extra d
				ON d.eCodSolicitud = m.eCodConsecutivo
			WHERE m.eCodEstatus=4 and DATE(m.fhFechaSolicitud) BETWEEN ? AND ?
			GROUP BY
				d.NumeroEmpleado,
				m.fhFechaSolicitud
			ORDER BY
				d.NumeroEmpleado,
				m.fhFechaSolicitud
		";

		$datos = $this->db
			->query($sql, [$fechaInicio, $fechaFin])
			->getResultArray();
			
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setTitle('Tiempo Extra');
		
	    
		
		$fila = 1;

	

		foreach($datos as $row)
		{
			
			$sheet->setCellValue('A'.$fila,$row['Concepto']);
			$sheet->setCellValue('B'.$fila,$row['NumeroEmpleado']);
			$sheet->setCellValue('C'.$fila,$row['Valor']);
			$sheet->setCellValue('D'.$fila, (float)$row['Horas']);

			$sheet->getStyle('D'.$fila)
				  ->getNumberFormat()
				  ->setFormatCode('0.0');
			$sheet->setCellValue('E'.$fila,$row['Observaciones']);
			//$sheet->setCellValue('F'.$fila,$fechaLinea);
			
			$sheet->setCellValue(
				'F'.$fila,
				Date::PHPToExcel(strtotime($row['Fecha']))
			);

			$sheet->getStyle('F'.$fila)
				  ->getNumberFormat()
				  ->setFormatCode('dd/mm/yyyy');

			

			$fila++;
		}
		
		 $nombre =
			'TiempoExtra_Bach' .
			date('Ymd_His') .
			'.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$nombre.'"');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		exit;
	}
}