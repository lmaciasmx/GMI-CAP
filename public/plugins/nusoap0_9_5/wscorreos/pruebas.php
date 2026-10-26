<?
	$enzipado = new ZipArchive();
	$uuid=uniqid();

	if ($enzipado->open("Facturacion".$uuid.".zip", ZIPARCHIVE::CREATE )!==TRUE) {

		exit("No se pudo abrir el archivo\n");

	}

	$enzipado->addFile('../../../controlador/0.6.6.1/Facturacion/PCSO860402CHM/Comprobantes/52cd85d6d7286.xml');
    $enzipado->addFile('../../../controlador/0.6.6.1/Facturacion/PCSO860402CHM/Comprobantes/52cd85d6d7286.pdf');
	$enzipado->close();

	header("Content-type: application/zip");

	header("Content-Disposition: attachment; filename=descarga.zip");

	header("Cache-Control: no-cache, must-revalidate");

	header("Expires: 0");

	readfile("codedrinks.zip");

?>