<?php
/*
 * Timbrado con FacturadorElectronico.com
 * http://www.facturadorelectronico.com
 *
 * DotNet Desarrollo de Sistemas
 * http://www.dotnet.com.mx
 * Febrero 2013
 * 
 * Este codigo solo pretende mostrar la logica de conexion al web Service de timbrado
 * Usted Debera implementar el codigo necesario, dependiendo de la logica y requerimientos de su desarrollo
 *
 *
*/
    require_once('lib/nusoap.php');
	$ModoTimbrado='T'; 																												//T=test, P=produccion
	$gIDUsu=1; 																														//idusuario global.
	$RFC='HEGT7610034S2';																											//RFC CLIENTE
	$numero_certificado = "20001000000100001708";																					//NUMERO DE CERTIFICADO 
    $archivo_cer = "HEGT7610034S2/HEGT7610034S2.cer";																				//ARCHIVO QUE CONTIENE CERTIFICADO CER
    $archivo_key = "HEGT7610034S2/HEGT7610034S2.key";																				//ARCHIVO QUE CONTIENE CERTIFICADO KEY
	$password_privado='a0123456789';																								//CONTRASEÑA PRIVADA
	
	shell_exec('openssl pkcs8 -inform DER -in '.$archivo_key.' -passin pass:'.$password_privado.' -out '.$RFC.'/'.$RFC.'.key.pem');  //GENERAMOS EL ARHIVO .key.pem por consola con openssl
	
	if (file_exists($RFC.'/'.$RFC.'key.pem')){																						//VALIDAMOS SI SE CREO EL ARCHIVO SI NO NO PODEMOS CONTINUAR YA QUE ESTO SIGNIFICA QUE LA CONTRASEÑA PARA ESE ARCHIVO ES INCORRECTO
	   $archivo_key_pem='HEGT7610034S2/HEGT7610034S2.key.pem';
	}else{
	    $archivo_key_pem='';
	} 

	
	
	/*******************************************CONEXION AL SERVICIO DE TIMBRADO**************************************************/
	if ($ModoTimbrado=='T')
	{ 
		//TEST
		$client = new nusoap_client('http://app.facturadorelectronico.com/pruebastimbradofe/timbrado.asmx?WSDL','soap');
		$client->soap_defencoding = "UTF-8";
		$client->decode_utf8 = false;
		$user='test';
		$pw='TEST';
	
	}
	if ($ModoTimbrado=='P')
	{ 
		//PRODUCCION
		$client = new nusoap_client('https://cfdi.facturadorelectronico.com/wstimbrado/timbrado.asmx?WSDL','soap');
		$client->soap_defencoding = "UTF-8";
		$client->decode_utf8 = false;
		$user='';
		$pw='';
	}
	if ($sError = $client->getError()) { 
		echo "No se pudo realizar la operación [" . $sError . "]"; 
		die(); 
	} 
	
	/********************************************************************************************************************************/
	
	$mynamespace='http://mycommerce.mx';    																						//MY SPACE PARA CONEXION AL SERVIDOR
	print $private = openssl_pkey_get_private(file_get_contents($archivo_key_pem));														//OBTENEMOS LA LLAVE PRIVADA DEL KEY.PEM
	$certificado = str_replace(array('\n', '\r'), '', base64_encode(file_get_contents($archivo_cer)));								//OBTENEMOS EL CERFIFICADO


	$xml='<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xs="http://www.w3.org/2001/XMLSchema" version="3.2" fecha="$fecha_actual" tipoDeComprobante="ingreso" noCertificado="" certificado="" sello="" formaDePago="Pago en una sola exhibición" metodoDePago="Transferencia Electrónica" NumCtaPago="No identificado" LugarExpedicion="San Pedro Garza García, Mty." subTotal="10.00" total="11.60">
<cfdi:Emisor nombre="EMPRESA DEMO" rfc="$rfc_emisor">
  <cfdi:RegimenFiscal Regimen="No aplica"/>
