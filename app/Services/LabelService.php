<?php

namespace App\Services;

use TCPDF;

class LabelService
{
	private string $printer = 'Intermec PC43t';
    private string $sumatra = 'C:\\SumatraPDF\\SumatraPDF.exe';
	
	public function print(array $data)
    {
        $pdfPath = WRITEPATH . 'label.pdf';
        $this->generatePdf($data, $pdfPath);
        $this->sendToPrinter($pdfPath);
    }
	
    function generatePdf($d)
    {
		$pdfPath = WRITEPATH . 'label.pdf';
        $pdf = new TCPDF('L', 'mm', [100, 50], true, 'UTF-8', false);
        $pdf->SetMargins(0,0,0);
        $pdf->SetAutoPageBreak(false,0);
		$pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        $pad = 3;
        $qrSize = 30;

        $pdf->write2DBarcode(
            $d['qr'],
            'QRCODE,M',
            $pad,
            $pad,
            $qrSize,
            $qrSize,
            ['border'=>0]
        );

        $rightX = $pad + $qrSize + 4;

        //$pdf->SetFont('arial','',8);

        $lines = [
            "B/M: {$d['bm']}",
            "MATERIAL: {$d['material']}",
            "TINA: {$d['tina']} LOTE: {$d['lote']}",
            "RSA: {$d['rsa']}",
            "SORTEADOR: {$d['sorteador']}",
            "ETIQUETADOR: {$d['etiquetador']}",
        ];

        $y = $pad;

        foreach ($lines as $line) {
            $pdf->SetXY($rightX, $y);
            $pdf->Cell(0,4,$line,0,1);
            $y += 4;
        }

        $bottomY = 35;
        $colW = 31;

        //$pdf->SetFont('helvetica','B',18);

        $pdf->SetXY(3,$bottomY);
        $pdf->Cell($colW,8,$d['folio'],0,0,'C');

        $pdf->SetXY(34,$bottomY);
        $pdf->Cell($colW,8,$d['tara'],0,0,'C');

        $pdf->SetXY(65,$bottomY);
        $pdf->Cell($colW,8,$d['peso'],0,0,'C');
	
		$path='';
        $pdf->Output($pdfPath,'F');
		
		$this->sendToPrinter($pdfPath);
    }

    private function sendToPrinter($pdfPath)
    {
        $cmd = "\"{$this->sumatra}\" -silent -print-to \"{$this->printer}\" "
             . "-print-settings \"noscale,landscape\" "
             . "\"{$pdfPath}\"";

        exec($cmd);
    }
}