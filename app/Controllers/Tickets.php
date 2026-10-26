<?php

namespace App\Controllers;

class Tickets extends BaseController
{
    public function index()
    {
        return view('tickets/index');
    }

    public function print($codigo)
    {
        return view('tickets/print', [
            'codigo' => $codigo
        ]);
    }
	public function sign()
	{
		$data = $this->request->getPost('data');

		$privateKey = file_get_contents(WRITEPATH.'qz/private.pem');

		openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);

		return base64_encode($signature);
	}
}