</cfdi:Emisor>
<cfdi:Receptor nombre="PUBLICO EN GENERAL" rfc="XAXX010101000"></cfdi:Receptor>
<cfdi:Conceptos>
  <cfdi:Concepto cantidad="10" unidad="No aplica" noIdentificacion="00001" descripcion="Servicio de Timbrado" valorUnitario="1.00" importe="10.00">
  </cfdi:Concepto>  
</cfdi:Conceptos>
<cfdi:Impuestos totalImpuestosTrasladados="1.60">
  <cfdi:Traslados>
    <cfdi:Traslado impuesto="IVA" tasa="16.00" importe="1.6"></cfdi:Traslado>
  </cfdi:Traslados>
</cfdi:Impuestos>
</cfdi:Comprobante>';



	/*$xdoc = new DomDocument();
    $xdoc->loadXML($xml) or die("XML invalido");
	print_r($xdoc);*/
	
	$XSL = new DOMDocument();
  	$XSL->load('utilerias/xslt32/cadenaoriginal_3_2.xslt');
	
	
  
  	$proc = new XSLTProcessor;
  /*  $proc->importStyleSheet($XSL);

    $cadena_original = $proc->transformToXML($xdoc);    
  	openssl_sign($cadena_original, $sig, $private);
  	$sello = base64_encode($sig);*/


	
	
	/*$xml='<?xml version="1.0" encoding="utf-8"?>
	<cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd" version="3.2" serie="FA" folio="168" fecha="2013-08-27T05:51:29" sello="y0Ssk4ROiITFdVyBVDtdyHVuDLmTTiw5DpzDsF/pqakpKVW5Y3ZD4BfPrfZX+IolylFm4uGKwqPsYPZyd2yfVQDNr8fUbf2KtfzQJfo+X3GfVAqNBpgi4UnMW2ymdVK8KneLfFDusOhQUhGR7MYcOai1pvYCn38n5oqQZfpq/pI=" formaDePago="Pago en una sola exhibicion" noCertificado="20001000000100001708" certificado="MIIFGDCCBACgAwIBAgIUMjAwMDEwMDAwMDAxMDAwMDE3MDgwDQYJKoZIhvcNAQEFBQAwggFvMRgwFgYDVQQDDA9BLkMuIGRlIHBydWViYXMxLzAtBgNVBAoMJlNlcnZpY2lvIGRlIEFkbWluaXN0cmFjacOzbiBUcmlidXRhcmlhMTgwNgYDVQQLDC9BZG1pbmlzdHJhY2nDs24gZGUgU2VndXJpZGFkIGRlIGxhIEluZm9ybWFjacOzbjEpMCcGCSqGSIb3DQEJARYaYXNpc25ldEBwcnVlYmFzLnNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxEjAQBgNVBAcMCUNveW9hY8OhbjEVMBMGA1UELRMMU0FUOTcwNzAxTk4zMTIwMAYJKoZIhvcNAQkCDCNSZXNwb25zYWJsZTogSMOpY3RvciBPcm5lbGFzIEFyY2lnYTAeFw0xMDExMTkxOTUzNTZaFw0xMjExMTgxOTUzNTZaMIGxMSAwHgYDVQQDFBdBTkEgQ0VDSUxJQSBHT01FWiBZQdFFWjEgMB4GA1UEKRQXQU5BIENFQ0lMSUEgR09NRVogWUHRRVoxIDAeBgNVBAoUF0FOQSBDRUNJTElBIEdPTUVaIFlB0UVaMRYwFAYDVQQtEw1HT1lBNzgwNDE2R00wMRswGQYDVQQFExJHT1lBNzgwNDE2TURGTlNSMDgxFDASBgNVBAsTC1N1Y3Vyc2FsQVZMMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDUoeNm2qQS/UQJOC5s+QHPoqsXahXJwrKO0MIcY6yvSJJzylJFVTwvQEUjExflfdtzTQLoHGtkOj9/8IiO6yeZJft07tJczQQLpUF4GHg9wfP1xVND20skye7EfrTGTJBdAKahg9TFY20tfk3w1abBFQaV+j1IUvxWCw/dfxudmQIDAQABo4HqMIHnMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMB0GA1UdDgQWBBT1lw7UbZ795FaVA8ORZ/TkBEvZyzAuBgNVHR8EJzAlMCOgIaAfhh1odHRwOi8vcGtpLnNhdC5nb2IubXgvc2F0LmNybDAzBggrBgEFBQcBAQQnMCUwIwYIKwYBBQUHMAGGF2h0dHA6Ly9vY3NwLnNhdC5nb2IubXgvMB8GA1UdIwQYMBaAFOtZfQQimlONnnEaoFiWKfU54KDFMBAGA1UdIAQJMAcwBQYDKgMEMBMGA1UdJQQMMAoGCCsGAQUFBwMCMA0GCSqGSIb3DQEBBQUAA4IBAQCI6Br/9uOa0XpsjYKpq6X5A1PSQ8AsrwpukmnF89oGwr7NkccFZs8cIlX9cbaUsb63vaCK6g2EDuJDmlFco57+I+Wx0RqduRVVcoOc5odmpQJHP0tLE++UK/fUjbJvkGogYzwOQ8x/qJgkrI8StEvwzAUBAuQXCU0W5Unhg/dLyR7DcmEWmRwQkKJMnOEQ6RTiALmY2QIOIEIk6QJ7xmu1V1jLN8A/q9I54+0HZRV8FjoAG5iGEk7P/Mxgyc8btwNOROu3ZL5p2TvoXrb7CAF3sZpTf0FdtpIc/335H0zqS2m6ASk9d+HlA1TWN/I9XTssrHv0nmbtB5CRS8HOS4BR" condicionesDePago="Comprobante expresado en: Pesos. Con tipo de cambio:1" subTotal="190.0000" TipoCambio="1.0000" Moneda="Pesos" total="220.4000" metodoDePago="Efectivo" tipoDeComprobante="ingreso" LugarExpedicion="Victoria,Tamaulipas,Mexico">
	<cfdi:Emisor rfc="GOYA780416GM0" nombre="EMPRESA DE DEMOSTRACION S.A. DE C.V.">
	<cfdi:DomicilioFiscal calle="Libramiento Naciones Unidas" noExterior="NUM. 301" colonia="Col. del Sur" municipio="Victoria" estado="Tamaulipas" pais="Mexico" codigoPostal="87087" />
	<cfdi:RegimenFiscal Regimen="REGIMEN GENERAL PERSONAS MORALES" />
	</cfdi:Emisor>
	<cfdi:Receptor rfc="AAAA111111DDD" nombre="KKKKKKKKKK">
	<cfdi:Domicilio pais="Mexico" />
	</cfdi:Receptor>
	<cfdi:Conceptos>
	<cfdi:Concepto cantidad="1.00" unidad="Pieza" noIdentificacion="Butterfly4" descripcion="Butterfly Valve 4in 175 PSI Ductile iron wafer body buna-n seats ductile iron Weco(FMC) 3245819" valorUnitario="190.0000" importe="190.0000" />
	</cfdi:Conceptos>
	<cfdi:Impuestos totalImpuestosTrasladados="30.4000">
	<cfdi:Traslados>
	  <cfdi:Traslado impuesto="IVA" tasa="16.0000" importe="30.4000" />
	</cfdi:Traslados>
	</cfdi:Impuestos>
	<cfdi:Complemento />
	</cfdi:Comprobante>';




	$xml=$xml;
	
	
	//obtenerTimbrado
    $params = array(
        'CFDIcliente' => trim($xml),
        'Usuario' => $user,
        'password' => $pw         
    );      

	//$mynamespace=utf8_decode($mynamespace);	
	
    $resultado = $client->call('obtenerTimbrado',$params,$mynamespace);	
	
	
	
	
	
	
    
	//EL XML
	/*$_ArchivoXML='./mixml.xml'; //ingrese en raiz el xml para timbrar
        $myDom = new DOMDocument();
	$myDom->load($_ArchivoXML);

   
	$xml = trim($myDom->saveXML());*//*
	/*
	$private = openssl_pkey_get_private(file_get_contents($archivo_pem));
	$certificado = str_replace(array('\n', '\r'), '', base64_encode(file_get_contents($archivo_cer)));
	
	$xml='<?xml version="1.0" encoding="utf-8"?>
<cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd" version="3.2" serie="FA" folio="168" fecha="2013-08-27T05:51:29" sello="y0Ssk4ROiITFdVyBVDtdyHVuDLmTTiw5DpzDsF/pqakpKVW5Y3ZD4BfPrfZX+IolylFm4uGKwqPsYPZyd2yfVQDNr8fUbf2KtfzQJfo+X3GfVAqNBpgi4UnMW2ymdVK8KneLfFDusOhQUhGR7MYcOai1pvYCn38n5oqQZfpq/pI=" formaDePago="Pago en una sola exhibicion" noCertificado="20001000000100001708" certificado="MIIFGDCCBACgAwIBAgIUMjAwMDEwMDAwMDAxMDAwMDE3MDgwDQYJKoZIhvcNAQEFBQAwggFvMRgwFgYDVQQDDA9BLkMuIGRlIHBydWViYXMxLzAtBgNVBAoMJlNlcnZpY2lvIGRlIEFkbWluaXN0cmFjacOzbiBUcmlidXRhcmlhMTgwNgYDVQQLDC9BZG1pbmlzdHJhY2nDs24gZGUgU2VndXJpZGFkIGRlIGxhIEluZm9ybWFjacOzbjEpMCcGCSqGSIb3DQEJARYaYXNpc25ldEBwcnVlYmFzLnNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxEjAQBgNVBAcMCUNveW9hY8OhbjEVMBMGA1UELRMMU0FUOTcwNzAxTk4zMTIwMAYJKoZIhvcNAQkCDCNSZXNwb25zYWJsZTogSMOpY3RvciBPcm5lbGFzIEFyY2lnYTAeFw0xMDExMTkxOTUzNTZaFw0xMjExMTgxOTUzNTZaMIGxMSAwHgYDVQQDFBdBTkEgQ0VDSUxJQSBHT01FWiBZQdFFWjEgMB4GA1UEKRQXQU5BIENFQ0lMSUEgR09NRVogWUHRRVoxIDAeBgNVBAoUF0FOQSBDRUNJTElBIEdPTUVaIFlB0UVaMRYwFAYDVQQtEw1HT1lBNzgwNDE2R00wMRswGQYDVQQFExJHT1lBNzgwNDE2TURGTlNSMDgxFDASBgNVBAsTC1N1Y3Vyc2FsQVZMMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDUoeNm2qQS/UQJOC5s+QHPoqsXahXJwrKO0MIcY6yvSJJzylJFVTwvQEUjExflfdtzTQLoHGtkOj9/8IiO6yeZJft07tJczQQLpUF4GHg9wfP1xVND20skye7EfrTGTJBdAKahg9TFY20tfk3w1abBFQaV+j1IUvxWCw/dfxudmQIDAQABo4HqMIHnMAwGA1UdEwEB/wQCMAAwCwYDVR0PBAQDAgbAMB0GA1UdDgQWBBT1lw7UbZ795FaVA8ORZ/TkBEvZyzAuBgNVHR8EJzAlMCOgIaAfhh1odHRwOi8vcGtpLnNhdC5nb2IubXgvc2F0LmNybDAzBggrBgEFBQcBAQQnMCUwIwYIKwYBBQUHMAGGF2h0dHA6Ly9vY3NwLnNhdC5nb2IubXgvMB8GA1UdIwQYMBaAFOtZfQQimlONnnEaoFiWKfU54KDFMBAGA1UdIAQJMAcwBQYDKgMEMBMGA1UdJQQMMAoGCCsGAQUFBwMCMA0GCSqGSIb3DQEBBQUAA4IBAQCI6Br/9uOa0XpsjYKpq6X5A1PSQ8AsrwpukmnF89oGwr7NkccFZs8cIlX9cbaUsb63vaCK6g2EDuJDmlFco57+I+Wx0RqduRVVcoOc5odmpQJHP0tLE++UK/fUjbJvkGogYzwOQ8x/qJgkrI8StEvwzAUBAuQXCU0W5Unhg/dLyR7DcmEWmRwQkKJMnOEQ6RTiALmY2QIOIEIk6QJ7xmu1V1jLN8A/q9I54+0HZRV8FjoAG5iGEk7P/Mxgyc8btwNOROu3ZL5p2TvoXrb7CAF3sZpTf0FdtpIc/335H0zqS2m6ASk9d+HlA1TWN/I9XTssrHv0nmbtB5CRS8HOS4BR" condicionesDePago="Comprobante expresado en: Pesos. Con tipo de cambio:1" subTotal="190.0000" TipoCambio="1.0000" Moneda="Pesos" total="220.4000" metodoDePago="Efectivo" tipoDeComprobante="ingreso" LugarExpedicion="Victoria,Tamaulipas,Mexico">
  <cfdi:Emisor rfc="GOYA780416GM0" nombre="EMPRESA DE DEMOSTRACION S.A. DE C.V.">
    <cfdi:DomicilioFiscal calle="Libramiento Naciones Unidas" noExterior="NUM. 301" colonia="Col. del Sur" municipio="Victoria" estado="Tamaulipas" pais="Mexico" codigoPostal="87087" />
    <cfdi:RegimenFiscal Regimen="REGIMEN GENERAL PERSONAS MORALES" />
  </cfdi:Emisor>
  <cfdi:Receptor rfc="AAAA111111DDD" nombre="KKKKKKKKKK">
    <cfdi:Domicilio pais="Mexico" />
  </cfdi:Receptor>
  <cfdi:Conceptos>
    <cfdi:Concepto cantidad="1.00" unidad="Pieza" noIdentificacion="Butterfly4" descripcion="Butterfly Valve 4in 175 PSI Ductile iron wafer body buna-n seats ductile iron Weco(FMC) 3245819" valorUnitario="190.0000" importe="190.0000" />
  </cfdi:Conceptos>
  <cfdi:Impuestos totalImpuestosTrasladados="30.4000">
    <cfdi:Traslados>
      <cfdi:Traslado impuesto="IVA" tasa="16.0000" importe="30.4000" />
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento />
</cfdi:Comprobante>';




	$xml=$xml;
	
	
	//obtenerTimbrado
    $params = array(
        'CFDIcliente' => trim($xml),
        'Usuario' => $user,
        'password' => $pw         
    );      

	//$mynamespace=utf8_decode($mynamespace);	
	
    $resultado = $client->call('obtenerTimbrado',$params,$mynamespace);	
	//
	
	//cancelarComprobante
	//$params = array(
    //    'xmlCancelacion' => $xml,
    //    'usuario' => $user,
    //    'password' => $pw         
    //);      
    //$resultado = $client->call('cancelarComprobante',$params,$mynamespace);	
	//
	
	
	if ($client->fault) {
		echo '<h2>Falla en timbrado</h2><pre>'; print_r(utf8_decode($result)); echo '</pre>';
	} else {
		$err = $client->getError();
		if ($err) {
			echo '<h2>Error</h2><pre>' . $err . '</pre>';
		} else {		
			//debug 1
			echo '<pre>'; print_r($resultado); '</pre><hr>';
			echo '<pre>'.htmlspecialchars($client->response, ENT_QUOTES).'</pre>';			
			//------------------------------------------------
			//AGREGA EL TIMBRE AL XML
			//------------------------------------------------
			//...
		}
	}
	//debug 2
	echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
	echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
	echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';*/	
?>