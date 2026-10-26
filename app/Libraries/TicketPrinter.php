<?php

namespace App\Libraries;

require ROOTPATH . 'vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class TicketPrinter
{
    protected $printer;

    protected $printerName = "Sanei SK5-31 Presenter";

    public function conectar()
    {
        $connector = new WindowsPrintConnector($this->printerName);

        $this->printer = new Printer($connector);
    }

    public function imprimirCodigo($codigo)
    {
        try {

            $this->conectar();

			$this->printer->initialize();

			

			$this->printer->text("CODIGO\n");

			$this->printer->text($codigo . "\n");

			

			// SIN CUT

			$this->printer->close();

			unset($this->printer);

			return [
				'success' => true,
				'message' => 'Impresión enviada'
			];

        } catch (\Exception $e) {

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}