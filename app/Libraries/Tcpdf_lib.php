<?php namespace App\Libraries;

class Tcpdf_lib extends \TCPDF
{
    public function __construct()
    {
        // Incluye la librería TCPDF
        require_once APPPATH . 'Libraries/tcpdf/tcpdf.php';
        
        // Llama al constructor padre TCPDF
        parent::__construct();
    }
}
