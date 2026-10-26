<?php namespace App\Libraries;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class QRCode
{
    public function generate($text, $size = 300)
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($text)
            ->size($size)
            ->margin(10)
            ->build();

        // Devuelve el contenido binario PNG
        return $result->getString();
    }
}
